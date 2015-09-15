<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

	$modals_ = $config['modals']['modal'];

	include 'modalclass.php';
	include 'modals.php';
	
	$modalpageevent = 0;
	
	foreach($modals as $modal) {
	    include 'showmodals.php';
	}
	

	
?>