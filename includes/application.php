<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	if($show_errors) {
		error_reporting(-1);
		ini_set('display_errors', 1);
	}
		
	include $includes_root.'/framework.php';
	include $includes_root.'/init.php';
	include $includes_root.'/configuration.php';  
	include $includes_root.'/router.php';
	include $includes_root.'/heads.php';
	include $includes_root.'/pageclass.php';
	include $includes_root.'/pages.php';
	include $includes_root.'/moduleclass.php';
	include $includes_root.'/modules.php';
	include $includes_root.'/menusclass.php';
	include $includes_root.'/menus.php';
	include $includes_root.'/plugins.php';
	include $includes_root.'/galleryclass.php';
	include $includes_root.'/imageclass.php';
	include $includes_root.'/galleries.php';

?>