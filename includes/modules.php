<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
		
	if(isset($modules_)){
		
		foreach($modules_ as $module) {
		
			if(isset($module['active']) && $module['active'] == 1) {
				
				$newmodule = new AbaboolModule();
					
				$newmodule->id = $module['id'];
				
				if(isset($module['file']) && $module['file']) $newmodule->file = $module['file'];
				if(isset($module['active']) && $module['active']) $newmodule->active = $module['active'];
				if(isset($module['params']) && $module['params']) $newmodule->params = $module['params'];
				
				$modules[] = $newmodule;
			
			}
	
		}
	}
	
	//echo '<hr>123<hr>';
	//echo '<pre>'; print_r($modules_);echo '</pre>';

	
	if(isset($modules)) $app->modules = $modules;


	function showModule($themodule, $app, $options = null) {
	
		$modules = 	$app->modules;
	
		$back = '';
		foreach($modules as $module) {
			if($module->id == $themodule) $back .= $module->showmodule($app, $options);
		}
		return $back;
	
	}
	
	
?>