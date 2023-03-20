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
    include '../DB/ProveedorDB.php';

    $provedor = new ProveedorDB();
    $provedor->modificaProveedor($_POST);

    $provedor = $provedor->mostrarProveedor();
    ?>
    <h1>Registro actualizado!</h1>

    <table>
        <th>Razon Social</th>
        <th>RFC</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
    
    <?php
    foreach($provedor as $prov){?>
    <tr>
        <td><?= $prov['RazonSocial']?></td>
        <td><?= $prov['RegistroFederalContribuyentes']?></td>
        <td><?= $prov['DireccionProv']?></td>
        <td><?= $prov['Telefono']?></td>
        <td><?= $prov['Email']?></td>
    </tr>

    <?php }?>
    </table>

</body>
</html>