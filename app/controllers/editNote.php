<?php

    require "./connect.php";
    
    $id = $_POST['id'];

    if($id){
        echo "Existe el id";
    }else{
        echo "no se encuentra el id";
    }

?>