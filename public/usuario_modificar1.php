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
    <script src="../JS/jquery.js"></script>
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
    <h1>Modificar Empleado</h1>

    <?php 
    include '../MuebleriaGarza/DB/EmpleadosDB.php';

    $emplead = new EmpleadosDB();
    $emplead= $emplead->getEmpleado($_POST['idEmpleado']);
    ?>

<h2>Foto</h2><img id="fotoActual" src="data:image/png;base64,<?= $emplead['Foto']?>">
    <div id="miCanva">
    <input id="fotoExistente" name="Foto" type="hidden" value="<?=$emplead['Foto']?>">
        <input type="button" id="cambiarFoto" value="Cambiar foto" onclick="EmpezarFoto()">
        <input type="button" id="quitarFoto" value="Quitar foto" onclick="QuitarFoto()">
    </div>
        <div id="foto"></div>
    <form action="usuario_modificar2.php" method="post">
    <h2>Nombre</h2> <input name="NombreEmpleado" type="text" value="<?=$emplead['NombreEmpleado']?>" required>
        <h2>Apellido Paterno</h2> <input name="ApellidoP" type="text" value="<?=$emplead['ApellidoP']?>" required>
        <h2>Apellido Materno</h2> <input name="ApellidoM" type="text" value="<?=$emplead['ApellidoM']?>" required>
        <h2>Sexo</h2> 
        <select list="Sexo" name="Sexo" required>
            <option value="M"> Masculino </option>
            <option value="F"> Femenino </option>
        </select>
        <h2>Fecha de nacimiento</h2> <input name="FechaNacimiento" type="date" value="<?=$emplead['FechaNacimiento']?>" required>
        <h2>Direccion</h2> <input name="DireccionEmp" type="text" value="<?=$emplead['DireccionEmp']?>" required>
        <h2>Telefono</h2> <input name="Telefono" type="text" value="<?=$emplead['Telefono']?>" required>
        <h2>Email</h2> <input name="Email" type="text" value="<?=$emplead['Email']?>" required>
        <h2>Acceso</h2> <select list="Acceso" name="Acceso" require>
            <option value="Administrador"> Administrador </option>
            <option value="Almacen"> Almacen </option>
            <option value="Ventas"> Ventas </option>
        </select>
        <h2>Usuario</h2> <input name="Usuario" type="text" value="<?=$emplead['Usuario']?>" required>
        <h2>Contraseña</h2> <input name="Password" type="password" value="<?=$emplead['Password']?>" required>
        <div id="fotografia">
            <div id="cambia">
                <input id="fotoExistente" type="hidden" name="Foto" type="text" value="<?=$emplead['Foto']?>" required>
            </div>
        </div>
        <input type="hidden" name="IdEmpleado" value="<?=$emplead['IdEmpleado']?>">
    
        <input type="submit" value="Guardar" onclick="return mensajeDeConfirmacion('¿Estás seguro que desea actualizar la información de este usuario?')">
    </form>
    <a href="cerrar_sesion.php"><button type="button" onclick="return mensajeDeConfirmacion('¿Estás seguro que desea cerrar sesión?')">Cerrar sesión</button> </a>
    <img id="img" src="../public/img/usuario.png" style="display: none">
</body>
<script src="../JS/actualizar.js"></script>
</html>