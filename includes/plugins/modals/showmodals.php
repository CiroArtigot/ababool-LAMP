<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	$modal_buffer = '';

	$modal_buffer .= '
<!-- modal '.$modal->id.'-->
<div class="premodal-md-effect-'.$modal->effect.' premodal-md-effectoff-'.$modal->effectoff.'">
    <div class="md-modal md-modal-initial theme-'.$modal->theme.' md-effect-'.$modal->effect.' md-effectoff-'.$modal->effectoff.'" id="modal-'.$modal->id.'" data-id="'.$modal->id.'" data-load="'.$modal->autoload.'" data-overlay="'.$modal->disableoverlay.'" data-centered="'.$modal->centermodal.'" data-fullwidth="'.$modal->fullwidth.'" data-top="'.$modal->modaltop.'" data-bottom="'.$modal->modalbottom.'" data-left="'.$modal->modalleft.'" data-right="'.$modal->modalright.'" data-minheight="'.$modal->minheight.'" data-minwidth="'.$modal->minwidth.'"  data-height="'.$modal->fixedheight.'" data-width="'.$modal->fixedwidth.'"  data-sizemode="'.$modal->sizemode.'" data-module="'.$modal->id.'" style="visibility:hidden">
        <div class="md-content">
	        <h3 class="h3content">'.$modal->name.'<a href="javascript:void(null);" class="pull-right md-close"><span class=" glyphicon glyphicon-remove"></span></a></h3>
			    <div class="md-content-content">';
			        include($modal->dir);
        $modal_buffer .= '
            </div>	
        </div>
    </div>
</div>
<div class="md-overlay overlay-theme-'.$modal->theme.'" style="display:none;" id="overlay-'.$modal->id.'"></div>
<!-- end of modal -->';
	
	if(isset($app->onpagesload)) $app->onpagesload  .= $modal_buffer;
	else $app->onpagesload = $modal_buffer;
	
?>