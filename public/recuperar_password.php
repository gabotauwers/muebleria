<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
    <div id="recuperarclave">
        <h1 class="text-center mb-5 recuperarPass">
            Recuperar tu Clave
        </h1>


        <form action="recuperarClave.php" method="post">
            <div class="field-wrap">
                <label>Correo</label>
                <input type="email" name="email" required autocomplete="off"/>
            </div>
        
            <input type="submit" class="button button-block miBtn mt-5" value="RECUPERAR CLAVE"/>

            <a href="Login.php" id="volver" class="mt-3 mb-4" title="Volver">Volver</a>
            <br><br>
        </form>
    </div>
</body>
</html>