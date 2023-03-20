<?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "muebleria_garza";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
	 $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>
<?php

class Conexion {
    private $dbh;
    private static $instancia; //The single instance
    private $host = 'localhost';
    private $usuario = 'root';
    private $password = '';
    private $nombreBaseDatos = 'muebleria_garza';

    /*
    Get an instance of the Database
    @return Instance
     */
    public static function getInstancia() {
        if (!self::$instancia) { // singleton
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    // Constructor
    private function __construct() {
        try {
            $this->dbh = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->nombreBaseDatos, $this->usuario, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDbh() {
        return $this->dbh;
    }
}