<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	foreach($plugins as $plugin) {
		if(isset($plugin['id']) && $plugin['id']=='topmenu') {
			$params_automenu = $plugin['params'];
		}
	}

	$top_menu = '
 <header class="navbar navbar-fixed-top bs-docs-nav" id="top" role="navigation">
 	<div class="container">
		<div class="navbar-header">';
        
        if($params_automenu['showhomeicon']) $top_menu .= '
			<a class="navbar-brand navbar-brand-ico aixgoto" href="javascript:void(null);" rel="'.$pages[0]->id.'" data-animation="60"><span class="glyphicon glyphicon-home"></span></a>';
	    
	    if($params_automenu['showgoback']) $top_menu .= '
			<a id="goback" class="navbar-brand navbar-brand-ico aixgoto" href="javascript:void(null);" rel="" data-animation="2" ><span class="glyphicon glyphicon-arrow-left"></span></a>'; 
	      
	    if($params_automenu['showbrand']) { 	
	
	        if($params_automenu['brandimage']) $brandimage = 'brandimage';
	        else $brandimage = '';
	
		if($params_automenu['brandhome']) $brantxt = ' class="navbar-brand brandlogo aixgoto '.$brandimage.'"  href="javascript:void(null);" rel="'.$pages[0]->id.'" ';
		else $brantxt = ' class="navbar-brand navbar-brand-brand '.$brandimage.'" href="'.$brandlink.'"';	
	
		$top_menu .= '
			<a '.$brantxt.'>'.$params_automenu['brand'].'</a>';
	    }  
	        
    $top_menu .= '    
			<button class="navbar-toggle aixgoto" type="button" rel="automenu" data-animation="3">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
			<ul class="nav navbar-nav">
            ';
        foreach($pages as $page) {
		
				if($page->ineffect) $ineffect = $page->ineffect;
				else $ineffect = '2';
		
				if($page->principal==1) $top_menu .=  '
				<li><a href="javascript:void(null);" class=" aixgoto " rel="'.$page->id.'" data-animation="'.$ineffect.'">'.$page->name.'</a></li>';
			}     
            
          
    $top_menu .= '  
			</ul>
		</nav>
	</div>
 </header>
 
 						<div class="aixeenasocial aixeena_soc aixeena_soc-right" id="aixsoc117">
                            <a href="https://twitter.com/CiroArtigot" class="aixeena_social_href btn-href-twitter " title="" target="_blank"><img src="img/twitter.png" class="aixsocimg btn-twitter  aixeena_social_img_rotate  alt=""></a>
							<!--
                            <a href="/javascript:void(null);" class="aixeena_social_href btn-href-facebook " title="" target="_blank">
                                <img src="img/facebook.png" class="aixsocimg btn-facebook  aixeena_social_img_rotate  alt="">
                            </a>
                            <a href="javascript:void(null);" class="aixeena_social_href btn-href-googleplus " title="" target="_blank">
                                <img src="img/googleplus.png" class="aixsocimg btn-googleplus  aixeena_social_img_rotate  alt="">
                            </a>-->
                            <a href="http://es.linkedin.com/in/ciroartigot" class="aixeena_social_href btn-href-linkedin " title="" target="_blank"><img src="img/linkedin.png" class="aixsocimg btn-linkedin  aixeena_social_img_rotate  alt=""></a>
                            <a href="https://github.com/CiroArtigot" class="aixeena_social_href btn-href-github " title="" target="_blank"><img src="img/github.png" class="aixsocimg btn-github  aixeena_social_img_rotate  alt=""></a>
                        </div>
 
 
 
 ';
	
	$app->top_menu = $top_menu;

	//automenu page for mobiles 
	$newpage = new AixeenaPage();	
	$newpage->id = 'automenu';
    $newpage->dir = 'plugins/automenu/automenudiv.php' ;
	$newpage->principal=0;
	$newpage->name='Automenu';
	$newpage->backgroundcolor = "#FFF";
	$newpage->color = "#333";
	$newpage->linkcolor = "Red";	
	$pages[] = $newpage;


?>