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

require_once 'configs/config.php';

// Директория
global $cwd;
global $UDWBaseconf;

$cwd = str_replace("\\", "/", getcwd());

// загружаем библиотеку Smarty
require_once $cwd.'/includes/Smarty-2.6.19/libs/Smarty.class.php';
class Smarty_UDWBase extends Smarty
{
		function Smarty_UDWBase()
		{
			global $cwd;
			global $UDWBaseconf;
			$this->Smarty();
			// Папки с шаблонами, кэшом шаблонов и настройками
			$this->template_dir = $cwd.'/templates/'.$UDWBaseconf['udwbase']['template'].'/';
			$this->compile_dir = $cwd.'/cache/templates/'.$UDWBaseconf['udwbase']['template'].'/';
			$this->config_dir = $cwd.'/configs/';
			$this->cache_dir = $cwd.'/cache/';
			// Режим отладки
			$this->debugging = $UDWBaseconf['debug'];
			// Разделители
			$this->left_delimiter = '{';
			$this->right_delimiter = '}';
			// Общее Кэширование, для этого сайта не работает
			$this->caching = false;
			// Имя сайта
			$this->assign('app_name', $UDWBaseconf['udwbase']['name']);
		}

		function uDebug($name, $val='')
		{
			if (!$val) $val='unset';
				$this->append($name,$val);
//			$this->append("UserDebug",);
		}
}

?>
