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
        echo "Solo los administradores pueden agregar usuarios";
        print('<br><a href="Login.php"><button type="button">Regresar</button></a>');
        die();
    }
?>
<?php
include_once '../DB/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/jquery.js"></script>
    <title>Nuevo usuario</title>
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
<h1>Agregar Empleado</h1>
<h2>Foto</h2> <input type="button" value="Agregar foto" onclick="EmpezarFoto()">
<div id="foto"></div>
<form action="usuario_nuevo1.php" method="POST">
        <h2>Nombre</h2> <input name="NombreEmpleado" type="text" value="" required>
        <h2>Apellido Paterno</h2> <input name="ApellidoP" type="text" value="" required>
        <h2>Apellido Materno</h2> <input name="ApellidoM" type="text" value="" required>
        <h2>Sexo</h2> 
        <select list="Sexo" name="Sexo" required>
            <option value="Masculino"> Masculino </option>
            <option value="Femenino"> Femenino </option>
        </select>
        <h2>Fecha de nacimiento</h2> <input name="FechaNacimiento" type="date" value="" required>
        <h2>Direccion</h2> <input name="DireccionEmp" type="text" value="" required>
        <h2>Telefono</h2> <input name="Telefono" type="number" value="" required>
        <h2>Email</h2> <input name="Email" type="email" value="" required>
        <h2>Acceso</h2> 
        <select list="Acceso" name="Acceso" required>
            <option value="Administrador"> Administrador </option>
            <option value="Almacen"> Almacen </option>
            <option value="Ventas"> Ventas </option>
        </select>
        <h2>Login</h2> <input name="Usuario" type="text" value="" required>
        <h2>Password</h2> <input name="Password" type="password" value="" required>
        <div id="fotografia">
            <input type="hidden" id="Fotografia" name="Foto" type="text" value="<?=base64_encode(file_get_contents("img/usuario.png"));?>" required>
        </div>
    <br>
    <button type="submit" onclick="return mensajeDeConfirmacion('¿Estás seguro que desea agregar un nuevo usuario?')">Guardar</button>
    <br>
    <a href="cerrar_sesion.php"><button type="button" onclick="return mensajeDeConfirmacion('¿Estás seguro que desea cerrar sesión?')">Cerrar sesión</button> </a>
    <a href="../MuebleriaGarza/reportes/imprimirEmpleados.php">Generar PDF</a>
</form>
</body>
<script src="../JS/crear.js"></script>
</html>