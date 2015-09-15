<?php

	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	
		
	$directory = '';
	if($_GET['token']) include $directory.'ajax.php';
	else http_response_code(404);
	
	foreach($pages as $page) { 
		if ($page->id == $_GET['pageid']) {
			include $page->dir;
			include $includes_root.'/pageevent.php';
		}
	} 
	
	die();
	
	?>