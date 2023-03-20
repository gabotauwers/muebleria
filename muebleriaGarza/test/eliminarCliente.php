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
    <h1>Selecciona el cliente a eliminar: </h1>

    <form action="eliminarCliente2.php" method="POST">
    <label for="id">Cliente:</label>
    <select list="clientes" name="IdCliente">
        <?php
        include '../DB/clientesDB.php';
        $cliente = new ClientesDB();
        $clientes = $cliente->getClientes();
        foreach ($clientes as $eq):?>
            <option value="<?=$eq['IdCliente']?>"> <?= $eq['NombreCliente']?> <?= $eq['ApellidoP']?> <?= $eq['ApellidoM']?></option>
        <?php endforeach ?>
    </select>

    <input type="submit" value="Elegir">
    </form>

</body>
</html>