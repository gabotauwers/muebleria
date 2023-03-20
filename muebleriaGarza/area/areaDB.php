<?php
include_once '../DB/Conexion.php';

class AreaDB{

    public function getAreas(){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = "Select * FROM area";
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_BOTH);
            $stmt->execute();
            $a = $stmt->fetchAll();
            $dbh = null;//cierre de conexion
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $a;
    }

    public function getAreaID($id){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = "Select * FROM area WHERE IdArea = ?";
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_BOTH);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $a = $stmt->fetch();
            $dbh = null;//cierre de conexion
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $a;
}
    public function AgregarArea($a,$ar){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = "INSERT INTO area (NombreArea,DescripcionArea) VALUE(?,?)";
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_BOTH);
            $stmt->bindParam(1, $a);
            $stmt->bindParam(2, $ar);
            $stmt->execute();
            $a = $stmt->fetch();
            $dbh = null;//cierre de conexion
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
    }


public function ModificarArea($arr){
    $conexion = Conexion::getInstancia();
    $dbh = $conexion->getDbh();
    try{
        $consulta = "UPDATE area SET NombreArea = ?, DescripcionArea = ? WHERE IdArea = ?";
        $stmt = $dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_BOTH);
        $stmt->bindParam(1, $arr['NombreArea']);
        $stmt->bindParam(2, $arr['DescripcionArea']);
        $stmt->bindParam(3, $arr['IdArea']);
        $stmt->execute();
        $a = $stmt->fetch();
        $dbh = null;//cierre de conexion
    }catch(PDOException $e){
        echo $e->getMessage();    
    }
}

public function EliminarArea($arr){
    $conexion = Conexion::getInstancia();
    $dbh = $conexion->getDbh();
    try{
        $consulta = "DELETE FROM area WHERE IdArea = ?";
        $stmt = $dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_BOTH);
        $stmt->bindParam(1, $arr['IdArea']);
        $stmt->execute();
        $tma = $stmt->fetch();
        $dbh = null;//cierre de conexion
    }catch(PDOException $e){
        echo $e->getMessage();    
    }
}

}

?>