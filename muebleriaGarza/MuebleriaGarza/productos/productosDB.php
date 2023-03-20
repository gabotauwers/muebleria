<?php
include '../DB/Conexion.php';

class ProductoDB{

    public function getProductos(){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = "Select * from producto";
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_BOTH);
            $stmt->execute();
            $p = $stmt->fetchAll();
            $dbh = null;//cierre de conexion
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $p;
    }

    public function getProductoID($id){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = "Select * from producto WHERE IdProducto = ?";
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_BOTH);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $p = $stmt->fetch();
            $dbh = null;//cierre de conexion
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $p;
}

public function getImagen($id){
    $conexion = Conexion::getInstancia();
    $dbh = $conexion->getDbh();
    try{
        $consulta = "Select ImagenProd from producto WHERE IdProducto = ?";
        $stmt = $dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_BOTH);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $i = $stmt->fetch();
        $dbh = null;//cierre de conexion
    }catch(PDOException $e){
        echo $e->getMessage();    
    }
    return $i;
}

    public function AgregarProducto($arr){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = "INSERT INTO producto (CodigoProd,NombreProd,DescripcionProd,Cantidad,Precio,ImagenProd,IdTipoMueble,IdTipoMaterial,IdArea) VALUE(?,?,?,?,?,?,?,?,?)";
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_BOTH);
            $stmt->bindParam(1, $arr['CodigoProd']);
            $stmt->bindParam(2, $arr['NombreProd']);
            $stmt->bindParam(3, $arr['DescripcionProd']);
            $stmt->bindParam(4, $arr['Cantidad']);
            $stmt->bindParam(5, $arr['Precio']);
            $stmt->bindParam(6, $arr['ImagenProd']);
            $stmt->bindParam(7, $arr['IdTipoMueble']);
            $stmt->bindParam(8, $arr['IdTipoMaterial']);
            $stmt->bindParam(9, $arr['IdArea']);
            $stmt->execute();
            $a = $stmt->fetch();
            $dbh = null;//cierre de conexion
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
    }


public function ModificarProducto($arr){
    $conexion = Conexion::getInstancia();
    $dbh = $conexion->getDbh();
    try{
        $consulta = "UPDATE producto SET CodigoProd = ?, NombreProd = ?, DescripcionProd = ?, Cantidad = ?, Precio = ?, ImagenProd = ?, IdTipoMueble = ?, IdTipoMaterial = ?, IdArea = ? WHERE IdProducto = ?";
        $stmt = $dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_BOTH);
        $stmt->bindParam(1, $arr['CodigoProd']);
            $stmt->bindParam(2, $arr['NombreProd']);
            $stmt->bindParam(3, $arr['DescripcionProd']);
            $stmt->bindParam(4, $arr['Cantidad']);
            $stmt->bindParam(5, $arr['Precio']);
            $stmt->bindParam(6, $arr['ImagenProd']);
            $stmt->bindParam(7, $arr['IdTipoMueble']);
            $stmt->bindParam(8, $arr['IdTipoMaterial']);
            $stmt->bindParam(9, $arr['IdArea']);
            $stmt->bindParam(10, $arr['IdProducto']);
        $stmt->execute();
        $p = $stmt->fetch();
        $dbh = null;//cierre de conexion
    }catch(PDOException $e){
        echo $e->getMessage();    
    }
}

public function EliminarProducto($arr){
    $conexion = Conexion::getInstancia();
    $dbh = $conexion->getDbh();
    try{
        $consulta = "DELETE FROM producto WHERE IdProducto = ?";
        $stmt = $dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_BOTH);
        $stmt->bindParam(1, $arr['IdProducto']);
        $stmt->execute();
        $p = $stmt->fetch();
        $dbh = null;//cierre de conexion
    }catch(PDOException $e){
        echo $e->getMessage();    
    }
}

public function MostrarProductos(){
    $conexion = Conexion::getInstancia();
    $dbh = $conexion->getDbh();
    try{
        $consulta = "Select CodigoProd,NombreProd,DescripcionProd,Cantidad,Precio,ImagenProd,tipomueble.NombreTMu,tipomaterial.NombreTMa,area.NombreArea from producto JOIN tipomueble ON producto.IdTipoMueble = tipomueble.idTipoMueble JOIN tipomaterial ON producto.IdTipoMaterial = tipomaterial.IdTipoMaterial JOIN area ON producto.IdArea = area.IdArea";
        $stmt = $dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_BOTH);
        $stmt->execute();
        $p = $stmt->fetchAll();
        $dbh = null;//cierre de conexion
    }catch(PDOException $e){
        echo $e->getMessage();    
    }
    return $p;
}
}

?>