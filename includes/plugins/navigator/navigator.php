<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
	
	$app->navigator = '
<div id="navigator">
    <div class="navigator" style="display:none">
        <div class="navigator_arrow arrow_right">
            <a id="navright" class="aixgoto aixgotoright" style="display:none" rel="" data-animation="1"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <div class="navigator_arrow arrow_left">
            <a id="navleft"  class="aixgoto aixgotoleft" style="display:none" rel="" data-animation="2"><span class="glyphicon glyphicon-chevron-left"></span></a>
        </div>
        <div class="navigator_arrow arrow_up">
            <a  id="navup" class="aixgoto aixgotoup" style="display:none" rel="" data-animation="3"><span class="glyphicon glyphicon-chevron-up"></span></a>
        </div>
        <div class="navigator_arrow arrow_down">
            <a id="navdown"  class="aixgoto aixgotodown" style="display:none" rel="" data-animation="4"><span class="glyphicon glyphicon-chevron-down"></span></a>  
        </div>
    </div>
</div>';


?>