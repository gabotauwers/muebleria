<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    
</head>

<body>
<a href="principalarea.php">"Inicio"</a>
<h1>Tu registro se a modificado</h1>
<?php
include 'areaDB.php';
$a = new AreaDB();
$a->ModificarArea($_POST);

?>

</body>
</html>