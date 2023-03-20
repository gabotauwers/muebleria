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


$sentenciaSQL= $base_de_datos->prepare("SELECT * FROM proveedor");
$sentenciaSQL->execute();
$listaProveedores= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
    <h1>Todos los proveedores</h1>

    <table border="1"> 
        <tr>
        <th>Razon Social</th>
        <th>RFC </th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
        </tr>
    
     
        <?php foreach($listaProveedores as $proveedor) { ?>
                    <tr>
                    <td><?php echo $proveedor ['RazonSocial'];?></td>
                    <td><?php echo $proveedor ['RegistroFederalContribuyentes'];?></td>
                    <td><?php echo $proveedor ['DireccionProv'];?></td>
                    <td><?php echo $proveedor ['Telefono'];?></td>
                    <td><?php echo $proveedor ['Email'];?></td>
                </tr>
           <?php } ?>
    
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

$dompdf->stream("proveedores.pdf", array("Attachment" => false));
?>