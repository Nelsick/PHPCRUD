<?php

    require 'connect.php';

    session_start();

    $usuario = $_POST['user'];
    $clave = $_POST['pass'];

    $q = "SELECT COUNT(*) AS contar FROM usuarios WHERE User= '$usuario' AND Pass='$clave' ";

    $consulta = mysqli_query($conexion, $q);

    $array = mysqli_fetch_array($consulta);

    if($array['contar']>0){
        $_SESSION['username'] = $usuario;
        header("location: ../../index.php");
    }else{
        echo "DATOS INCORRECTOS";
    }

?>