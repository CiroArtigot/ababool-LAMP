<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	echo showModule('breadcrumbs', $app, 'gallery'); 
	
	?>
    
<div class="">
<h1>Gallery demo</h1><br /> 


 <?php echo showModule('gallery', $app, 'gallery1'); ?>

</div>
