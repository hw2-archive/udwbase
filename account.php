<?php
/*
* UDWBase: WOWDB Web Interface
*
* © UDW 2009-2011
*
* Released under the terms and conditions of the
* GNU General Public License (http://gnu.org).
*
*/

// Загружаем файл перевода для smarty
$smarty->config_load($conf_file,'account');

// Создание аккаунта
if (($_REQUEST['account']=='signup') and (isset($_POST['username'])) and (isset($_POST['password'])) and (isset($_POST['c_password'])) and ($UDWBaseconf['register']==true))
{
	// Совпадают ли введенные пароли?
	if ($_POST['password'] != $_POST['c_password'])
	{
		$smarty->assign('signup_error', $smarty->get_config_vars('Different_passwords'));
	} else {
		// Существует ли уже такой пользователь?
		if ($rDB->selectCell('SELECT Count(id) FROM ?_account WHERE username=? LIMIT 1', $_POST['username']) == 1)
		{
			$smarty->assign('signup_error', $smarty->get_config_vars('Such_user_exists'));
		} else {
			// Вроде все нормально, создаем аккаунт
			$success = $rDB->selectCell('INSERT INTO ?_account(`username`, `sha_pass_hash`, `email`, `joindate`, `expansion`, `last_ip`)
				VALUES (?, ?, ?, NOW(), ?, ?)',
				$_POST['username'],
				create_usersend_pass($_POST['username'], $_POST['password']),
				(isset($_POST['email']))? $_POST['email'] : '',
				$UDWBaseconf['expansion'],
				(isset($_SERVER["REMOTE_ADDR"]))? $_SERVER["REMOTE_ADDR"] : ''
			);
			if ($success > 0)
			{
				// Все отлично, авторизуем
				$_REQUEST['account']='signin';
			} else {
				// Неизвестная ошибка
				$smarty->assign('signup_error', $smarty->get_config_vars('Unknow_error_on_account_create'));
			}
		}
	}
}

if (($_REQUEST['account']=='signin') and (isset($_POST['username'])) and (isset($_POST['password'])))
{
	//$usersend_pass = create_usersend_pass($_POST['username'], $_POST['password']);
        $shapass = $_POST['password'];
	$user = CheckPwd($_POST['username'], $shapass);
	if ($user==-1)
	{
		del_user_cookie();
		if (isset($_SESSION['username']))
			UnSet($_SESSION['username']);
		$smarty->assign('signin_error', $smarty->get_config_vars('Such_user_doesnt_exists'));
	} elseif ($user==0) {
		del_user_cookie();
		if (isset($_SESSION['username']))
			UnSet($_SESSION['username']);
		$smarty->assign('signin_error', $smarty->get_config_vars('Wrong_password'));
	} else {
		// Имя пользователя и пароль совпадают
		$_SESSION['username'] = $user['name'];
		$_SESSION['shapass'] = $shapass;
		$_REQUEST['account'] = 'signin_true';
		$_POST['remember_me'] = (IsSet($_POST['remember_me'])) ? $_POST['remember_me'] : 'no';
		if ($_POST['remember_me']=='yes')
		{
			// Запоминаем пользователя
			$remember_time = time() + 3000000;
			SetCookie('remember_me',$_POST['username'].$shapass,$remember_time);
		} else {
			del_user_cookie();
		}
	}
}


switch($_REQUEST['account']):
	case '':
		// TODO: Настройки аккаунта (Account Settings)
		break;
	case 'signin_false':
	case 'signin':
		// Вход в систему
		$smarty->assign('register', $UDWBaseconf['register']);
		$smarty->display('signin.tpl');
		break;
	case 'signup_false':
	case 'signup':
		// Регистрация аккаунта
		header( 'Location: http://your_realm_regpage' );
		break;
	case 'signout':
		// Выход из пользователя
		UnSet($user);
		session_unset();
		session_destroy();
		$_SESSION = array();
		del_user_cookie();
	case 'signin_true':
	default:
		// На предыдущую страницу
		// Срабатывает при:
		//  1. $_REQUEST['account'] = 'signout' (выход)
		//  2. $_REQUEST['account'] = 'signok' (успешная авторизация)
		//  3. Неизвестное значение $_REQUEST['account']
		$_REQUEST['next'] = (IsSet($_REQUEST['next']))? $_REQUEST['next'] : '';
		if (($_REQUEST['next']=='?account=signin') or ($_REQUEST['next']=='?account=signup'))
			$_REQUEST['next']='';
		header('Location: ?'.$_REQUEST['next']);
		break;
endswitch;
?>
