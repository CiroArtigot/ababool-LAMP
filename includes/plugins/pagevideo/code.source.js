
// pagevideo plugin for Ababool by @ciroartigot

$( document ).ready(function() {
							 
	oldinpage = $.fn.inpage;
	$.fn.inpage = function(inpage) {
		oldinpage(inpage);
		var videopage = inpage.find( '.backgroundvideo' );
		videopage.each( function() {
			var videoback= jQuery( this );
			
			
		
			
			try 
			{
			videoback[0].play();
			
			console.log('ok');
			} 
			catch (err) {
			  console.log('error');
			}
		
			
			
			
		});
		return;
	};
	
	oldoutpage = $.fn.outpage;
	$.fn.outpage = function(outpage) {
		oldoutpage(outpage);
		var videopage = outpage.find( '.backgroundvideo' );
		videopage.each( function() {
			var videoback= jQuery( this );
			
			try 
			{
			videoback[0].pause();
			} 
			catch (err) {
			  console.log('error');
			}
			
			
		});
		return;
	};
});