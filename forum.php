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

$board = $_REQUEST['board'];
$lang  = $_SESSION['locale'];

if ($board<0)
{
	switch ($lang) :
		// english
		case 0:
			switch ($board) :
			// tools
				case -1:
					header('Location: http://yourboardurl');
				break;
			endswitch;
    endswitch;
}
else
    switch ($lang) :
		//english
	    case 0:
		    //wow general
			switch ($board):
				case 0:
					header('Location: http://yourboardurl');
				break;
			endswitch;
	    default:
		    header('Location: Location: http://yourboardurl');
		    break;
    endswitch;

?>
