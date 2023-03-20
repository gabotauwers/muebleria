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
    <h1>Modificar Proveedor</h1>

    <?php 
    include '../DB/ProveedorDB.php';

    $proved = new ProveedorDB();
    $proved= $proved->getProveedor($_POST['IdProveedor']);
    ?>
    <form action="modificarProveedor3.php" method="post" required>
        <h2>Razon Social</h2> <input name="RazonSocial" type="text" value="<?=$proved['RazonSocial']?>" required>
        <h2>RFC</h2> <input name="RegistroFederalContribuyentes" type="text" value="<?=$proved['RegistroFederalContribuyentes']?>" required>
        <h2>Direccion</h2> <input name="DireccionProv" type="text" value="<?=$proved['DireccionProv']?>" required>
        <h2>Telefono</h2> <input name="Telefono" type="text" value="<?=$proved['Telefono']?>" required>
        <h2>Email</h2> <input name="Email" type="text" value="<?=$proved['Email']?>" required>
        <input type="hidden" name="IdProveedor" value="<?=$proved['IdProveedor']?>" required>
        
        <input type="submit" value="Guardar">
    </form>
</body>
</html>