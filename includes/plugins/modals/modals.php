<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	foreach($modals_ as $modal) {

		$newmodal = new BootlaModals();	
		$newmodal->id = $modal['id'];
		$newmodal->dir = $modal['dir'];
		$newmodal->name = $modal['name'];
		
		if(isset($modal['method']) && $modal['method']) $newmodal->method = $modal['method'];
		if(isset($modal['effect']) && $modal['effect']) $newmodal->effect = $modal['effect'];
		if(isset($modal['effectoff']) && $modal['effectoff']) $newmodal->effectoff = $modal['effectoff'];
		if(isset($modal['theme']) && $modal['theme']) $newmodal->theme = $modal['theme'];
		if(isset($modal['autoload']) && $modal['autoload']) $newmodal->autoload = $modal['autoload'];
		if(isset($modal['disableoverlay']) && $modal['disableoverlay']) $newmodal->disableoverlay = $modal['disableoverlay'];
		
		if(isset($modal['centermodal']) && $modal['centermodal'] == 1) $newmodal->centermodal = $modal['centermodal'];
		else $newmodal->centermodal =0;
		
		if(isset($modal['fullwidth']) && $modal['fullwidth']) $newmodal->fullwidth = $modal['fullwidth'];
		if(isset($modal['modaltop']) && $modal['modaltop']) $newmodal->modaltop = $modal['modaltop'];
		if(isset($modal['modalbottom']) && $modal['modalbottom']) $newmodal->modalbottom = $modal['modalbottom'];
		if(isset($modal['modalleft']) && $modal['modalleft']) $newmodal->modalleft= $modal['modalleft'];
		if(isset($modal['modalright']) && $modal['modalright']) $newmodal->modalright = $modal['modalright'];
		if(isset($modal['minheight']) && $modal['minheight']) $newmodal->minheight = $modal['minheight'];
		if(isset($modal['minwidth']) && $modal['minwidth']) $newmodal->minwidth = $modal['minwidth'];
		if(isset($modal['fixedheight']) && $modal['fixedheight']) $newmodal->fixedheight = $modal['fixedheight'];
		if(isset($modal['fixedwidth']) && $modal['fixedwidth']) $newmodal->fixedwidth = $modal['fixedwidth'];
		if(isset($modal['sizemode']) && $modal['sizemode']) $newmodal->sizemode = $modal['sizemode'];
		
        //if(isset($modal['']) && $modal['']) $newmodal-> = $modal[''];

		$modals[] = $newmodal;
			
	}
	
	
?>