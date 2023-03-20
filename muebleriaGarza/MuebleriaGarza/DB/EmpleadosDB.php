<?php
include 'Conexion.php';

class EmpleadosDB{

    public function mostrarEmpleados(){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = 'Select * from empleado';
            $stmt = $dbh->prepare($consulta);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $empleados = $stmt->fetchAll();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $empleados;
    }

    public function agregaEmpleado($objeto){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = 'insert into empleado (NombreEmpleado, ApellidoP, ApellidoM, Sexo, FechaNacimiento, DireccionEmp, Telefono, Email, Acceso, Usuario, Password, Foto) values (?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $dbh->prepare($consulta);
            $stmt->bindParam(1,$objeto['NombreEmpleado']);
            $stmt->bindParam(2,$objeto['ApellidoP']);
            $stmt->bindParam(3,$objeto['ApellidoM']);
            $stmt->bindParam(4,$objeto['Sexo']);
            $stmt->bindParam(5,$objeto['FechaNacimiento']);
            $stmt->bindParam(6,$objeto['DireccionEmp']);
            $stmt->bindParam(7,$objeto['Telefono']);
            $stmt->bindParam(8,$objeto['Email']);
            $stmt->bindParam(9,$objeto['Acceso']);
            $stmt->bindParam(10,$objeto['Usuario']);
            $stmt->bindParam(11,$objeto['Password']);
            $stmt->bindParam(12,$objeto['Foto']);
            // $stmt->bindParam(11, password_hash($objeto['Password'], PASSWORD_DEFAULT));
            $stmt->execute();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
    }

    public function getEmpleado($id){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = 'select * from empleado where IdEmpleado = ?';
            $stmt = $dbh->prepare($consulta);
            $stmt->bindParam(1,$id);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $empleado = $stmt->fetch();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
        return $empleado;
    }

    public function modificaEmpleado($objeto){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = 'update empleado set NombreEmpleado = ?, ApellidoP = ?, ApellidoM = ?, Sexo = ?, FechaNacimiento = ?, DireccionEmp = ?, Telefono = ?, 
            Email = ?, Acceso = ?, Usuario = ?, Password = ?, Foto = ? where IdEmpleado = ?';
            $stmt = $dbh->prepare($consulta);
            $stmt->bindParam(1,$objeto['NombreEmpleado']);
            $stmt->bindParam(2,$objeto['ApellidoP']);
            $stmt->bindParam(3,$objeto['ApellidoM']);
            $stmt->bindParam(4,$objeto['Sexo']);
            $stmt->bindParam(5,$objeto['FechaNacimiento']);
            $stmt->bindParam(6,$objeto['DireccionEmp']);
            $stmt->bindParam(7,$objeto['Telefono']);
            $stmt->bindParam(8,$objeto['Email']);
            $stmt->bindParam(9,$objeto['Acceso']);
            $stmt->bindParam(10,$objeto['Usuario']);
            $stmt->bindParam(11,$objeto['Password']);
            $stmt->bindParam(12,$objeto['Foto']);
            $stmt->bindParam(13,$objeto['IdEmpleado']);
            $stmt->execute();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
    }

    public function borrarEmpleado($objeto){
        $conexion = Conexion::getInstancia();
        $dbh = $conexion->getDbh();
        try{
            $consulta = 'delete from empleado where IdEmpleado = ?';
            $stmt = $dbh->prepare($consulta);
            $stmt->bindParam(1,$objeto['IdEmpleado']);
            $stmt->execute();
            $dbh = null;
        }catch(PDOException $e){
            echo $e->getMessage();    
        }
    }
}
?>