<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	define('Ababool', 1);

	include 'config.php';
	include $includes_root.'/application.php';
	
?>
<!DOCTYPE html>
<html lang="<?php echo $app->lang; ?>" class="no-js">
<head>
 <meta charset="UTF-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" /><?php echo $app->head; ?>
 
 <link rel="stylesheet" type="text/css" href="<?php echo $includes_root; ?>/default.css.php" />
</head>
<body class="<?php echo $app->bodyclass; ?>">
<?php 

if($app->preloader) echo ' <div class="preloader" id="preloader"></div>';
if(isset($app->onbeginbody)) echo $app->onbeginbody;
if(isset($app->top_menu)) echo $app->top_menu;
if(isset($app->beforepagesload))echo $app->beforepagesload;

echo '
 <div id="pt-main" class="pt-perspective">';
foreach($pages as $page) { if ($page->loadonpetition == 0 || $page->id == $current_page) include $includes_root.'/showpage.php'; } 
echo '
 </div>';

if(isset($app->onpagesload)) echo $app->onpagesload; 
if(isset($app->footer)) echo $app->footer; 
if(isset($app->navigator)) echo $app->navigator; 
?>  
<script src="<?php echo $includes_root; ?>/default.js.php"></script>
<input type="hidden" value="<?php echo $website_root; ?>" name="webroot" id="webroot" />
<input type="hidden" value="<?php echo $params['title']; ?>" name="title" id="title" />
<input type="hidden" name="token" value="<?php echo $app->session; ?>" id="token" />
<?php if(isset($app->onendbody)) echo $app->onendbody; ?> 
</body>
</html>