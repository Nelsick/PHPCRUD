<?php

    require 'connect.php';

    $usuario = $_POST['user'];
    $clave = $_POST['pass'];

    $insert = "INSERT INTO usuarios (User, Pass, Role) VALUES ( '$usuario', '$clave', 'USER_ROLE') ";

    $q = mysqli_query($conexion, $insert);

    if($q){
        echo "
            <script> alert('Registrado correctamente, redirigiendo')
            location.href = '../../public/login.php'
            </script>";
    }else{
        echo "
        <script> alert('Error al realizar el registro, redirigiendo')
        location.href = '../../public/register.php'
        </script>";
    }

?>