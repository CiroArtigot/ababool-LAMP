<?php

	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	
	
	$directory = '';
	if($_GET['token']) include $directory.'ajax.php';	
	else http_response_code(404);
	
	$pagesid_ = $_GET['pagesid'];
	$pagesid = explode(",", $pagesid_);
	$pagesid = array_map('trim',$pagesid);
	
	foreach($pages as $page) { 
		if ($page->loadonpetition && in_array($page->id,$pagesid) ) echo '
		<div id="'.$page->id.'" class="pt-page pt-page-'.$page->id.' page-current-0 '.$page->css.'" data-class="pt-page pt-page-'.$page->id.' page-current-'.$current.' '.$page->css.'" data-bodyclass="'.$page->bodyclass.'" data-url="'.$page->dir.'" data-current="'.$current.'" data-js="'.$page->pageloadjs.'" data-css="'.$page->pageloadcss.'" data-unload="'.$page->auto_unload.'" data-nav="'.$page->navigator.'"  data-idToTheLeft="'.$page->idToTheLeft.'"  data-idToTheRight="'.$page->idToTheRight.'" data-idToGoDown="'.$page->idToGoDown.'"  data-idToGoUp="'.$page->idToGoUp.'"  data-name="'.$page->name.'" data-desactivate="'.$page->desactivate_url.'" data-ineffect="'.$page->ineffect.'" data-outeffect="'.$page->outeffect.'" data-fadeeffect="'.$page->fadeeffect.'" data-scroll="'.$page->scroll.'"  data-loadpages="'.$page->loadpages.'" data-loadonpetition="0">
		<div class="contenido container contentloading clearfix">
			<div class="loadingpage"></div>					
		</div>			 
	</div>';
	} 
	$page->showstyle();
	die();
?>