<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	class BootApp   {

		public $session;
		public $footer = null;
		public $navigator = null;
		public $bodyclass = null;
		public $head = null;
		public $modules = null;
		public $menus = null;
		public $plugins = null;
		public $current = null;
		public $canonical = null;
		public $uri = null;
		public $script_name = null;
		public $url_tag = null; 
		public $title = null;
		public $lang = null;
		public $linkrelnext = null;
		public $linkrelprev = null;
		public $metadescription = null;
		public $website_root = null;
		public $includes_root = null;
		public $configuration_root = null;
		public $pages = null;
		public $directory = '';
		public $preloader = 0;
		public $galleries = null;
		public $params = null;
		public $ogimage = null;

		public function start() {
			session_start(); 
			if(isset($_SESSION['BootlaSession'])) {
				$this->session = $_SESSION['BootlaSession']; // decode Bootla sesion
			} else { 
				$this->session = $this->newGUID();
				$_SESSION['BootlaSession'] = $this->session;
			}
		}
	
	
		public function newGUID() {
	
			return $GUID = $this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar()."-".$this->genChar().$this->genChar().$this->genChar().$this->genChar()."-".$this->genChar().$this->genChar().$this->genChar().$this->genChar()."-".$this->genChar().$this->genChar().$this->genChar().$this->genChar()."-".$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar().$this->genChar();
		
		}
		
		public function genChar(){
			$possible = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			return $char;
		}
	
	}

	
?>