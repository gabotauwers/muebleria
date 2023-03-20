<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    
</head>

<body>
<a href="principalproductos.php">"Inicio"</a>
<h1>Productos</h1>
<?php
include 'productosDB.php';
$p = new ProductoDB();

$pr = $p->MostrarProductos();
foreach ($pr as $pro): ?>
    
    <h3>Codigo del producto: <?= $pro['CodigoProd'] ?></h3>
    <h3>Codigo del producto: <?= $pro['NombreProd'] ?></h3>
    <h3>Codigo del producto: <?= $pro['DescripcionProd'] ?></h3>
    <h3>Cantidad: <?= $pro['Cantidad'] ?></h3>
    <h3>Precio: <?= $pro['Precio'] ?></h3>
    <h3>Tipo de Mueble: <?= $pro['NombreTMu'] ?></h3>
    <h3>Tipo de Material: <?= $pro['NombreTMa'] ?></h3>
    <h3>Area: <?= $pro['NombreArea'] ?></h3>
    <br>
    
<?php endforeach ?>
<a href="../reportes/imprimirProductos.php">Generar PDF</a>
</body>
</html>