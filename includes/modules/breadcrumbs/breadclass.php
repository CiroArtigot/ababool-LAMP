<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

	if(!class_exists('AbaboolBread')) {
	
		class AbaboolBread   { // (*) change to BootlaPage class name
			public $level = 0;
			public $parent = null;
			public $page = null;
			public $name = null;
			public $last = 0;
		}
		
	}


?>