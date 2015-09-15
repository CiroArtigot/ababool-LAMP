<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	if(isset($menus_)) {	
		foreach($menus_ as $menu) {
			if(isset($menu['active']) && $menu['active'] == 1) {
				$newmenu = new AbaboolMenu();
				$newmenu->id = $menu['id'];
				if(isset($menu['active']) && $menu['active']) $newmenu->active = $menu['active'];
				if(isset($menu['items']) && $menu['items']) $newmenu->items = $menu['items'];
				$menus[] = $newmenu;
			}
		}
	}
	if(isset($menus)) $app->menus = serialize($menus);
	
?>