<?php 
    include '../MuebleriaGarza/DB/EmpleadosDB.php';
    $empleados = new EmpleadosDB();
    $empleados->agregaEmpleado($_POST);

    echo '<script>confirm("Usuario agregado correctamente")</script>';
    echo "<script>window.location.href='usuarios.php'</script>";
?>