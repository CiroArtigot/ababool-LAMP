<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

	$username="xxxx";
	$password="xxx";
	$database="x";
	$host = "xxxx";

	$con = mysqli_connect($host, $username, $password, $database);
	// Check connection
	if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

?>