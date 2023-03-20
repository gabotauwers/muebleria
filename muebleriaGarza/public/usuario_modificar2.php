<?php 
    include '../MuebleriaGarza/DB/EmpleadosDB.php';
    $empleado = new EmpleadosDB();
    $empleado->modificaEmpleado($_POST);

    echo '<script>confirm("¡Usuario actualizado correctamente!")</script>';
    echo "<script>window.location.href='usuarios.php'</script>";
?>