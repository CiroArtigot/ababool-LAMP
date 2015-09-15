<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	class AbaboolModule   {// (*) change to BootlaPage class name
	
		public $id;
        public $file = null;
        public $active = 0;
        public $params = null;
	
		public function showmodule($app, $options = null) {
			$back = '';
			include $app->directory.$this->file;
			return $back;
		}
	
	}


?>