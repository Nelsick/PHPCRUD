<?php

    session_start();

    require "connect.php";

    $titulo = $_POST['title'];
    $descripcion = $_POST['description'];
    $color = $_POST['color'];
    $estado = "True";
    $usuario = $_SESSION['username'];
    
    $insert = "INSERT INTO notas (titulo, descripcion, color, estado, usuario) VALUES ('$titulo','$descripcion','$color','$estado','$usuario')";

    $q = mysqli_query($conexion, $insert);

    if($q){
        echo "
            <script> alert('Nota guardada correctamente')
            location.href = '../../index.php'
            </script>";
    }else{
        echo "
        <script> alert('Error al guardar la nota')</script>";
    }
    
?>