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
	
	if($params['show_errors']) {
		error_reporting(-1);
		ini_set('display_errors', 1);
	}
	
	// Enable GZip encoding.
	ob_start("ob_gzhandler");
	
	$buffer = '';
		
	$plugins = $config['plugins']['plugin'];
	if(isset($config['modules']['module'])) $modules = $config['modules']['module'];

	if(isset($plugins)) {
		foreach($plugins as $plugin) {
			if($plugin['active'] && isset($plugin['scripts']['script'])) {
				$scripts = $plugin['scripts']['script'];
				if(is_array($scripts)){
					foreach($scripts as $script) {
						$buffer .= file_get_contents($script);
					}
				} else {
					$buffer .= file_get_contents($scripts);
				}
			}
		}
	}
	if(isset($modules)) {
		foreach($modules as $module) {
			if($module['active'] && isset($module['scripts']['script'])) {
				$scripts = $module['scripts']['script'];
				if(is_array($scripts)){
					foreach($scripts as $script) {
						$buffer .= file_get_contents($script);
					}
				} else {
					$buffer .= file_get_contents($scripts);
				}
			}
		}
	}

	// Enable caching
	//header('Cache-Control: public');
	 
	// Expire in one day
	//header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
	 
	// Set the correct MIME type, because Apache won't set it for us
	header('Content-Type: application/javascript');
	
	//ob_end_flush();
	// Write everything out
	
	//$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	//$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
		
	echo($buffer);

?>