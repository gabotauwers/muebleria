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
    else if($varsesion != "Administrador")
    {
        echo "Alguién de " . $varsesion . " no puede acceder como administrador";
        print('<br><a href="Login.php"><button type="button">Regresar</button></a>');
        die();
    }

    if(!isset($_SESSION['rol'])){
        header('location: Login.php');
    }else{
        if($_SESSION['rol'] != "Administrador"){
            header('location : Login.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilos.css">
    <title>Mueblería</title>
</head>

<script>
    function mensajeDeConfirmacion($mensaje) {
       var respuesta = confirm($mensaje);

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

    <h2>Administrador</h2>
    <h3>Elige una opción</h3>
    <ul>
        <li><a href="usuarios.php">Usuarios</a></li><br>
        <li><a href='../MuebleriaGarza/Clientes.php'>Clientes</a></li><br>
        <li><a href='../MuebleriaGarza/Empleados.php'>Empleados</a></li><br>
        <li><a href='../MuebleriaGarza/Productos.php'>Productos</a></li><br>
        <li><a href='../MuebleriaGarza/Proveedores.php'>Proveedores</a></li>

    </ul>
     <a href="cerrar_sesion.php"><button type="button" onclick="return mensajeDeConfirmacion('¿Estás seguro que desea cerrar sesión?')">Cerrar sesión</button> </a>
</body>

</html>