<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	if(isset($config['galleries']['gallerie'])) $galleries_ = $config['galleries']['gallerie'];
	
	if(isset($galleries_)) {
	
		$galleries =  array();
	
		if(isset($galleries_[0])) {  // more than one gallery
        	
			foreach($galleries_ as $gallery_) {
				if(isset($gallery_['active']) && $gallery_['active'] == 1) {
					$gallery = new AbaboolGallery();
					if(isset($gallery_['id'])) $gallery->id = $gallery_['id'];
					if(isset($gallery_['file'])) $gallery->file = $gallery_['file'];
					if(isset($gallery_['params'])) $gallery->params = $gallery_['params'];
					if(isset($gallery_['name'])) $gallery->name = $gallery_['name'];
					$galleries[] = $gallery; 
				}
			}
		}
		else {    // is not an array because there is only one gallery
			
			if(isset($galleries_['active']) && $galleries_['active'] == 1) {
				$gallery = new AbaboolGallery();
				if(isset($galleries_['id'])) $gallery->id = $galleries_['id'];
				if(isset($galleries_['file'])) $gallery->file = $galleries_['file'];
				if(isset($galleries_['params'])) $gallery->params = $galleries_['params'];
				if(isset($galleries_['name'])) $gallery->name = $galleries_['name'];
				$galleries[] = $gallery; 
			}
			
		}
		
		if(isset($galleries))	$app->galleries = $galleries;
		
	}
	
	if(isset($app->galleries)) {
	
		foreach($app->galleries as $gallery) {
			
			if(isset($gallery->file) && file_exists($app->directory.$gallery->file)) {
				
				$data_g = implode("", file($app->directory.$gallery->file));
				$xml_g = simplexml_load_string($data_g);
				$json_g = json_encode($xml_g);
				$config_g = json_decode($json_g,TRUE);
								
				if(isset($config_g['image'])) $images_ = $config_g['image'];
				
				$images =  array();
				
				if(isset($images_[0])) {  // more than one gallery
        	
					foreach($images_ as $image_) {
						if(isset($image_['active']) && $image_['active'] == 1) {
							$image = new AbaboolImage();
							if(isset($image_['id'])) $image->id = $image_['id'];
							if(isset($image_['file'])) $image->file = $image_['file'];
							if(isset($image_['thumb'])) $image->thumb = $image_['thumb'];
							if(isset($image_['description'])) $image->description = $image_['description'];
							if(isset($image_['params'])) $image->params = $image_['params'];
							if(isset($image_['name'])) $image->name = $image_['name'];
							$image->gallery = $gallery->id;
							$images[] = $image; 
						}
					}
				}
				else {    // is not an array because there is only one gallery
					
					if(isset($images_['active']) && $images_['active'] == 1) {
						$image = new AbaboolImage();
						if(isset($images_['id'])) $image->id = $images_['id'];
						if(isset($images_['file'])) $image->file = $images_['file'];
						if(isset($image_['thumb'])) $image->thumb = $image_['thumb'];
						if(isset($image_['description'])) $image->description = $image_['description'];
						if(isset($images_['params'])) $image->params = $images_['params'];
						if(isset($images_['name'])) $image->name = $images_['name'];
						$image->gallery = $gallery->id;
						$images[] = $image; 
					}
					
				}
				if(isset($images))	$app->images = $images;	
			}
		}
	}

	
?>