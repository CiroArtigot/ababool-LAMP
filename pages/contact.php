<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);

	
	?>
    
<div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">
<h1>Contact us</h1><br />
<form>
  <fieldset>
    <div class="form-group">
      <label for="exampleInputEmail">
      Email: </label>
      <input type="text" class="form-control span4" id="email" style="width:350px"  placeholder="Email">
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail">
      Name: </label>
      <input type="text" class="form-control span4" id="nombre" style="width:350px"  placeholder="Name">
    </div>
    
    <div class="form-group">
      <label for="asunto">
      Subject: </label>
      <input type="text" class="form-control span4" id="asunto"  style="width:350px" placeholder="Subject">
    </div>
    
    <div class="form-group">
      <label for="mensaje">
      Message:</label>
      <textarea id="mensaje"  class="form-control" rows="10" cols="40" style="width:400px; height:200px;" ></textarea>
    
    </div>
    
     <div class="form-group">
      <label for="mensaje">
      I want to receive Ababool News: </label>
    <input type="checkbox" value="1" id="info" />
    
    </div>
  
    <button type="button" class="btn btn-default" id="enviacontacto">Send</button><br />
    <br />
  </fieldset>
</form><br /><br /><br />

</div>