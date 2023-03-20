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


$sentenciaSQL= $base_de_datos->prepare("SELECT * FROM clientes");
$sentenciaSQL->execute();
$listaClientes= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
    <h1>Todos los clientes</h1>

    <table border="1"> 
        <tr>
        <th>Nombre</th>
        <th>Apellido Paterno </th>
        <th>Apellido Materno</th>
        <th>Sexo</th>
        <th>Fecha de Nacimiento</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Credito</th>
        <th>Email</th>
        </tr>
    
     
        <?php foreach($listaClientes as $cliente) { ?>
                    <tr>
                    <td><?php echo $cliente ['NombreCliente'];?></td>
                    <td><?php echo $cliente ['ApellidoP'];?></td>
                    <td><?php echo $cliente ['ApellidoM'];?></td>
                    <td><?php echo $cliente ['Sexo'];?></td>
                    <td><?php echo $cliente ['FechaNacimiento'];?></td>
                    <td><?php echo $cliente ['DireccionCli'];?></td>
                    <td><?php echo $cliente ['Telefono'];?></td>
                    <td><?php echo $cliente ['Credito'];?></td>
                    <td><?php echo $cliente ['Email'];?></td>
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

$dompdf->stream("clientes.pdf", array("Attachment" => false));
?>