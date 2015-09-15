<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	$pageevent = '';
	
	foreach($plugins as $plugin) {
		if($plugin['active'] && isset($plugin['pageevents']['include'])) {
			$includes = $plugin['pageevents']['include'];
			if(is_array($includes)){
				foreach($includes as $include) {
					include $includes_root.'/'.$include;
				}
			} else {
				include $includes_root.'/'.$includes;
			}
		}
	}
	
	echo '<div class="pageevents pageevent-'.$page->id.'">'.$pageevent.'</div>';
	
	
?>