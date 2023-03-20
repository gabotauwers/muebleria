<?php  
	session_start();
    error_reporting(0);
    $varsesion = $_SESSION['rol'];
    if($varsesion == null || $varsesion == '')
    {
        echo "No ha iniciado sesión";
        print('<br><a href="Login.php"><button type="button">Regresar</button></a>');
        die();
    }
    else if($varsesion != "Ventas")
    {
        echo "Alguién de " . $varsesion . " no puede acceder a Ventas";
        print('<br><a href="Login.php"><button type="button">Regresar</button></a>');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ventas</title>
</head>
<script>
    function confirmarCerrarSesion() {
       var respuesta = confirm("¿Estás seguro que desea cerrar sesión?");

       if(respuesta == true)
       {
            return true;
       }
       else
       {
            return false;
       }
    }
</script>
<body>
<h2>Ventas</h2>
    <h3>Elige una opción</h3>
    <ul>
        <li><a href='../MuebleriaGarza/Clientes.php'>Clientes</a></li><br>
        <li><a href='../MuebleriaGarza/Productos.php'>Productos</a></li><br>
    </ul>
	<a href="cerrar_sesion.php"><button type="button" onclick="return confirmarCerrarSesion()">Cerrar sesión</button> </a>
</body>
</html>