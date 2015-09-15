<?php
	
	// @package    Ababool 1.0.0
	// @copyright  Copyright (C) 2014 Ciro Artigot (@ciroartigot). All rights reserved.
	// @license    GNU General Public License version 3 or later (GPLv3); see http://www.gnu.org/copyleft/gpl.html
	 
	defined('Ababool') or http_response_code(404);
		
	foreach($pages_ as $page) {

			if(isset($page['active']) && $page['active'] == 1) {

				$newpage = new AixeenaPage();	
				$newpage->id = $page['id'];
				$newpage->dir = $page['dir'];
				if(isset($page['name']) && $page['name']) $newpage->name = $page['name'];
				if(isset($page['principal']) && $page['principal']) $newpage->principal = $page['principal'];
				if(isset($page['backgroundcolor']) && $page['backgroundcolor']) $newpage->backgroundcolor = $page['backgroundcolor'];
				if(isset($page['backgroundimage']) && $page['backgroundimage']) $newpage->backgroundimage = $page['backgroundimage'];
				if(isset($page['backgroundimagemode']) && $page['backgroundimagemode']) $newpage->backgroundimagemode = $page['backgroundimagemode'];
				if(isset($page['backgroundimagerepeat']) && $page['backgroundimagerepeat']) $newpage->backgroundimagerepeat = $page['backgroundimagerepeat'];
				if(isset($page['backgroundimageposition']) && $page['backgroundimageposition']) $newpage->backgroundimageposition = $page['backgroundimageposition'];
				if(isset($page['color']) && $page['color']) $newpage->color = $page['color'];
				if(isset($page['linkcolor']) && $page['linkcolor']) $newpage->linkcolor = $page['linkcolor'];
				if(isset($page['linktextdecoration']) && $page['linktextdecoration']) $newpage->linktextdecoration = $page['linktextdecoration'];
				if(isset($page['linkcolorhover']) && $page['linkcolorhover']) $newpage->linkcolorhover = $page['linkcolorhover'];
				if(isset($page['linktextdecorationhover']) && $page['linktextdecorationhover']) $newpage->linktextdecorationhover = $page['linktextdecorationhover'];
				
				if(isset($page['navigator']) && $page['navigator']) $newpage->navigator = $page['navigator'];
				if(isset($page['method']) && $page['method']) $newpage->method = $page['method'];
				if(isset($page['auto_unload']) && $page['auto_unload']) $newpage->auto_unload = $page['auto_unload'];
				if(isset($page['pageloadjs']) && $page['pageloadjs']) $newpage->pageloadjs = $page['pageloadjs'];
				if(isset($page['pageloadcss']) && $page['pageloadcss']) $newpage->pageloadcss = $page['pageloadcss'];
				if(isset($page['idToTheRight']) && $page['idToTheRight']) $newpage->idToTheRight = $page['idToTheRight'];
				if(isset($page['idToTheLeft']) && $page['idToTheLeft']) $newpage->idToTheLeft = $page['idToTheLeft'];
				if(isset($page['idToGoUp']) && $page['idToGoUp']) $newpage->idToGoUp = $page['idToGoUp'];
				if(isset($page['idToGoDown']) && $page['idToGoDown']) $newpage->idToGoDown = $page['idToGoDown'];
				if(isset($page['linkrelprev']) && $page['linkrelprev']) $newpage->linkrelprev = $page['linkrelprev'];
				if(isset($page['linkrelnext']) && $page['linkrelnext']) $newpage->linkrelnext = $page['linkrelnext'];
				if(isset($page['desactivateurl']) && $page['desactivateurl']) $newpage->desactivate_url = $page['desactivateurl'];
				if(isset($page['css']) && $page['css']) $newpage->css = $page['css'];
				if(isset($page['ineffect']) && $page['ineffect']) $newpage->ineffect = $page['ineffect'];
				if(isset($page['outeffect']) && $page['outeffect']) $newpage->outeffect = $page['outeffect'];
				if(isset($page['fadeeffect'])) $newpage->fadeeffect = $page['fadeeffect'];
				if(isset($page['scroll'])) $newpage->scroll = $page['scroll'];
				if(isset($page['bodyclass'])) $newpage->bodyclass = $page['bodyclass'];
				
				if(isset($page['og']) && $page['og']) $newpage->linkrelprev = $page['og'];
				if(isset($page['ogimage']) && $page['ogimage']) $newpage->linkrelnext = $page['ogimage'];
				
				if(isset($page['loadonpetition']) && $page['loadonpetition']) $newpage->loadonpetition = 1;
				else $newpage->loadonpetition = 0;
				//$page['loadonpetition'];
				if(isset($page['loadpages'])) $newpage->loadpages = $page['loadpages'];
				
				
				//if(isset($page['']) && $page['']) $newpage-> = $page[''];
	
				$pages[] = $newpage;
			
			}

		//$app->pages = $pages;

	}
	

?>