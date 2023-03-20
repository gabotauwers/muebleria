<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include '../DB/clientesDB.php';

    $cliente = new ClientesDB();
    $cliente->getModificar($_POST);

    $cliente = $cliente->getClientes();
    ?>
    <h1>Registro actualizado!</h1>

    <table>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Sexo</th>
        <th>Fecha de Nacimiento</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Credito</th>
        <th>Email</th>
    
    <?php
    foreach($cliente as $cli){?>
    <tr>
        <td><?= $cli['NombreCliente']?></td>
        <td><?= $cli['ApellidoP']?></td>
        <td><?= $cli['ApellidoM']?></td>
        <td><?= $cli['Sexo']?></td>
        <td><?= $cli['FechaNacimiento']?></td>
        <td><?= $cli['DireccionCli']?></td>
        <td><?= $cli['Telefono']?></td>
        <td><?= $cli['Credito']?></td>
        <td><?= $cli['Email']?></td>
    </tr>

    <?php }?>
    </table>

</body>
</html>