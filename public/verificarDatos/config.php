<?php // aqui en config se hace la conexion a db
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "muebleria_garza";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
?>

