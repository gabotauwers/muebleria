<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="modificarProveedor2.php" method="post">
        <h1>Modificar Proveedor</h1>
        <label for="">Selecciona un proveedor:</label>
        <select name="IdProveedor" id="IdProveedor">
        <?php
    include '../DB/ProveedorDB.php';

    $provedo = new ProveedorDB();
    $provedor = $provedo->mostrarProveedor();

    foreach($provedor as $prov){?>
    <option value="<?=$prov['IdProveedor']?>"><?=$prov['RazonSocial']?></option>
    <?php }?>
        </select>

        <input type="submit" value="Continuar">
    </form>
</body>
</html>