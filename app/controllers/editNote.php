<?php

session_start();

require "connect.php";

$usuario = $_SESSION['username'];
$selector = $_POST['reg'];
$id = $_POST['id_nota_'.$selector];
$titulo = $_POST['title_'.$selector];
$descripcion = $_POST['description_'.$selector];
$color = $_POST['color_'.$selector];

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