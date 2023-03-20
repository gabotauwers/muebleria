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
    $provedor->agregaProveedor($_POST);

    $provedor = $provedor->mostrarProveedor();
    ?>

    <h1>Registro insertado!</h1>

    <table>
        <th>Razon Social</th>
        <th>RFC</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
    
    <?php
    foreach($provedor as $pro){?>
    <tr>
        <td><?= $pro['RazonSocial']?></td>
        <td><?= $pro['RegistroFederalContribuyentes']?></td>
        <td><?= $pro['DireccionProv']?></td>
        <td><?= $pro['Telefono']?></td>
        <td><?= $pro['Email']?></td>
    </tr>

    <?php }?>
    </table>
</body>
</html>