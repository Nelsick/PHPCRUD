<?php 

    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "mvc01";

    $conexion = new mysqli($host,$user,$pwd,$db);

    if($conexion -> connect_error){
        die("Conexión fallida: ". $conexion-> connect_error);
    }


?>