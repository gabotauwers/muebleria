<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../Clientes.php">Inicio</a>
    <h1>Datos del cliente: </h1>
<?php

?>
<form action="agregarCliente2.php" method="POST">

<h3>Nombre: </h3> <input name= "NombreCliente" type="text" value="" requiered></input>
<h3>Apellido Paterno: </h3> <input name= "ApellidoP" type="text" value="" required></input>
<h3>Apellido Materno: </h3> <input name= "ApellidoM" type="text" value="" required></input>
<h3>Sexo: </h3> 
<select list="Sexo" name="Sexo" required>
            <option value="Masculino"> Masculino </option>
            <option value="Femenino"> Femenino </option>
</select>
<h3>Fecha de Nacimiento: </h3> <input name="FechaNacimiento" type="date" value="" required></input>
<h3>Direccion: </h3> <input name= "DireccionCli" type="text" value="" required></input>
<h3>Telefono: </h3> <input name= "Telefono" type="text" value="" required></input>
<h3>Credito: </h3> <input name= "Credito" type="decimal" value="" required></input>
<h3>Email: </h3> <input name= "Email" type="text" value="" required></input>

<input type="submit" value="Guardar">
</form>

</body>
</html>