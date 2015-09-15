<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

	$app->metadescription = $params['metadescription'];
	$app->lang = $params['lang'];
	$app->ogimage = $params['ogimage'];
	
	foreach($pages_ as $page) {
		
		if($app->current == $page['id']) {
		
		
			if(isset($page['description'])) $app->metadescription = $page['description'];
			
			$app->head .= '
 <meta name="description" content="'.$app->metadescription.'" />';			
		
			$app->head .= '
 <title>'.$app->title.'</title>';
		
			if(isset($page['linkrelprev'])) $app->head .= '
 <link rel="prev" href="'.$website_root.$page['linkrelprev'].'" />';
 
			if(isset($page['linkrelnext'])) $app->head .= '
 <link rel="next" href="'.$website_root.$page['linkrelnext'].'" />';
		
			$app->head .= '
 <link rel="canonical" href="'.$app->canonical.'" />';
 
 			$app->head .= '
 <meta property="og:url" content="'.$app->canonical.'" />';
		
 			$app->head .= '
 <meta property="og:title" content="'.$app->title.'" />';
		
			$app->head .= '
 <meta name="og:description" content="'.$app->metadescription.'" />';		
		
			if(isset($page['ogimage']) && $page['ogimage']) {
				$app->head .= '
 <meta property="og:image" content="'.$website_root.$page['ogimage'].'" />';
			} else {
				if($app->ogimage) {
					$app->head .= '
 <meta property="og:image" content="'.$website_root.$app->ogimage.'" />';
				}
			}
		
		}
		
		
		
		
		
		
		
	
		
		
		
		
				
	}
	
	
	foreach($plugins as $plugin) {
	
		if($plugin['active'] && isset($plugin['googlefonts']['font'])) {
			$googlefonts = $plugin['googlefonts']['font'];
			if(is_array($googlefonts)){
				foreach($googlefonts as $font) {
					$app->head .= '
 <link href="http://fonts.googleapis.com/css?family='.$font.'" rel="stylesheet" type="text/css">';
				}
			} else {
				$app->head .= '
 <link href="http://fonts.googleapis.com/css?family='.$googlefonts.'" rel="stylesheet" type="text/css">';
			}
		}
		
	}
	
?>