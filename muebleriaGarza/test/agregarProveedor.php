<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="agregarProveedor2.php" method="post">
    <a href="../Proveedores.php">Inicio</a>
        <h1>Agregar Provedor</h1>
        <h2>Razon Social</h2> <input name="RazonSocial" type="text" value=""> required
        <h2>RFC</h2> <input name="RegistroFederalContribuyentes" type="text" value="" required>
        <h2>Direccion</h2> <input name="DireccionProv" type="text" value="" required>
        <h2>Telefono</h2> <input name="Telefono" type="text" value="" required>
        <h2>Email</h2> <input name="Email" type="text" value="" required>
        
        <input type="submit" value="Guardar">
    </form>
    
</body>
</html>