<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

	$data_url = '';
	$data_js = '';
	$data_css = '';
	$getcss = '';

	if($page->method==1) {
		$content = '<div class="loadingpage"></div>';			
		$data_url = $page->dir;
		$data_js = $page->pageloadjs;
		$data_css = $page->pageloadcss;
		$getcss = 'contentloading';			
	}
	

    $current = 0;
    if(trim($page->id) == $current_page) $current = 1;
    
	echo '
<div id="'.$page->id.'" class="pt-page pt-page-'.$page->id.' page-current-'.$current.' '.$page->css.'" data-class="pt-page pt-page-'.$page->id.' page-current-'.$current.' '.$page->css.'" data-bodyclass="'.$page->bodyclass.'" data-url="'.$data_url.'" data-current="'.$current.'" data-js="'.$data_js.'" data-css="'.$data_css.'" data-unload="'.$page->auto_unload.'" data-nav="'.$page->navigator.'"  data-idToTheLeft="'.$page->idToTheLeft.'"  data-idToTheRight="'.$page->idToTheRight.'" data-idToGoDown="'.$page->idToGoDown.'"  data-idToGoUp="'.$page->idToGoUp.'"  data-name="'.$page->name.'" data-desactivate="'.$page->desactivate_url.'" data-ineffect="'.$page->ineffect.'" data-outeffect="'.$page->outeffect.'" data-fadeeffect="'.$page->fadeeffect.'" data-scroll="'.$page->scroll.'" data-loadpages="'.$page->loadpages.'" data-loadonpetition="'.$page->loadonpetition.'">
    <div class="contenido container '.$getcss.' clearfix">';
	
 	if($page->method==0)  include $page->dir;
	else echo $content;
	
	include 'pageevent.php';

 	echo '					
    </div>			 
</div>';			


			

?>