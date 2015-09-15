	
		
		
		
	$( document ).ready(function() {
		
		(function( $ ) {
			$.fn.pageLoaded = function() {
				return;
			};
		}( jQuery ));
		
		(function( $ ) {
			$.fn.inpage = function(inpage) {
				return;
			};
		}( jQuery ));
		
		(function( $ ) {
			$.fn.outpage = function(outpage) {
				return;
			};
		}( jQuery ));
		
		var PageTransitions = (function() {

		var $main = $( '#pt-main' ),
		$pages = $main.children( 'div.pt-page' ),
		animcursor = 1,
		pagesCount = $pages.length,
		current = 0,
		token = $('#token').val(), 
		pahtlocationglobal = $('#webroot').val(),
		isAnimating = false,
		endCurrPage = false,
		endNextPage = false,
		animEndEventNames = {
			'WebkitAnimation' : 'webkitAnimationEnd',
			'OAnimation' : 'oAnimationEnd',
			'msAnimation' : 'MSAnimationEnd',
			'animation' : 'animationend'
		},
		animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ];
		 
		var sw = 0;
		$pages.each(function() {
				var $page = $(this);
				if($page.attr('data-current')==1) current =  sw; 
				sw++;
		} );

		function loadcontent(current, pahtlocation) {

			var bootlajax = $.get('loadcontent.php?current=' + encodeURIComponent($pages.eq(current).attr('id')) + '&pageid=' + encodeURIComponent($pages.eq(current).attr('id')) + '&token=' + token, function(data) {									
					$pages.eq(current).find('.contenido').html(data);
					$pages.eq(current).find('.contenido').removeClass('contentloading');
					$pages.eq(current).find('.contenido').hide();
				})
				.done(function() { 
					$pages.eq(current).find('.contenido').fadeIn('slow', function() {});			   
					//Apends js and css
					if($pages.eq(current).attr('data-js') ) { $('head').append('<script src="' + $pages.eq(current).attr('data-js')  + '"></script>');}
					if($pages.eq(current).attr('data-css') ) { $("head").append("<link rel='stylesheet' href='" + $pages.eq(current).attr('data-css') + "' type='text/css' media='screen'>");}
					
					//look if there is any new navigation button
					$(".aixgoto").click(function(){				 							 
						onclickdothis($(this), pahtlocation);	
					});
					
					$.fn.inpage($pages.eq(current));
				})
			
		}
		

		function init() { 
		
            var pahtlocation = pahtlocationglobal;
		
			$pages.each(function() {
				var $page = $(this);
				$page.data( 'originalClassList', $page.attr( 'data-class' ) );		
			} );	
			
			//set current page
			$pages.eq(current).find('.contenido').fadeIn('slow');
			$pages.eq(current).addClass( 'pt-page-current' );
			
			if($pages.eq(current).attr('data-url') && $pages.eq(current).find('.contentloading').html()) {	
				loadcontent(current, pahtlocation);
			} 
			
			else {
                $(".aixgoto").click(function(){	
					onclickdothis($(this), pahtlocation);						 
                }); 
			}
			
			//$.fn.initsystem();
			
			if($.fn.swipe) {
			
				$('body').swipe( {
					swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
						if(direction=='right' && $pages.eq(current).attr('data-idtotheright') && !isAnimating){	
						pregotoPage( animcursor,  $pages.eq(current).attr('data-idtotheright'), 1, pahtlocation);
						}
						if(direction=='left' && $pages.eq(current).attr('data-idtotheleft') && !isAnimating){
						pregotoPage( animcursor,  $pages.eq(current).attr('data-idtotheleft'), 2, pahtlocation);
						}
						if(direction=='down' && $pages.eq(current).attr('data-idtogodown') && !isAnimating){
						pregotoPage( animcursor,  $pages.eq(current).attr('data-idtogodown'), 4, pahtlocation);
						}
						if(direction=='up' && $pages.eq(current).attr('data-idtogoup') && !isAnimating){
						pregotoPage( animcursor,  $pages.eq(current).attr('data-idtogoup'), 3, pahtlocation);
						}
					},
					//Default is 75px, set to 0 for demo so any distance triggers swipe
					threshold:0
				});
			}
			
	
			initPage($pages.eq( current ));
		}
		
		function onclickdothis(thetrigger, pahtlocation){
			
			if( isAnimating ) { return false;}	
			gotopageid = thetrigger.attr('rel');
			clase = thetrigger.attr('data-animation');	
            $currPage = $pages.eq( current );
            if(gotopageid==$currPage.attr('id')) return;
			if($currPage.attr('data-fadeeffect')==1)  {
				$currPage.find('.contenido').fadeOut('slow', function() {
					pregotoPage( animcursor,  gotopageid, clase, pahtlocation);
				});
			} else {
				pregotoPage( animcursor,  gotopageid, clase, pahtlocation);
			}
	
		}
		
		function pregotoPage( animation, gotopageid, clase, pahtlocation) {
			
			var pageok = 0;
			$pages.each( function() {
				var $page = $( this );	
				if($page.attr('id')==gotopageid) { 
					pageok = 1; }
			} );
			
			if(pageok) { gotoPage( animation, gotopageid, clase, pahtlocation) ;}
			else {
				
				var preloaderajax = $.get('loadpage.php?pageid=' + encodeURIComponent(gotopageid) + '&token=' + token , function(data) 	
				{$('#pt-main').append(data); 
				})
				.done(function() { 
							   
							   
							   
					onnewpageload();
					$.fn.pageLoaded(); 
					gotoPage( animation, gotopageid, clase, pahtlocation) ;
				})
			}

		}
		
		function onnewpageload() {
			$pages = $( '#pt-main' ).children( 'div.pt-page' );
			pagesCount = $pages.length;
			$pages.each(function() {
				var $page = $(this);
				$page.data( 'originalClassList', $page.attr( 'data-class' ) );		
			} );
		};
					  
		function gotoPage( animation, gotopageid, clase, pahtlocation) {
		
			if( isAnimating ) {return false;}
			var frompage = current;
			var $currPage = $pages.eq( current );	//this is our current page
			var pageoutcss = $currPage.attr('data-outeffect');
			
			$pages.each( function() {
				var $page = $( this );	
				if($page.attr('id')==gotopageid) { 
					current = $page.index(); }
			} );
			
			//console.log('frompage: ' + frompage);
			//console.log('current: ' + current);
			//console.log('gotopageid: ' + gotopageid);
			 
			if(frompage == current) return; // removes goto current page	
		
			isAnimating = true;
	
			var $nextPage = $pages.eq( current ).addClass( 'pt-page-current' ),
				outClass = '', inClass = '';
				
			//console.log('$currPage: ' + $currPage.attr('id'));		
			//console.log('$nextPage: ' + $nextPage.attr('id'));		
				
			
			var pageurl = $pages.eq( current );         //but nextpage and pageurl aren´t the same object???
			var dataurl = pageurl.attr('data-url');
			var datajs = pageurl.attr('data-js');
			var datacss = pageurl.attr('data-css');
			var pageincss = pageurl.attr('data-ineffect');
			
			if(clase) animation = parseInt(clase);
			
			if(!animation) {
                if(pageincss) inClass = pageincss;
                else inClass="pt-moveFromRight";
                if(pageoutcss) outClass = pageoutcss;
                else outClass="pt-moveToLeft";
			} 
			else {
                switch(animation){
                    case 1:outClass="pt-moveToLeft";inClass="pt-moveFromRight";break;
                    case 2:outClass="pt-moveToRight";inClass="pt-moveFromLeft";break;
                    case 3:outClass="pt-moveToTop";inClass="pt-moveFromBottom";break;
                    case 4:outClass="pt-moveToBottom";inClass="pt-moveFromTop";break;
                    case 5:outClass="pt-fade";inClass="pt-moveFromRight pt-ontop";break;
                    case 6:outClass="pt-fade";inClass="pt-moveFromLeft pt-ontop";break;
                    case 7:outClass="pt-fade";inClass="pt-moveFromBottom pt-ontop";break;
                    case 8:outClass="pt-fade";inClass="pt-moveFromTop pt-ontop";break;
                    case 9:outClass="pt-moveToLeftFade";inClass="pt-moveFromRightFade";break;
                    case 10:outClass="pt-moveToRightFade";inClass="pt-moveFromLeftFade";break;
                    case 11:outClass="pt-moveToTopFade";inClass="pt-moveFromBottomFade";break;
                    case 12:outClass="pt-moveToBottomFade";inClass="pt-moveFromTopFade";break;
                    case 13:outClass="pt-moveToLeftEasing pt-ontop";inClass="pt-moveFromRight";break;
                    case 14:outClass="pt-moveToRightEasing pt-ontop";inClass="pt-moveFromLeft";break;
                    case 15:outClass="pt-moveToTopEasing pt-ontop";inClass="pt-moveFromBottom";break;
                    case 16:outClass="pt-moveToBottomEasing pt-ontop";inClass="pt-moveFromTop";break;
                    case 17:outClass="pt-scaleDown";inClass="pt-moveFromRight pt-ontop";break;
                    case 18:outClass="pt-scaleDown";inClass="pt-moveFromLeft pt-ontop";break;
                    case 19:outClass="pt-scaleDown";inClass="pt-moveFromBottom pt-ontop";break;
                    case 20:outClass="pt-scaleDown";inClass="pt-moveFromTop pt-ontop";break;
                    case 21:outClass="pt-scaleDown";inClass="pt-scaleUpDown pt-delay300";break;
                    case 22:outClass="pt-scaleDownUp";inClass="pt-scaleUp pt-delay300";break;
                    case 23:outClass="pt-moveToLeft pt-ontop";inClass="pt-scaleUp";break;
                    case 24:outClass="pt-moveToRight pt-ontop";inClass="pt-scaleUp";break;
                    case 25:outClass="pt-moveToTop pt-ontop";inClass="pt-scaleUp";break;
                    case 26:outClass="pt-moveToBottom pt-ontop";inClass="pt-scaleUp";break;
                    case 27:outClass="pt-scaleDownCenter";inClass="pt-scaleUpCenter pt-delay400";break;
                    case 28:outClass="pt-rotateRightSideFirst";inClass="pt-moveFromRight pt-delay200 pt-ontop";break;
                    case 29:outClass="pt-rotateLeftSideFirst";inClass="pt-moveFromLeft pt-delay200 pt-ontop";break;
                    case 30:outClass="pt-rotateTopSideFirst";inClass="pt-moveFromTop pt-delay200 pt-ontop";break;
                    case 31:outClass="pt-rotateBottomSideFirst";inClass="pt-moveFromBottom pt-delay200 pt-ontop";break;
                    case 32:outClass="pt-flipOutRight";inClass="pt-flipInLeft pt-delay500";break;
                    case 33:outClass="pt-flipOutLeft";inClass="pt-flipInRight pt-delay500";break;
                    case 34:outClass="pt-flipOutTop";inClass="pt-flipInBottom pt-delay500";break;
                    case 35:outClass="pt-flipOutBottom";inClass="pt-flipInTop pt-delay500";break;
                    case 36:outClass="pt-rotateFall pt-ontop";inClass="pt-scaleUp";break;
                    case 37:outClass="pt-rotateOutNewspaper";inClass="pt-rotateInNewspaper pt-delay500";break;
                    case 38:outClass="pt-rotatePushLeft";inClass="pt-moveFromRight";break;
                    case 39:outClass="pt-rotatePushRight";inClass="pt-moveFromLeft";break;
                    case 40:outClass="pt-rotatePushTop";inClass="pt-moveFromBottom";break;
                    case 41:outClass="pt-rotatePushBottom";inClass="pt-moveFromTop";break;
                    case 42:outClass="pt-rotatePushLeft";inClass="pt-rotatePullRight pt-delay180";break;
                    case 43:outClass="pt-rotatePushRight";inClass="pt-rotatePullLeft pt-delay180";break;
                    case 44:outClass="pt-rotatePushTop";inClass="pt-rotatePullBottom pt-delay180";break;
                    case 45:outClass="pt-rotatePushBottom";inClass="pt-rotatePullTop pt-delay180";break;
                    case 46:outClass="pt-rotateFoldLeft";inClass="pt-moveFromRightFade";break;
                    case 47:outClass="pt-rotateFoldRight";inClass="pt-moveFromLeftFade";break;
                    case 48:outClass="pt-rotateFoldTop";inClass="pt-moveFromBottomFade";break;
                    case 49:outClass="pt-rotateFoldBottom";inClass="pt-moveFromTopFade";break;
                    case 50:outClass="pt-moveToRightFade";inClass="pt-rotateUnfoldLeft";break;
                    case 51:outClass="pt-moveToLeftFade";inClass="pt-rotateUnfoldRight";break;
                    case 52:outClass="pt-moveToBottomFade";inClass="pt-rotateUnfoldTop";break;
                    case 53:outClass="pt-moveToTopFade";inClass="pt-rotateUnfoldBottom";break;
                    case 54:outClass="pt-rotateRoomLeftOut pt-ontop";inClass="pt-rotateRoomLeftIn";break;
                    case 55:outClass="pt-rotateRoomRightOut pt-ontop";inClass="pt-rotateRoomRightIn";break;
                    case 56:outClass="pt-rotateRoomTopOut pt-ontop";inClass="pt-rotateRoomTopIn";break;
                    case 57:outClass="pt-rotateRoomBottomOut pt-ontop";inClass="pt-rotateRoomBottomIn";break;
                    case 58:outClass="pt-rotateCubeLeftOut pt-ontop";inClass="pt-rotateCubeLeftIn";break;
                    case 59:outClass="pt-rotateCubeRightOut pt-ontop";inClass="pt-rotateCubeRightIn";break;
                    case 60:outClass="pt-rotateCubeTopOut pt-ontop";inClass="pt-rotateCubeTopIn";break;
                    case 61:outClass="pt-rotateCubeBottomOut pt-ontop";inClass="pt-rotateCubeBottomIn";break;
                    case 62:outClass="pt-rotateCarouselLeftOut pt-ontop";inClass="pt-rotateCarouselLeftIn";break;
                    case 63:outClass="pt-rotateCarouselRightOut pt-ontop";inClass="pt-rotateCarouselRightIn";break;
                    case 64:outClass="pt-rotateCarouselTopOut pt-ontop";inClass="pt-rotateCarouselTopIn";break;
                    case 65:outClass="pt-rotateCarouselBottomOut pt-ontop";inClass="pt-rotateCarouselBottomIn";break;
                    case 66:outClass="pt-rotateSidesOut";inClass="pt-rotateSidesIn pt-delay200";break;
                    case 67:outClass="pt-rotateSlideOut";inClass="pt-rotateSlideIn";break;
                }
			}
			
			
			if($nextPage.attr('data-loadpages')) {
				
				var dataloadpages = $nextPage.attr('data-loadpages');
				var dataloadpagesarray = dataloadpages.split(",");
				var loadstring = '';
				var loadall = 0;
				
				dataloadpagesarray.forEach(function(entry) {
					var loadit = 1;						
					$pages.each(function() {
						var $page = $(this);
						if($page.attr('id') == entry.trim()) loadit = 0;							
					} );								
					if(loadit) {
						loadstring = loadstring + entry.trim() + ',';
						loadall = 1;
					}
				});
				
				if(loadall) {
					var preloaderajaxpages = $.get('loadpages.php?pagesid=' + encodeURIComponent(loadstring) + '&token=' + token , function(data) 	{
						$('#pt-main').append(data);})
					.done(function() { 
						onnewpageload();	
						$.fn.pageLoaded(); 
						$nextPage.attr('data-loadpages','');
					});
				}
			}
					
			$.fn.outpage($currPage);
					
			$currPage.addClass( outClass ).on( animEndEventName, function() {
			
				$('body').removeClass('bodyclass-' + $currPage.attr('data-bodyclass'));
				$('body').removeClass('bodyid-' + $currPage.attr('id'));
			
				$currPage.off( animEndEventName );
				endCurrPage = true;
				if( endNextPage ) {
				    if($nextPage.attr('data-fadeeffect')==1)  {
    					$nextPage.find('.contenido').fadeIn('slow', function() {
    						onEndAnimation( $currPage, $nextPage, dataurl, datajs, datacss, pahtlocation );
    					});
				    } else {
				        	onEndAnimation( $currPage, $nextPage, dataurl, datajs, datacss, pahtlocation );
				    }
				}
			} );
	
			$.fn.inpage($nextPage);
	
			$nextPage.addClass( inClass ).on( animEndEventName, function() {	
																		 
				if($nextPage.attr('data-bodyclass'))  {
					$('body').addClass('bodyclass-' + $nextPage.attr('data-bodyclass'));
				}
				$('body').addClass('bodyid-' + $nextPage.attr('id'));
				
				$nextPage.off( animEndEventName );
				endNextPage = true;
				if( endCurrPage ) {
				    if($nextPage.attr('data-fadeeffect')==1)  {
    					$nextPage.find('.contenido').fadeIn('slow', function() {
    						onEndAnimation( $currPage, $nextPage, dataurl, datajs, datacss, pahtlocation );
    					});
				    } else {
				        onEndAnimation( $currPage, $nextPage, dataurl, datajs, datacss, pahtlocation );
				    }
				}
			} );
		}

		// function on end animation
		function onEndAnimation( $outpage, $inpage, dataurl, datajs, datacss, pahtlocation ) {
			
			// if content needs to be loaded via AJAX 
			if(dataurl&&$inpage.find('.contentloading').html()) {	
				loadcontent(current, pahtlocation);
			} 
			endCurrPage = false;
			endNextPage = false;
			resetPage( $outpage, $inpage, pahtlocation );
			isAnimating = false;
		}

		function navigator_ ($inpage) {
		    
			$('#navright').attr('rel', $inpage.attr( 'data-idtotheright')) ;
			$('#navleft').attr('rel',$inpage.attr( 'data-idtotheleft')) ;
			$('#navup').attr('rel', $inpage.attr( 'data-idtogoup')) ;
			$('#navdown').attr('rel', $inpage.attr( 'data-idtogodown')) ;
			var shownavigator = 0;
			
			if($('#navright').attr('rel')!=0) { $('#navright').show(); shownavigator = 1; }
			else  { $('#navright').hide(); }
			
			if($('#navleft').attr('rel')!=0) { $('#navleft').show(); shownavigator = 1; }
			else  { $('#navleft').hide(); }
			
			if($('#navup').attr('rel')!=0) { $('#navup').show(); shownavigator = 1; }
			else  { $('#navup').hide(); }
			
			if($('#navdown').attr('rel')!=0) { $('#navdown').show(); shownavigator = 1; }
			else  { $('#navdown').hide(); }
			
			$('#navigator').removeClass() ;
			$('#navigator').addClass('navigator-' + $inpage.attr( 'data-nav'));
			
			if(shownavigator) $('.navigator').fadeIn();
			else  $('.navigator').hide();
					
		}	

		// resetPage goes after onEndAnimation, so when the inpage is alredy loaded
		function initPage( $inpage ) {
			$inpage.attr( 'class', $inpage.data( 'originalClassList' ) + ' pt-page-current' );	
			if($inpage.attr('data-bodyclass'))  {
				$('body').addClass('bodyclass-' + $inpage.attr('data-bodyclass'));
			}
			$('body').addClass('bodyid-' + $inpage.attr('id'));		
			
			$.fn.inpage($inpage);
			if($('.navigator')) navigator_ ($inpage);
		}

		// resetPage goes after onEndAnimation, so when the inpage is alredy loaded
		
		function resetPage( $outpage, $inpage, pahtlocation ) {
			    
			
			//console.log("$outpage.data( 'originalClassList' ) : " + $outpage.data( 'originalClassList' ) );
			
			$outpage.attr( 'class', $outpage.data( 'originalClassList' ) );
			
			$('#goback').attr('rel', $outpage.attr('id')) ;
			$('.goback').attr('rel', $outpage.attr('id')) ;
		
            var pahtlocationfull = pahtlocation +  $inpage.attr('id');
            
            var activeurl =  1;
            var desactivateurl =  $inpage.attr('data-desactivate');
            
            if(desactivateurl==1) activeurl = 0;
            
            if(activeurl==1) {
                document.title = $inpage.attr('data-name') + ' - ' + $('#title').val();
                window.history.pushState({}, "Title", pahtlocationfull);
            }
		
			if($outpage.attr('data-unload')=='1') {
				$outpage.find('.contenido').html('<div class="loadingpage"></div>');
				$outpage.find('.contenido').addClass('contentloading');	
			}
			
			
			
			$inpage.attr( 'class', $inpage.data( 'originalClassList' ) + ' pt-page-current' );
	
			if($('.navigator')) navigator_ ($inpage);  
			
		}
			
		init();
		return { init : init };


	})();
		

	
});

