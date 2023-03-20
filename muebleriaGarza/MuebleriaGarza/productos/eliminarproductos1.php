<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
<a href="principalproductos.php">Inicio</a>
    <h1>Selecciona el producto a eliminar</h1>

    <form action="eliminarproductos2.php" method="POST">
    <label for="id">Tipo de material:</label>
    <select list="productos" name="IdProducto">
        <?php
        include 'productosDB.php';
        $p = new ProductoDB();
        $pr = $p->getProductos();
        foreach ($pr as $pro):?>
            <option value="<?=$pro['IdProducto']?>"> <?= $pro['NombreProd']?> </option>
        <?php endforeach ?>
    </select>

    <input type="submit" value="Elegir">
    </form>

</body>
</html>