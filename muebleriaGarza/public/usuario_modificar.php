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
        echo "Solo los administradores pueden modificar usuarios";
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
    <title>Modificar</title>
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
    <form action="usuario_modificar1.php" method="post">
        <h1>Modificar Empleado</h1>
        <label for="">Selecciona un empleado:</label>
        <select name="idEmpleado" id="idEmpleado">
        <?php
    include '../MuebleriaGarza/DB/EmpleadosDB.php';

    $emplead = new EmpleadosDB();
    $empleados = $emplead->mostrarEmpleados();

    foreach($empleados as $emp){?>
    <option value="<?=$emp['IdEmpleado']?>"><?=$emp['NombreEmpleado']?> <?=$emp['ApellidoP']?></option>
    <?php }?>
        </select>

        <input type="submit" value="Continuar">
    </form>

    <a href="cerrar_sesion.php"><button type="button" onclick="return mensajeDeConfirmacion('¿Estás seguro que desea cerrar sesión?')">Cerrar sesión</button> </a>
</body>
</html>