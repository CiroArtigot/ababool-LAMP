<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	
	if(!function_exists("findchilds")) {
		function findchilds($menuid, $level, $items, $maxlevel) {
			$level++;
			
			if($level>$maxlevel) return;
			
			$back = '';
			foreach($items as $item) {
				$newlevel = (int) $item['level'];
				if(trim($item['parent']) == $menuid &&  $newlevel == $level) {
					$back .= '<ul class="submenu-'.$menuid.' level-'.$newlevel.'">
								<li class="item-'.$item['page'].'"><a href="javascript:void(null);" class="aixgoto" rel="'.$item['page'].'">'.$item['name'].'</a>';
					$back .= findchilds($item['page'], $item['level'], $items, $maxlevel);
					$back .= '</li></ul>';
				}
			}
			return $back;
		}
	}
	
		
	if(isset($options["menu"]) && isset($app->menus)) {
    		
		$mymenu = trim($options["menu"]);	
		$menus = unserialize($app->menus);
		
		$maxlevel = 1000;
		if(isset($options["maxlevel"])) $maxlevel = (int) $options["maxlevel"];
		
		$class = '';
		if(isset($options["class"])) $class = ' '.$options["class"];
		
		foreach($menus as $menu) {
		
			if( trim($menu->id) == $mymenu && isset($menu->items['item'])) {
				
				$items = $menu->items['item'];
			
				$back  = '
				<ul class="menu-'.$mymenu.$class.'">';
			
				foreach($items as $item) {
				
					$level = (int) $item['level'] ;
				
					if($level == 1) {
						$back  .= '
					<li class="item-'.$item['page'].'"><a href="javascript:void(null);" class="aixgoto" rel="'.$item['page'].'">'.$item['name'].'</a>';
						$back .= findchilds($item['page'], $level, $items, $maxlevel);
						$back  .= '
					</li>';
					}
				}
				
				$back  .= '
				</ul>';
				
			}
		}
  	}	
	
?>