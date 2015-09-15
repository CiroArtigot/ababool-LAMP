<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	//current page >>>> $app->current
	
	include 'breadclass.php';
		
	$params = $this->params;
	$menus = unserialize($app->menus);
	
	if($options) $app->current = $options;
	
	if( isset( $params['menu'] ) && $params['menu'] ) {
		foreach($menus as $menu) {
			if( $menu->id == $params['menu']) $breadmenu = $menu;
		}
		
		if(isset($breadmenu)) {	
			foreach($breadmenu->items['item'] as $item) {
				if( $item['page'] == $app->current) $currentitem = $item;
			}
			
			if(isset($currentitem)) {
			
					$bread = array();
					$level = (int) $currentitem['level'];
					$parent = $currentitem['parent'];
					$page = $currentitem['page'];
					$name = $currentitem['name'];
					
					$breaditem = new AbaboolBread();
					$breaditem->level = $level;
					$breaditem->parent = $parent;
					$breaditem->page = $page;
					$breaditem->name = $name;
					$breaditem->last = 1;
			
					$bread[] = $breaditem;
					
					$swnoloop = 0;
					
					do {
						
						$existparent = 0;
						$swnoloop++;
						
						foreach($breadmenu->items['item'] as $item) {
							
							if( $item['page'] == $parent) {
								
								$existparent = 1;
								$parent = $item['parent'];
								$page = $item['page'];
								$name = $item['name'];
								$level = $item['level'];
								
								$breaditem = new AbaboolBread();
								$breaditem->level = $level;
								$breaditem->parent = $parent;
								$breaditem->page = $page;
								$breaditem->name = $name;
								
								$bread[] = $breaditem;
							}
						}
					
						if(!$existparent) break;
					
					} while ($level >= 1 || $swnoloop < 20);	
				
				
					if(isset($bread) && count($bread) > 1) {
					
						$back = '';
						foreach($bread as $breaditemli) {
							if($breaditemli->last) $back = '<li>'.$breaditemli->name.'</li>' . $back;
							else $back = '<li><a href="#" class="aixgoto" rel="'.$breaditemli->page.'">'.$breaditemli->name.'</a></li>' . $back;
						}
						$back = '<div class="ababool-breadcrumb"><ol class="breadcrumb">'.$back.'</ol></div>';
					}
			}
		}
	} 
	
?>