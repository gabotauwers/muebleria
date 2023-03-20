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


$sentenciaSQL= $base_de_datos->prepare("SELECT * FROM empleado");
$sentenciaSQL->execute();
$empleados= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
    <h1>Todos los empleados</h1>

    <table border="1">
        <tr>
        <th>Nombre</th>
        <th>Apellido Paterno </th>
        <th>Apellido Materno</th>
        <th>Sexo</th>
        <th>Fecha de Nacimiento</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Acceso</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        </tr>
    <?php
    foreach($empleados as $emp){?>
    <tr>
        <td><?= $emp['NombreEmpleado']?></td>
        <td><?= $emp['ApellidoP']?></td>
        <td><?= $emp['ApellidoM']?></td>
        <td><?= $emp['Sexo']?></td>
        <td><?= $emp['FechaNacimiento']?></td>
        <td><?= $emp['DireccionEmp']?></td>
        <td><?= $emp['Telefono']?></td>
        <td><?= $emp['Email']?></td>
        <td><?= $emp['Acceso']?></td>
        <td><?= $emp['Usuario']?></td>
        <td><?= $emp['Password']?></td>
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

$dompdf->stream("empleados.pdf", array("Attachment" => false));
?>