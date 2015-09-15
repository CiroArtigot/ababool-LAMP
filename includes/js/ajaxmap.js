// JavaScript Document

	$.getScript('https://www.google.com/jsapi', function() {google.load('maps', '3', { other_params: 'sensor=false', callback: function() {initialize();}});});
	
	var map;
	
	function initialize() {
		
		var mapOptions = {
			zoom: 15,
			center: new google.maps.LatLng($('#centrarlat').val(), $('#centrarlong').val()),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		$('#map-canvas').css({ position: "absolute", left: "0px", top:"52px", width:"100%", height: "100%" });

	}	