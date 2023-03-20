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


$sentenciaSQL= $base_de_datos->prepare("SELECT * FROM tipomueble");
$sentenciaSQL->execute();
$listatipomuebles= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
    <h1>Tipos de mueble</h1>

    <table border="1"> 
        <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        
        </tr>
    
     
        <?php foreach($listatipomuebles as $tmu) { ?>
                    <tr>
                    <td><?php echo $tmu ['NombreTMu'];?></td>
                    <td><?php echo $tmu ['DescripcionTMu'];?></td>

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

$dompdf->stream("tiposmueble.pdf", array("Attachment" => false));
?>