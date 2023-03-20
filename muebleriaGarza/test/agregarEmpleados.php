<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="agregarEmpleados2.php" method="post">
        <a href="../Empleados.php">Inicio</a>
        <h1>Agregar Empleado</h1>
        <h2>Nombre</h2> <input name="NombreEmpleado" type="text" value="" require>
        <h2>Apellido Paterno</h2> <input name="ApellidoP" type="text" value="" require>
        <h2>Apellido Materno</h2> <input name="ApellidoM" type="text" value="" require>
        <h2>Sexo</h2> 
        <select list="Sexo" name="Sexo" require>
            <option value="Masculino"> Masculino </option>
            <option value="Femenino"> Femenino </option>
        </select>
        <h2>Fecha de nacimiento</h2> <input name="FechaNacimiento" type="date" value="" require>
        <h2>Direccion</h2> <input name="DireccionEmp" type="text" value="" require>
        <h2>Telefono</h2> <input name="Telefono" type="number" value="" require>
        <h2>Email</h2> <input name="Email" type="email" value="" require>
        <h2>Acceso</h2> 
        <select list="Acceso" name="Acceso" require>
            <option value="Administrador"> Administrador </option>
            <option value="Almacen"> Almacen </option>
            <option value="Ventas"> Ventas </option>
        </select>
        <h2>Login</h2> <input name="Usuario" type="text" value="" require>
        <h2>Password</h2> <input name="Password" type="password" value="" require>
        
        <input type="submit" value="Guardar">
    </form>
    
</body>
</html>