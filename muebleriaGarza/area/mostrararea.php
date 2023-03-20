<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    
</head>

<body>
<a href="principalarea.php">"Inicio"</a>
<h1>Areas</h1>
<?php
include 'areaDB.php';
$a = new AreaDB();

$ar = $a->getAreas();
foreach ($ar as $are): ?>
    
    <h3>Nombre: <?= $are['NombreArea'] ?></h3>
    <h3>Descripcion: <?= $are['DescripcionArea'] ?></h3>
    <br>
    
<?php endforeach ?>
<a href="../reportes/imprimirareas.php">PDF</a>
</body>
</html>