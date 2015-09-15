<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	define('Ababool', 1); 
	
	include '../config.php';

	$data = implode("", file('../'.$configuration_root.'/configuration.xml'));
	$xml = simplexml_load_string($data);
	$json = json_encode($xml);
	$config = json_decode($json,TRUE);
	
	$params = $config['general'];
	$pages_ = $config['pages']['page'];
	$plugins = $config['plugins']['plugin'];
	if(isset($config['modules']['module'])) $modules = $config['modules']['module'];
	
	include 'pageclass.php';
	include 'pages.php';
	
	if($params['show_errors']) {
		error_reporting(-1);
		ini_set('display_errors', 1);
	}

	$buffer = '';
	
	if(isset($plugins)) {
		foreach($plugins as $plugin) {
			if($plugin['active'] && isset($plugin['styles']['style'])) {
				$styles = $plugin['styles']['style'];
				if(is_array($styles)){
					foreach($styles as $style) {
						$buffer .= file_get_contents($style);
					}
				} else {
					$buffer .= file_get_contents($styles);
				}
			}
		}
	}

	if(isset($modules)) {
		foreach($modules as $module) {
			if($module['active'] && isset($module['styles']['style'])) {
				$styles = $module['styles']['style'];
				if(is_array($styles)){
					foreach($styles as $style) {
						$buffer .= file_get_contents($style);
					}
				} else {
					$buffer .= file_get_contents($styles);
				}
			}
		}
	}
	
	foreach($pages as $page) { $buffer .=  $page->showstyle();	} 

	// Remove comments
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	 
	// Remove space after colons
	$buffer = str_replace(': ', ':', $buffer);
	 
	// Remove whitespace
	$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
	 
	// Enable GZip encoding.
	ob_start("ob_gzhandler");
	 
	// Enable caching
	//header('Cache-Control: public');
	 
	// Expire in one day
	//header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
	 
	// Set the correct MIME type, because Apache won't set it for us
	header("Content-type: text/css");
	 
	// Write everything out
	echo($buffer);

?>