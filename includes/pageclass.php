<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

	class AixeenaPage   {// (*) change to BootlaPage class name
	
		public $id;
		public $dir;
		public $name = null;
		public $principal = 0; // 1 to appear on navigation menu
		public $method = 0; // 1 to ajax loading
		public $active = 0;
		public $scroll = 1;
		
		/* Pages nav system */
		public $idToTheRight = 0;
		public $idToTheLeft = 0;
		public $idToGoUp = 0;
		public $idToGoDown = 0;
		
		public $linkrelprev = 0;
		public $linkrelnext = 0;
		
		public $ineffect = 1;
		public $outeffect = 2;
		public $fadeeffect = 1;
		
		public $loadonpetition = 0;
		public $loadpages = null;
		
		public $og = 1;
		public $ogimage = null;
		
		public $backgroundcolor = null;
		public $backgroundimage = null;			// for example 'img/background01.jpg'       
		public $color = null;
		public $linkcolor = null;
		public $linktextdecoration = 'none';
		public $linkcolorhover;
		public $linktextdecorationhover = 'underline';
		
		public $pageloadjs = null;
		public $pageloadcss = null;
		
		public $css = '';
		public $bodyclass = null;
		
		public $navigator = 1;
		/*  Set this variable to 1/2/3.... to enable the desired navigator */
		
		public $auto_unload = 0; 
		/*  Set this variable to 1, and the page will auto-unload when another page is requested.
		The auto unload is recommended when you are loading Flash (or activeX) wich can generate visual z-index conflicts.
		The content will dissapears and the next time the page is requested will charge with AJAX.
		Remember that if this option is enabled, the page method variable needs to be enabled too. 
		If not, the page will no recharge. */
		
		public $desactivate_url = 0;
	
		
	
		// Declaración del método
	
		public function showstyle() {
	
			
			$back = '
			.pt-page-'.$this->id.' {';
		
			if($this->backgroundimage) $back .= '
			background: url(../'.$this->backgroundimage.') no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			';
				
			if($this->backgroundcolor)  $back .= 'background-color:'.$this->backgroundcolor.';';
			if($this->color)  $back .= 'color:'.$this->color.';';
			$back .= '}
			.pt-page-'.$this->id.' a {';
			if($this->linkcolor)  $back .= 'color:'.$this->linkcolor.';text-decoration:'.$linktextdecoration.';';
			$back .= '}
			.pt-page-'.$this->id.' a:hover {';
			if($this->linkcolorhover)  $back .= 'color:'.$this->linkcolorhover.';text-decoration:'.$linktextdecorationhover.';';
			$back .= '}';
									
			return $back;
			
		
		}
	
	}


?>