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
    switch ($board) :
	case -1:
	    header('Location: http://forum.vanilla-wiki.org/dload.php?action=category&cat_id=1');
	    break;
    endswitch;
}
else
    switch ($lang) :
	    case 0:
		    //wow general
		    header('Location: http://forum.vanilla-wiki.org/viewforum.php?f='.$board);
		    break;
	    default:
		    header('Location: http://forum.vanilla-wiki.org/viewforum.php?f='.$board);
		    break;
    endswitch;

?>
