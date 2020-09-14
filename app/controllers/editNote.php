<?php

session_start();

require "connect.php";

$id = $_POST['id_nota'];
$titulo = $_POST['title'];
$descripcion = $_POST['description'];
$color = $_POST['color'];
$usuario = $_SESSION['username'];

function editNotes($conexion, $usuario, $id, $titulo, $descripcion, $color){

    $edit = "UPDATE notas SET titulo='$titulo', descripcion='$descripcion', color='$color' WHERE id='$id' ";

    $q = mysqli_query($conexion, $edit);

    if($q){
        echo '
        <script>
            location.href = "../../index.php"
        </script>';
    }else{
        echo "Error al editar la nota";
    }

}

editNotes($conexion, $usuario, $id, $titulo, $descripcion, $color);

?>