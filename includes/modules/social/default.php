<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	
	$mygallery = trim($options);
	$myimages = array();
	
	if(isset($app->galleries) && $app->images && $mygallery) {
		foreach($app->galleries as $thegallery) {
			if(trim($thegallery->id) == $mygallery) {
				foreach($app->images as $theimage) {
					if(trim($theimage->gallery) == $mygallery) $myimages[] = $theimage;
				}
			}
		}
	}
	
	if(isset($myimages)) {
		
		$back  = '
	<div class="mygallery mygallery-'.$mygallery.'"	>
		<div class="row">';
		
		foreach($myimages as $myimage) {
			
			$back  .= '
          <div class="col-xs-6 col-md-3">
            <a href="'.trim($myimage->file).'" class="thumbnail" data-lightbox="'.$mygallery.'">
              <img alt="'.$myimage->name.'" src="'.trim($myimage->thumb).'" style="height: 180px; width: 100%; display: block;">
            </a>
          </div>';
			
		}
		
		$back  .= '
		</div>
	</div>';
		
	
	}
	
	
	
?>