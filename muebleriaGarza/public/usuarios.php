<?php
    include_once '../MuebleriaGarza/DB/database.php';
    
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
    <title>Usuarios</title>
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
<table>
        <th>Nombre</th>
        <th>ApellidoP</th>
        <th>ApellidoM</th>
        <th>Sexo</th>
        <th>FechaNac</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Acceso</th>
        <th>Login</th>
        <th>Password</th>
        <th>Foto</th>
    
    <?php
    include '../MuebleriaGarza/DB/EmpleadosDB.php';

    $emplead = new EmpleadosDB();
    $empleados = $emplead->mostrarEmpleados();

    foreach($empleados as $emp){?>
    <tr>
        <td><?= $emp['NombreEmpleado']?></td>
        <td><?= $emp['ApellidoP']?></td>
        <td><?= $emp['ApellidoM']?></td>
        <td><?= $emp['Sexo']?></td>
        <td><?= $emp['FechaNacimiento']?></td>
        <td><?= $emp['DireccionEmp']?></td>
        <td><?= $emp['Telefono']?></td>
        <td><?= $emp['Email']?></td>
        <td><?= $emp['Acceso']?></td>
        <td><?= $emp['Usuario']?></td>
        <td><?= $emp['Password']?></td>
        <td><img src="data:image/png;base64,<?= $emp['Foto']?>"></td>
    </tr>

    <?php }?>
    </table>
        <th><a href="usuario_nuevo.php"><button type="button">Nuevo</button></a></th>
        <th><a href="usuario_modificar.php"><button type="button">Modificar</button></a></th>
        <th><a href="usuario_eliminar.php"><button type="button">Eliminar</button></a></th>
        <br>
        <a href="cerrar_sesion.php"><button type="button" onclick="return mensajeDeConfirmacion('¿Estás seguro que desea cerrar sesión?')">Cerrar sesión</button> </a>
        <a href="../MuebleriaGarza/reportes/imprimirEmpleados.php">Generar PDF</a>
    </body>
</html>

