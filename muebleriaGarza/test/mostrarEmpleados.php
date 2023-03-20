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
    <h1>Todos los empleados</h1>

    <table>
        <th>Nombre</th>
        <th>Apellido Paterno </th>
        <th>Apellido Materno</th>
        <th>Sexo</th>
        <th>Fecha de Nacimiento</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Acceso</th>
        <th>Usuario</th>
        <th>Password</th>
    
    <?php
    include '../DB/EmpleadosDB.php';

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
    </tr>

    <?php }?>
    </table>
    <a href="../reportes/imprimirEmpleados.php">Generar PDF</a>
</body>
</html>