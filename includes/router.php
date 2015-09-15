<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	$request_uri = $_SERVER['REQUEST_URI'];
	$script_name = str_replace("index.php","",$_SERVER['SCRIPT_NAME']);
	
	$url_tag = str_replace($script_name,"",$request_uri);
	
	if($request_uri == $script_name) {
	    $current_page = trim($config['pages']['page'][0]['id']);
	    $title = $params['title'];
	}
	else {
	    
	    $current_page = trim($url_tag);
	    $title_sufix = '';
	    foreach($pages_ as $page) {
    		if($page['id'] == $current_page) $title_sufix = $page['name'];
	    }
	    $title = $title_sufix . ' - '.$params['title'];
	}
	
	$canonical = $website_root .$current_page;
	
	$app->current = $current_page;
	$app->canonical = $canonical;
	$app->uri = $request_uri;
	$app->script_name = $script_name;
	$app->url_tag = $url_tag; 
	$app->title = $title; 
	
?>