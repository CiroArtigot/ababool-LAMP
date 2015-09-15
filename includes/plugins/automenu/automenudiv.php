<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

?>

   <div class="ababool-auto-menu">
      <ul class="nav navbar-nav">
        <?php 
			foreach($pages as $page) {
				if($page->principal==1) echo '
			<li><a href="#" class="nav-element aixgoto " rel="'.$page->id.'">'.$page->name.'</a></li>';
			} ?>		
      </ul>
    </div>