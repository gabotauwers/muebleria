<?php
include('verificarDatos/config.php');//aqui hace una conexion a la base de datos 



//Generando clave aleatoria
$logitudPass = 8; //logitud del passwor 
$miPassword  = substr( md5(microtime()), 1, $logitudPass);
$clave       = $miPassword;

$correo             = trim($_REQUEST['email']); //Quitamos algun espacion en blanco
$consulta           = ("SELECT * FROM empleado WHERE Email ='".$correo."'"); //aqui se hace una consulta al login 
$queryconsulta      = mysqli_query($con, $consulta);
$cantidadConsulta   = mysqli_num_rows($queryconsulta);
$dataConsulta       = mysqli_fetch_array($queryconsulta);

//aqui se hace una condicion si el correo existe si no manda el mensaje no existente
if($cantidadConsulta ==0){ 
    header("Location:correo_inexistente.php");
    exit();
}else{
$updateClave    = ("UPDATE empleado SET Password='$clave' WHERE Email='".$correo."' ");
$queryResult    = mysqli_query($con,$updateClave); //esta linea sirve para ir a la tabla y poner la contra temporal

//estas lineas sirven para que la contraseña llegue al correo del usuario dirirse donde empieza el boody
// segunda tabla <tr>
$destinatario = $correo; 
$asunto       = "Recuperando Clave - Muebleria Garceta Tizayuca";

// esta parte sirve para darle diseño al correo electronico con las carateristicas de la empresa
$cuerpo = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Recuperar COntraseña de Usuario</title>';

$cuerpo .= '
</head>
<body>
    <div class="contenedor">
    <img class="imgBanner" src="aqui para poner otro banner2.png">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
    <tr>
        <td style="padding: 0">
            <img style="padding: 0; display: block" src="aqui para poner un banner en el correo" width="100%">
        </td>
    </tr>
    //esto indica que puede hacer inicio de seccion son su nueva clave 
    <tr>
        <td style="background-color: #ffffff;">
            <div class="misection">
                <h2 style="color: red; margin: 0 0 7px">Hola, '.$dataConsulta['fullName'].'</h2>
                <p style="margin: 2px; font-size: 18px">te hemos creado una nueva clave temporal para que puedas iniciar sesión, la clave temporal es: <strong>'.$clave.'</strong> </p> 
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <a href="este es para poner una iamgen de fondo en el correo" class="btnlink">Iniciar Sesión </a>
                <p>&nbsp;</p>
                 <p>&nbsp;</p>
                <img style="padding: 0;" src="aqui para poner un gif de la empresa" width="50%">
                <p>&nbsp;</p>
            </div>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff;">
        <div class="misection">
            <h2 style="color: red; margin: 0 0 7px">Visitar Pagina Oficial en Facebook </h2>
            <img style="padding: 0; display: block" src="https://www.facebook.com/profile.php?id=100090619030686&mibextid=ZbWKwL" width="100%">
        </div>
        
        <div class="mb-5 misection">  
          <p>&nbsp;</p>
            <a href="aqui va pagina de internet" class="btnlink">Visitar Pagina Oficial</a>
        </div>
        </td>
    </tr>
    <tr>
        <td style="padding: 0;">
            <img style="padding: 0; display: block" src="esta seccion es para el footer de correo " width="100%">
        </td>
    </tr>
</table>'; 

$cuerpo .= '
      </div>
    </body>
  </html>';
    
    $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $headers .= "From: MuebleriaGarcetaTizayuca\r\n"; 
    $headers .= "Reply-To: "; 
    $headers .= "Return-path:"; 
    $headers .= "Cc:"; 
    $headers .= "Bcc:"; 
    (mail($destinatario,$asunto,$cuerpo,$headers));

    header("Location:password_restablecido.php");
    exit();
}

?>
