<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	$data = implode("", file(''.$configuration_root.'/configuration.xml'));
	$xml = simplexml_load_string($data);
	$json = json_encode($xml);
	
	$config = json_decode($json,TRUE);
	
	/* params */
	$params = $config['general'];
	$app->params = $config['general'];
	
	/* pages */
	$pages_ = $config['pages']['page'];
	$app->pages = $pages_;
	
	/* plugins */
	$plugins = $config['plugins']['plugin'];
	
	/* modules */
	if(isset($config['modules']['module'])) $modules_ = $config['modules']['module'];
	
	/* menus */
	if(isset($config['menus']['menu'])) $menus_ = $config['menus']['menu'];
	
	/* preloader */
	if(isset($params['preloader']) && $params['preloader']) $app->preloader = $params['preloader'];
	

?>