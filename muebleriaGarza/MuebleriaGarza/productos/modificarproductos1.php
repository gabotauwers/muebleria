<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
    <h1>Selecciona el producto a modificar</h1>

    <form action="modificarproductos2.php" method="POST">
    <label for="id">Tipo de mueble:</label>
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