<?php
include_once '../MuebleriaGarza/DB/database.php';

session_start();
if(isset($_GET['cerrar_sesion'])){
    session_unset();

    session_destroy();
}
if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case "Administrador":
            header('location: administrador.php');
            break;

        case "Almacen":
            header('location: almacen.php');
            break;

        case "Ventas":
            header('location: ventas:php');
            break;
        default:
    }
}
if(isset($_POST['usuario_nombre']) && isset($_POST['password'])){
    $usuario_nombre = $_POST['usuario_nombre'];
    $password = $_POST['password'];
    $passwordHasheada = password_hash($password, PASSWORD_DEFAULT);

    $db = new Database();
    $query = $db->connect()->prepare('SELECT Acceso FROM empleado WHERE Usuario = :usuario_nombre AND Password = :password');
    $query->execute(['usuario_nombre' => $usuario_nombre, 'password'=> $password]);
    
    $row = $query->fetch(PDO::FETCH_NUM);
    if($row == true){
        //valida
        $rol = $row[0];
        $_SESSION['rol'] = $rol;

        switch($_SESSION['rol']){
            case "Administrador":
                header('location: administrador.php');
                break;
    
            case "Almacen":
                header('location: almacen.php');
                break;
    
            case "Ventas":
                header('location: ventas.php');
                break;
            default:
        }
    }else{
        echo"El usuario o contraseña no son correctos";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="#" method="POST">
        Usuario: <br/><input type="text" name="usuario_nombre"><br/>
        Password: <br/><input type="password" name="password"><br/>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>