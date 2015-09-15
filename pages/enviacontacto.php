<?php 

	define('Ababool', 1);

	session_start();
	
	//error_reporting(-1);
	//ini_set('display_errors', 1);

	if( empty($_SESSION['BootlaSession']) || ($_SESSION['BootlaSession'] != $_POST['token'] ) ) die("Your session had expired");
	
	  
	$IP = $_SERVER['REMOTE_ADDR'];
	$token =  $_SESSION['BootlaSession'];
	$mensaje = $_POST['mensaje'];
	$asunto = $_POST['asunto'];
	$email= $_POST['email'];
	$nombre= $_POST['nombre'];
	$info = (int) $_POST['info'];


	$para      = 'info@aixeena.org';
	$titulo    = '[Ababool] ' .$asunto;
	$mensaje   = 'De: '.$nombre. "\r\n". 'Asunto: '.$asunto. "\r\n"."\r\n".$mensaje. "\r\n". "\r\n" .'IP: '. $IP;
	$cabeceras = 'From: '.$email. "\r\n" .
		'Reply-To: ' .$email. "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	mail($para, $titulo, $mensaje, $cabeceras);
 
 	echo 'Thanks for contact us. Ababool team.';

?>