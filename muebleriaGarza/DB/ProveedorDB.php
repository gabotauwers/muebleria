<?php
include 'Conexion.php';

class ProveedorDB{

    public function mostrarProveedor(){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = 'Select * from proveedor';
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $provedores = $stmt->fetchAll();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $provedores;
    }

    public function agregaProveedor($objeto){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = 'insert into proveedor (RazonSocial, RegistroFederalContribuyentes, DireccionProv, Telefono, Email) values (?,?,?,?,?)';
            $stmt = $dbh->prepare($consulta);
            $stmt->bindParam(1,$objeto['RazonSocial']);
            $stmt->bindParam(2,$objeto['RegistroFederalContribuyentes']);
            $stmt->bindParam(3,$objeto['DireccionProv']);
            $stmt->bindParam(4,$objeto['Telefono']);
            $stmt->bindParam(5,$objeto['Email']);
            $stmt->execute();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
    }

    public function getProveedor($id){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = 'select * from proveedor where IdProveedor = ?';
            $stmt = $dbh->prepare($consulta);
            $stmt->bindParam(1,$id);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $provedor = $stmt->fetch();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $provedor;
    }

    public function modificaProveedor($objeto){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = "UPDATE proveedor set RazonSocial = ?, RegistroFederalContribuyentes = ?, DireccionProv = ?, Telefono = ?, Email = ?
            where IdProveedor = ?";
            $stmt = $dbh->prepare($consulta);
            $stmt->bindParam(1,$objeto['RazonSocial']);
            $stmt->bindParam(2,$objeto['RegistroFederalContribuyentes']);
            $stmt->bindParam(3,$objeto['DireccionProv']);
            $stmt->bindParam(4,$objeto['Telefono']);
            $stmt->bindParam(5,$objeto['Email']);
            $stmt->execute();
            $provedor = $stmt->fetch();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
    }

    public function borrarProveedor($objeto){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = 'delete from proveedor where IdProveedor = ?';
            $stmt = $dbh->prepare($consulta);
            $stmt->bindParam(1,$objeto['IdProveedor']);
            $stmt->execute();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
    }
}
?>