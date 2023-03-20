<?php  
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['rol'];
    if($varsesion == null || $varsesion == '')
    {
        echo "No ha iniciado sesesión";
        print('<br><a href="Login.php"><button type="button">Regresar</button></a>');
        die();
    }
    else if($varsesion != "Administrador")
    {
        echo "Solo los administradores pueden eliminar usuarios";
        print('<br><a href="Login.php"><button type="button">Regresar</button></a>');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <a href="administrador.php"><button type="button">Inicio</button> </a>
    <h1>Eliminar Empleado</h1>
    <form action="usuario_eliminar1.php" method="post">
        <label for="">Selecciona un empleado:</label>
        <select name="IdEmpleado" id="">
            <?php
            include '../MuebleriaGarza/DB/EmpleadosDB.php';

            $emplead = new EmpleadosDB();
            $empleados = $emplead->mostrarEmpleados();

            foreach($empleados as $empleado){?>
            <option value="<?=$empleado['IdEmpleado']?>"><?=$empleado['NombreEmpleado']?> <?=$empleado['ApellidoP']?></option>
            <?php }?>
        </select>
        <input type="submit" value="Eliminar" onclick="return mensajeDeConfirmacion('¿Estás seguro que desea eliminar el usuario seleccionado?')">
    </form>
    <a href="cerrar_sesion.php"><button type="button" onclick="return mensajeDeConfirmacion('¿Estás seguro que desea cerrar sesión?')">Cerrar sesión</button> </a>
    <a href="../MuebleriaGarza/reportes/imprimirEmpleados.php">Generar PDF</a>
</body>
</html>