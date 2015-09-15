<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

	$app = new BootApp();
	$app->start();
	$app->bodyclass = 'ababool';
	$app->website_root = $website_root;
	$app->includes_root = $includes_root;
	$app->configuration_root = $configuration_root;
	$app->directory = '';
	
?>
