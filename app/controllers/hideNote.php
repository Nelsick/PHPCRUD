<?php

session_start();

require "connect.php";

$id = $_POST['id'];
$usuario = $_SESSION['username'];
$estado = $_POST['estado'];

function hideNotes($conexion, $id, $estado){

    if( $estado == 0){

        $hide = "UPDATE notas SET estado= 1 WHERE id='$id' ";

        $q = mysqli_query($conexion, $hide);

        if($q){
            echo '
            <script>
                location.href = "../../index.php"
            </script>';
        }else{
            echo "Error al editar la nota";
        }

    }elseif($estado == 1){

            $hide = "UPDATE notas SET estado= 0 WHERE id='$id' ";

            $q = mysqli_query($conexion, $hide);

        if($q){
            echo '
            <script>
                location.href = "../../index.php"
            </script>';
        }else{
            echo "Error al editar la nota";
        }

    }else{
        echo '
            <script>
                <alert>Error actualizando la nota</alert>
                location.href = "../../index.php"
            </script>';
    }
}

hideNotes($conexion, $id, $estado);

?>