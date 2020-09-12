<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../app/views/css/login.css">
</head>
<body>

    <div class="container-grande">

        <div class="container-medio">

            <p class="titulo">Iniciar sesión</p>

            <form action="../app/controllers/login.php" method="POST">

                <label for="user">Usuario</label>
                <input class="barra" type="text" name="user" autofocus required>

                <label for="pass">Contraseña</label>
                <input class="barra" type="password" name="pass" required>

                <input type="checkbox" name="remember" class="checkbox">
                <label class="checkbox" for="remember">Recuerdame</label>
                

                <button type="submit">Iniciar sesión</button>

                <br/>

                <a href="./register.php">Registrate</a>
            </form>

        </div>

    </div>

</body>
</html>
