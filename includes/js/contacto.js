// JavaScript Document

console.log('sss');
				
	$('#enviacontacto').click(function(){	
									   
		console.log('qwqw');
						
		var token = $('#token').val(); 
		var codcole =  $('#codcolemapa').val();
		var email =  $('#email').val();
		
		var nombre =  $('#nombre').val();
		
		var info = 0;
		if($('#info').is(":checked")) info = 1;
		
		var asunto =  $('#asunto').val();
		var mensaje =  $('#mensaje').val();
		
		if(!email || !asunto  || !mensaje  || !nombre )  {
			alert('PLease fill al the mandatory fields.');
			return;
		}

		
		$.post("pages/enviacontacto.php", { codcole: codcole, token: token, nombre:nombre, info:info, email:email, asunto:asunto, mensaje:mensaje},  
							function(result){ alert(result);});  
	
		
	});
						
					
			
				