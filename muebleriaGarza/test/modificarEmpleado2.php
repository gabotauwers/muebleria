<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../Empleados.php">Inicio</a>
    <h1>Modificar Empleado</h1>

    <?php 
    include '../DB/EmpleadosDB.php';

    $emplead = new EmpleadosDB();
    $emplead= $emplead->getEmpleado($_POST['IdEmpleado']);
    ?>
    <form action="modificarEmpleado3.php" method="post">
    <h2>Nombre</h2> <input name="NombreEmpleado" type="text" value="<?=$emplead['NombreEmpleado']?>" require>
        <h2>Apellido Paterno</h2> <input name="ApellidoP" type="text" value="<?=$emplead['ApellidoP']?>" require>
        <h2>Apellido Materno</h2> <input name="ApellidoM" type="text" value="<?=$emplead['ApellidoM']?>" require>
        <h2>Sexo</h2> 
        <select list="Sexo" name="Sexo" require>
            <option value="Masculino"> Masculino </option>
            <option value="Femenino"> Femenino </option>
        </select>
        <h2>Fecha de nacimiento</h2> <input name="FechaNacimiento" type="date" value="<?=$emplead['FechaNacimiento']?>" require>
        <h2>Direccion</h2> <input name="DireccionEmp" type="text" value="<?=$emplead['DireccionEmp']?>" require>
        <h2>Telefono</h2> <input name="Telefono" type="text" value="<?=$emplead['Telefono']?>" require>
        <h2>Email</h2> <input name="Email" type="text" value="<?=$emplead['Email']?>" require>
        <h2>Acceso</h2> <select list="Acceso" name="Acceso" require>
            <option value="Administrador"> Administrador </option>
            <option value="Almacen"> Almacen </option>
            <option value="Ventas"> Ventas </option>
        </select>
        <h2>Usuario</h2> <input name="Usuario" type="text" value="<?=$emplead['Usuario']?>" require>
        <h2>Password</h2> <input name="Password" type="text" value="<?=$emplead['Password']?>" require>
        <input type="hidden" name="IdEmpleado" value="<?=$emplead['IdEmpleado']?>">
        
        <input type="submit" value="Guardar">
    </form>
</body>
</html>