// JavaScript Document


	$('#btncal7').click(function(){	
			
			if(!$.isNumeric($("#d1").val())||!$.isNumeric($("#d2").val())) {
				
				alert('Introduce los kilometros y las veces que haces el recorrido');
				return;
			}
			
			if(!$.isNumeric($("#d6").val())) {
				
				alert('Introduce el numero de niños que ocupan el coche');
				return;
			}
			
			calcular();
			
			$('#btncal7').hide();
			$('#resultadoa').show();
	});
	
	$('#btncal8').click(function(){	
			
			if(!$.isNumeric($("#d1").val())||!$.isNumeric($("#d2").val())) {
				
				alert('Introduce los kilometros y las veces que haces el recorrido');
				return;
			}
			
			if(!$.isNumeric($("#d6").val())) {
				
				alert('Introduce el numero de niños que ocupan el coche');
				return;
			}
			
			calcular();
			
			
			$('#btncal7').hide();
			$('#resultadoa').show();
	});
	
	$('#btncal9').click(function(){	
			resetear();
			$('#btncal7').show();
			$('#resultadoa').hide();
	});
	
	
	function resetear() {
		
			$('#d1').val('');
			$('#d2').val('');
			$('#d6').val('');
			$('#d3').val(1);
			$('#d4').val(1);
			$('#d5').val(1);
	
	}
	
	
	
	function calcular() {
		
		
		
			
			
			var kilometros = parseInt($("#d1").val()) * parseInt($("#d2").val());
		
			var litros = 0;
			var emisiones = 0;
			var euros = 0;
		
			if($("#d3").val()==3) {  //si vienes en coche
				
				//alert('coche:' + kilometros);
				
				var kmtotales = kilometros * 177;
				var kmtotalespornino = ( kmtotales / parseInt($("#d6").val()));
				var preciog = 1.43;
				var preciod = 1.334;
				
				
				if($("#d5").val()==1) precio = preciog;
				else precio = preciod;
				
				if($("#d5").val()==1) {
					if($("#d4").val()==1) { //Utilitario 
						var litros = (kmtotalespornino/100) * 5.4;
						var emisiones = (kmtotalespornino/1000) * 125;
						var euros = (kmtotalespornino) * 0.07722;
					}
					if($("#d4").val()==2) { //Compacto
						var litros = (kmtotalespornino/100) * 6.8;
						var emisiones = (kmtotalespornino/1000) * 159;
						var euros = (kmtotalespornino) * 0.09724;
					}
					if($("#d4").val()==3) { //Berlina y familiares 
						var litros = (kmtotalespornino/100) * 6.1;
						var emisiones = (kmtotalespornino/1000) * 142;
						var euros = (kmtotalespornino) * 0.08723;
					}
					if($("#d4").val()==4) { //Monovolumen medio  
						var litros = (kmtotalespornino/100) * 6.9;
						var emisiones = (kmtotalespornino/1000) * 159;
						var euros = (kmtotalespornino) * 0.09867;
					}
					if($("#d4").val()==5) { //Monovolumen grande 
						var litros = (kmtotalespornino/100) * 7.3;
						var emisiones = (kmtotalespornino/1000) * 172;
						var euros = (kmtotalespornino) * 0.10439;
					}
					if($("#d4").val()==6) { //Todoterreno medio
						var litros = (kmtotalespornino/100) * 6.2;
						var emisiones = (kmtotalespornino/1000) * 144;
						var euros = (kmtotalespornino) * 0.08866;
					}
					if($("#d4").val()==7) { //Todoterreno grande
						var litros = (kmtotalespornino/100) * 6.9;
						var emisiones = (kmtotalespornino/1000) * 159;
						var euros = (kmtotalespornino) * 0.09867;
					}
				}
				
				
				if($("#d5").val()==2) {
					if($("#d4").val()==1) { //Utilitario 
						var litros = (kmtotalespornino/100) * 3.8;
						var emisiones = (kmtotalespornino/1000) * 99;
						var euros = (kmtotalespornino) * 0.050692;
					}
					if($("#d4").val()==2) { //Compacto
						var litros = (kmtotalespornino/100) * 3.5;
						var emisiones = (kmtotalespornino/1000) * 90;
						var euros = (kmtotalespornino) * 0.04669;
					}
					if($("#d4").val()==3) { //Berlina y familiares 
						var litros = (kmtotalespornino/100) * 4.3;
						var emisiones = (kmtotalespornino/1000) * 114;
						var euros = (kmtotalespornino) * 0.057362;
					}
					if($("#d4").val()==4) { //Monovolumen medio  
						var litros = (kmtotalespornino/100) * 4.6;
						var emisiones = (kmtotalespornino/1000) * 120;
						var euros = (kmtotalespornino) * 0.061364;
					}
					if($("#d4").val()==5) { //Monovolumen grande 
						var litros = (kmtotalespornino/100) * 6;
						var emisiones = (kmtotalespornino/1000) * 159;
						var euros = (kmtotalespornino) * 0.08004;
					}
					if($("#d4").val()==6) { //Todoterreno medio
						var litros = (kmtotalespornino/100) * 5.2;
						var emisiones = (kmtotalespornino/1000) * 137;
						var euros = (kmtotalespornino) * 0.069368;
					}
					if($("#d4").val()==7) { //Todoterreno grande
						var litros = (kmtotalespornino/100) * 5.3;
						var emisiones = (kmtotalespornino/1000) * 139;
						var euros = (kmtotalespornino) * 0.070702;
					}
				}
						
				
				
				

				
			}
			
		
		
			$('#litros').html(litros.toFixed(2));
			
			$('#euros').html(euros.toFixed(2));
			$('#emisiones').html(emisiones.toFixed(2));
			


		
		
	}
	