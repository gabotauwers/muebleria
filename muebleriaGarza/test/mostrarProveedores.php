<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../Proveedores.php">Inicio</a>
    <h1>Todos los proveedores</h1>

    <table>
        <th>Razon Social</th>
        <th>RCF </th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
    
    <?php
    include '../DB/ProveedorDB.php';

    $provedo = new ProveedorDB();
    $provedores = $provedo->mostrarProveedor();

    foreach($provedores as $pro){?>
    <tr>
        <td><?= $pro['RazonSocial']?></td>
        <td><?= $pro['RegistroFederalContribuyentes']?></td>
        <td><?= $pro['DireccionProv']?></td>
        <td><?= $pro['Telefono']?></td>
        <td><?= $pro['Email']?></td>
    </tr>

    <?php }?>
    </table>
    <a href="../reportes/imprimirProveedores.php">Generar PDF</a>
</body>
</html>