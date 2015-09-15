

	function ababool_showmodal($modalid) {

		var $ababool_modal = $('#modal-' + $modalid);
		var $ababool_overlay = $( '#overlay-' +  $modalid ); 
		
		var dataoverlay = $ababool_modal.attr('data-overlay');
		
		$ababool_modal.responsive();
		var viframes = $ababool_modal.find( 'iframe' ); 
		viframes.each( function() {
			var viframe = jQuery( this );	
			viframe.attr( 'src', viframe.attr( 'rel' ));
			viframe.fadeIn('slow');
		});
		
		$(window).bind('resize', function() { $ababool_modal.responsive();	});
		$ababool_overlay.click(function(){	ababool_removemodal($modalid); });
		
		//console.log('dataoverlay:' + dataoverlay);
		
		if(dataoverlay == 0) $ababool_overlay.fadeIn('slow');
		$ababool_modal.css('visibility','visible');
		$ababool_modal.css('display','block');	
		$ababool_modal.removeClass( 'md-show-out');
		$ababool_modal.addClass( 'md-show').on( 'animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function() {
		});
		
		$ababool_modal.find('.md-close').click(function(){ababool_removemodal($modalid);});
	}

	function ababool_removemodal($modalid) {
	
		var $ababool_modal = $('#modal-' + $modalid);
		var $ababool_overlay = $( '#overlay-' +  $modalid ); 
		
		$ababool_overlay.fadeOut( "slow");
		$ababool_modal.removeClass( 'md-show');
			
		$ababool_modal.addClass( 'md-show-out' ).on( 'animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function() {
			if($ababool_modal.hasClass('md-show-out'))	$ababool_modal.css('display','none');	 
		});
			
		var viframes = $ababool_modal.find( 'iframe' ); 
		
		viframes.each( function() {
			var viframe = jQuery( this );	
			viframe.attr( 'src', '');
			//console.log('iframe off:' + viframe.attr( 'src' ));
			viframe.fadeOut('slow');
		});
	
	}



function aixeenamodals() {
	
	
	
	//console.log('modals');
	
	var $main = jQuery( 'body' ); // the body
	var $triggers = $main.find( '.ababoolmodal' );  // all the modal triggers
	
	$triggers.each( function() { // for each trigger on the html body
		
		// the trigger
		var $trigger = jQuery( this ); 
		
		var $modalid = $trigger.attr( 'rel' );
		// the modal
		
		var $modal = jQuery('#modal-' + $modalid);
		
		// hide iframes
		var autoload = $modal.attr( 'data-load' );
	
		
		var viframes = $modal.find( 'iframe' ); 
		viframes.each( function() {
			var viframe = jQuery( this );	
			viframe.attr( 'rel', viframe.attr( 'src' ));
			viframe.attr( 'src', '');
			viframe.hide();
		});
		// The overlay
		var $overlay = jQuery( '#overlay-' +  $modalid ); 

		//call to responsive function
		$modal.responsive();	
		
		// trigger on click function		
		$trigger.click(function() {	ababool_showmodal( $modalid );});
		
		//console.log('Auto load:' + autoload);
		
		var minwidth = parseInt($modal.attr( 'data-minwidth' ));
		var minheight = parseInt($modal.attr('data-minheight'));
		if(minwidth>0 && (minwidth > jQuery( window ).width())) autoload = 0;
		if(minheight>0 && (minheight > jQuery( window ).height())) autoload = 0;
		
		if(autoload==1) ababool_showmodal( $modalid );
		
		$modal.find('.md-close').click(function(){ababool_removemodal($modalid );});
		
	});	
	
}



(function($){
	
     $.fn.extend({
          center: function (options) {
               var options =  $.extend({ // Default values
                    inside:window, // element, center into window
                    transition: 0, // millisecond, transition time
                    minX:0, // pixel, minimum left element value
                    minY:0, // pixel, minimum top element value
                    withScrolling:false, // booleen, take care of the scrollbar (scrollTop)
                    vertical:true, // booleen, center vertical
                    horizontal:true // booleen, center horizontal
               }, options);
               return this.each(function() {
                    var props = {position:'fixed'};
                    if (options.vertical) {
                         var top = ($(options.inside).height() - ($(this).outerHeight() )) / 2;
                         if (options.withScrolling) top += $(options.inside).scrollTop() || 0;
                         top = (top > options.minY ? top : options.minY);
                         $.extend(props, {top: top+'px'});
                    }
                    if (options.horizontal) {
                          var left = ($(options.inside).width() - ($(this).outerWidth())) / 2;
                          if (options.withScrolling) left += $(options.inside).scrollLeft() || 0;
                          left = (left > options.minX ? left : options.minX);
                          $.extend(props, {left: left+'px'});
                    }
                    if (options.transition > 0) $(this).animate(props, options.transition);
                    else $(this).css(props);
                    return $(this);
               });
          }
     });

     $.fn.extend({
          responsive: function (options) {
               var options =  $.extend({ // Default values
                    inside:window
               }, options);
               return this.each(function() {
						
					// WIDTH operations
					
					var sizemode = $(this).attr('data-sizemode');
					var fullwidth = $(this).attr('data-fullwidth');
					var centered = $(this).attr('data-centered');
					
					var mtop = $(this).attr('data-top');
					var mbottom = $(this).attr('data-bottom');
					var mleft = $(this).attr('data-left');
					var mright = $(this).attr('data-right');
					
					// this is the actual window width
					var windowwidth = $(options.inside).width();
					//console.log('windowwidth:' + windowwidth);
					
					// this is the actual modal with
					var modalwidth = $(this).outerWidth();
					//console.log('modalwidth:' + modalwidth);
					
					// this is the desired modal with
					var datawidth = parseInt($(this).attr('data-width'));
					//console.log('datawidth:' + datawidth);	
					
					// this is the question
					// is the window width bigger than the desired with?
				
					
					
				
					
					if(sizemode==3 || fullwidth==1) {
						
						$(this).width(windowwidth);
						
					} else {
					
						if( windowwidth >= (datawidth + 20) || sizemode == 2) {
							// if yes it is, then allways the modal width must be like the desired width
							$(this).width(datawidth);
						}
						else {
							// if no, then the desired with is bigger than posible so the modal with
							// will be the window with resting 20 margin pixels
							$(this).width(windowwidth - 20);
						}
					
					}
					
					// HEIGHT operations
					var windowheight = $(options.inside).height(); 
					var $header = $(this).find('.h3content').outerHeight();
					if($header==null) $header = 0;
					var $buttons = $(this).find('.md-buttons').outerHeight();
					if($buttons==null) $buttons = 0;
					
					var $border = $(this).find('.md-content').css('border');
					var $paddingtop = $(this).find('.md-content-content').css('padding-top');
					var $paddingbottom = $(this).find('.md-content-content').css('padding-bottom');					
					var modalheight = $(this).outerHeight();
					var dataheight = parseInt($(this).attr('data-height')) 
					
					if(sizemode==3) {
						
						$sizefinal = parseInt(windowheight) - parseInt($buttons) - parseInt($header) - parseInt($paddingtop) - parseInt($border)  - parseInt($border) - parseInt($paddingbottom);
						$(this).find('.md-content-content').height($sizefinal); 
						
					} else {
					
						if( windowheight >= (dataheight + 20) || sizemode == 2) {
							$sizefinal = parseInt(dataheight) - parseInt($buttons) - parseInt($header) - parseInt($paddingtop) - parseInt($paddingbottom);
							$(this).find('.md-content-content').height($sizefinal);
						}
						else {
							$sizefinal = parseInt(windowheight) - 20 - parseInt($buttons) - parseInt($header) - parseInt($paddingtop) - parseInt($paddingbottom);
							$(this).find('.md-content-content').height($sizefinal); 
						}
					}
					
				   if(centered==1) { $(this).center(); }
				   else {
					   
					   if(mtop)  $(this).css({ top: mtop + 'px' });
					   if(mbottom)  $(this).css({ bottom: mbottom + 'px' });
					   if(mleft)  $(this).css({ left: mleft + 'px' });
					   if(mright)  $(this).css({ right: mright + 'px' });
					   
				   }
                    
					
					return $(this);
               });
          }
     });
	 
})(jQuery);

jQuery(window).load	(function() {
							  
		oldinpage2 = $.fn.inpage;
		$.fn.inpage = function(inpage) {
			oldinpage2(inpage);
			aixeenamodals();
			return;	
		};
			  
	  	aixeenamodals();
});
