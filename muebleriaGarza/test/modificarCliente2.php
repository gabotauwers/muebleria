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
    <h1>Cliente seleccionado: </h1>
<?php
include '../DB/clientesDB.php';
$clienteDB = new ClientesDB();

$cliente = $clienteDB->getModCliente($_POST['IdCliente']);

?>
<form action="modificarCliente3.php" method="POST">

<h3>Nombre: </h3> <input name= "NombreCliente" type="text" value="<?=$cliente['NombreCliente']?>" required></input>
<h3>Apellido Paterno: </h3> <input name= "ApellidoP" type="text" value="<?=$cliente['ApellidoP']?>" required></input>
<h3>Apellido Materno: </h3> <input name= "ApellidoM" type="text" value="<?=$cliente['ApellidoM']?>" required></input>
<h3>Sexo: </h3> 
<select list="Sexo" name="Sexo" required>
            <option value="Masculino"> Masculino </option>
            <option value="Femenino"> Femenino </option>
</select>
<h3>Fecha de Nacimiento: </h3> <input name="FechaNacimiento" type="date" value="<?=$cliente['FechaNacimiento']?>" required></input>
<h3>Direccion: </h3> <input name="DireccionCli" type="text" value="<?=$cliente['DireccionCli']?>" required></input>
<h3>Telefono: </h3> <input name="Telefono" type="text" value="<?=$cliente['Telefono']?>" required></input>
<h3>Credito: </h3> <input name="Credito" type="decimal" value="<?=$cliente['Credito']?>" required></input>
<h3>Email: </h3> <input name="Email" type="text" value="<?=$cliente['Email']?>" required></input>
<input type="hidden" name="IdCliente" value="<?=$cliente['IdCliente']?> " required>

<input type="submit" value="Guardar">
</form>
</body>
</html>