<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

	class BootlaModals   {// (*) change to BootlaPage class name
	    
	    public $page = '';
		public $id = '';
		public $dir = '';
		public $name = '';
		public $method = 0; // 1 to ajax loading
		public $effect = 1;
		public $effectoff = 1;
		public $theme = 1;
		public $autoload = 0;
		public $disableoverlay = 0;
		public $centermodal = 1;
		public $fullwidth = 0;
		public $modaltop = '';
		public $modalbottom = '';
		public $modalleft = '';
		public $modalright = '';
		public $minheight = '';
		public $minwidth = '';
		public $fixedheight = '';
		public $fixedwidth = '';
		public $sizemode = '';

	}


?>