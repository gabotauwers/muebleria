<?php 
    include '../MuebleriaGarza/DB/EmpleadosDB.php';
    $empleado = new EmpleadosDB();
    $empleado->borrarEmpleado($_POST);

    echo '<script>confirm("¡Usuario eliminado correctamente!")</script>';
    echo "<script>window.location.href='usuarios.php'</script>";
?>