<?php
ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        border-collapse:collapse;
    }
</style>
<body>
    
<?php 

include '../DB/Conexion.php';


$sentenciaSQL= $base_de_datos->prepare("SELECT * FROM producto");
$sentenciaSQL->execute();
$productos= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
    <h1>Todos los productos</h1>

    <table border="1">
        <tr>
        <th>Codigo del producto</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Tipo mueble</th>
        <th>Material</th>
        <th>Area</th>
        </tr>
    <?php
    foreach($productos as $pro){?>
    <tr>
        <td><?= $pro['CodigoProd'] ?></td>
        <td><?= $pro['NombreProd'] ?></td>
        <td><?= $pro['DescripcionProd'] ?></td>
        <td><?= $pro['Cantidad'] ?></td>
        <td><?= $pro['Precio'] ?></td>
        <td><?= $pro['IdTipoMueble'] ?></td>
        <td><?= $pro['IdTipoMaterial'] ?></td>
        <td><?= $pro['IdArea'] ?></td>
    </tr>

    <?php }?>
    </table>
</body>
</html>


<?php
$html=ob_get_clean();
//echo $html;

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','landscape');

$dompdf->render();

$dompdf->stream("producto.pdf", array("Attachment" => false));
?>