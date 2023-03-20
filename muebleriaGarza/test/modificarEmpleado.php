<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="modificarEmpleado2.php" method="post">
        <h1>Modificar Empleado</h1>
        <label for="">Selecciona un empleado:</label>
        <select name="IdEmpleado" id="IdEmpleado">
        <?php
    include '../DB/EmpleadosDB.php';

    $emplead = new EmpleadosDB();
    $empleados = $emplead->mostrarEmpleados();

    foreach($empleados as $emp){?>
    <option value="<?=$emp['IdEmpleado']?>"><?=$emp['NombreEmpleado']?> <?=$emp['ApellidoP']?></option>
    <?php }?>
        </select>

        <input type="submit" value="Continuar">
    </form>
</body>
</html>