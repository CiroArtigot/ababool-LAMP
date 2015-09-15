<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	echo showModule('breadcrumbs', $app, 'ajax2'); 
	
	?>
    
<div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">
<h1>Ababool Page AJAX loaded</h1><br /> 
This page is called and loaded by AJAX and will be reoladed echa time is called!</div>
