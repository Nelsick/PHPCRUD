<?php


session_start();

require "connect.php";

$id = $_POST['id'];

function deleteNotes($conexión,$id){

    $delete = "DELETE FROM notas WHERE id='$id'" ;

    $q = mysqli_query($conexión,$delete);

    if($q)
    {

        echo '
        <script>
            location.href = "../../index.php"
        </script>';

    }else
    {
        echo '
        <script>
            <alert>Error elimando la nota</alert>
            location.href = "../../index.php"
        </script>';
    }

}

deleteNotes($conexion, $id);

?>