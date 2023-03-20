<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
<a href="principalproductos.php">Inicio</a>
    <h1>Producto: </h1>
<?php
include 'productosDB.php';
$p = new ProductoDB();
$pr = $p->getProductoID($_POST['IdProducto']);

$i = new ProductoDB();
$img = $i->getImagen($_POST['IdProducto'])

?>
<form action="modificarproductos3.php" method="POST">

<h3>Codigo de producto: </h3> <input name= "CodigoProd" type="text" value="<?=$pr['CodigoProd']?>" require></input>
<h3>Nombre de producto: </h3> <input name="NombreProd" type="text" value="<?=$pr['NombreProd']?>" require></input>

<h3>Descripcion: </h3> <input name= "DescripcionProd" type="text" value="<?=$pr['DescripcionProd']?>" require></input>
<h3>Cantidad: </h3> <input name="Cantidad" type="text" value="<?=$pr['Cantidad']?>" require></input>

<h3>Precio: </h3> <input name= "Precio" type="text" value="<?=$pr['Precio']?>" require></input>
<h3>Imagen: </h3> <input name="ImagenProd" accept="image/*" type="file" value="<?=$pr['ImagenProd']?>" require></input>



<?php
        include '../tipomueble/tmDB.php';
        include '../tipomaterial/tmaterialDB.php';
        include '../area/areaDB.php';
        $tmu = new TmDB();
        $tmue = $tmu->getTmuebles();
        $tma = new TmaterialDB();
        $tmat = $tma->getTmateriales();
        $a = new AreaDB();
        $ar = $a->getAreas();
?>
    <p>
    <label for="dwarfs">Muebles:</label>
        <select list="muebles" name="idTipoMueble">
            <?php foreach ($tmue as $tm):?>
              <option value="<?=$tm['idTipoMueble']?>"> <?= $tm['NombreTMu']?> </option>
            <?php endforeach ?>
        </select>
        </p>

        <p>
    <label for="dwarfs">Materiales:</label>
        <select list="materiales" name="IdTipoMaterial">
            <?php foreach ($tmat as $tm):?>
                <option value="<?=$tm['IdTipoMaterial']?>"> <?= $tm['NombreTMa']?> </option>
            <?php endforeach ?>
        </select>
        </p>

<p>
    <label for="dwarfs">Areas:</label>
        <select list="areas" name="IdArea">
            <?php foreach ($ar as $are):?>
                <option value="<?=$are['IdArea']?>"> <?= $are['NombreArea']?> </option>
            <?php endforeach ?>
        </select>
        </p>

        <input type="hidden" name="IdProducto" value="<?=$pr['IdProducto']?>">

    <input type="submit" value="Elegir">

    </form>
    
</body>
</html>