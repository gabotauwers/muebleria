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
    <h1>Eliminar Proveedor</h1>
    <form action="eliminarProveedor2.php" method="post">
        <label for="">Selecciona un proveedor:</label>
        <select name="IdProveedor" id="">
            <?php
            include '../DB/ProveedorDB.php';

            $proved = new ProveedorDB();
            $provedor = $proved->mostrarProveedor();

            foreach($provedor as $provedo){?>
            <option value="<?=$provedo['IdProveedor']?>"><?=$provedo['RazonSocial']?> </option>
            <?php }?>
        </select>
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>