<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuario</title>
    <link rel="stylesheet" href="../app/views/css/login.css">
</head>
<body>

    <div class="container-grande">

        <div class="container-medio">

            <p class="titulo">Crear cuenta</p>

            <form action="../app/controllers/register.php" method="POST">

                <label for="user">Usuario</label>
                <input class="barra" type="text" name="user" autofocus required>

                <label for="pass">Contraseña</label>
                <input class="barra" type="password" name="pass" required>

                <button type="submit">Registrar</button>
            </form>

        </div>

    </div>

</body>
</html>