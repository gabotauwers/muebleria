<?php
include 'Conexion.php';

class ClientesDB{

    public function getClientes(){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = "Select * FROM clientes";
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_BOTH);
            $stmt->execute();
            $cliente = $stmt->fetchAll();
            $dbh = null;//cierre de conexion
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $cliente;
    }

    public function getModCliente($id){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = "Select * FROM clientes WHERE IdCliente = ?";
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_BOTH);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $cliente = $stmt->fetch();
            $dbh = null;//cierre de conexion
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $cliente;
}

public function getModificar($arr){
    $conexion = Conexion::getInstancia();
    $dbh = $conexion->getDbh();
    try{
        $consulta = "UPDATE clientes SET NombreCliente = ?, ApellidoP = ?, ApellidoM = ?, Sexo = ?, FechaNacimiento = ?, DireccionCli = ?, Telefono = ?, Credito = ?, Email = ? WHERE IdCliente = ?";
        $stmt = $dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_BOTH);
        $stmt->bindParam(1, $arr['NombreCliente']);
        $stmt->bindParam(2, $arr['ApellidoP']);
        $stmt->bindParam(3, $arr['ApellidoM']);
        $stmt->bindParam(4, $arr['Sexo']);
        $stmt->bindParam(5, $arr['FechaNacimiento']);
        $stmt->bindParam(6, $arr['DireccionCli']);
        $stmt->bindParam(7, $arr['Telefono']);
        $stmt->bindParam(8, $arr['Credito']);
        $stmt->bindParam(9, $arr['Email']);
        $stmt->bindParam(10, $arr['IdCliente']);
        $stmt->execute();
        $cliente = $stmt->fetch();
        $dbh = null;//cierre de conexion
    }catch(PDOException $e){
        echo $e->getMessage();    
    }
}

public function getAgregar($a){
    $conexion = Conexion::getInstancia();
    $dbh = $conexion->getDbh();
    try{
        $consulta = "INSERT INTO clientes (NombreCliente,ApellidoP,ApellidoM,Sexo,FechaNacimiento,DireccionCli,Telefono,Credito,Email) VALUE(?,?,?,?,?,?,?,?,?)";
        $stmt = $dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_BOTH);
        $stmt->bindParam(1, $a['NombreCliente']);
        $stmt->bindParam(2, $a['ApellidoP']);
        $stmt->bindParam(3, $a['ApellidoM']);
        $stmt->bindParam(4, $a['Sexo']);
        $stmt->bindParam(5, $a['FechaNacimiento']);
        $stmt->bindParam(6, $a['DireccionCli']);
        $stmt->bindParam(7, $a['Telefono']);
        $stmt->bindParam(8, $a['Credito']);
        $stmt->bindParam(9, $a['Email']);
        $stmt->execute();
        $cliente = $stmt->fetch();
        $dbh = null;//cierre de conexion
    }catch(PDOException $e){
        echo $e->getMessage();    
    }
}

public function getEliminar($arr){
    $conexion = Conexion::getInstancia();
    $dbh = $conexion->getDbh();
    try{
        $consulta = "DELETE FROM clientes WHERE IdCliente = ?";
        $stmt = $dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_BOTH);
        $stmt->bindParam(1, $arr['IdCliente']);
        $stmt->execute();
        $equipo = $stmt->fetch();
        $dbh = null;//cierre de conexion
    }catch(PDOException $e){
        echo $e->getMessage();    
    }
}

}
?>