<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	$footer = '';
	foreach($plugins as $plugin) {
		if(isset($plugin['id']) && $plugin['id']=='footer') {
			$params_footer = $plugin['params'];
		}
	}
	
	include $params_footer['html'];

	$app->footer = '
 <footer class="footer hidesmall-'.$params_footer['hideonsmall'].'">
	<div class="container">
	'.$footer.'
	</div>
 </footer> ';

?>