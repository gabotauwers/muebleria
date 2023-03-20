<?php  
	session_start();
	error_reporting(0);

	$varsesion = $_SESSION['rol'];

	if($varsesion = null || $varsesion == '')
	{
		echo "No hay ninguna sesión activa";
		die();
	}

	session_destroy();
	header("Location:Login.php");	
?>