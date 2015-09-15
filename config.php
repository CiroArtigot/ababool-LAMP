<?php

	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	
	defined('Ababool') or http_response_code(404);

	$show_errors = 1;
	$website_root = 'http://'.$_SERVER['HTTP_HOST'] . str_replace('index.php','',$_SERVER['SCRIPT_NAME']);
	$includes_root = 'includes';
	$configuration_root = 'includes/config';

?>