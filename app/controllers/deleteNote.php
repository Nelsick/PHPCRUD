<?php

require "connect.php";

$id = $_POST['id'];

if($id){
    echo "El id es $id";
}else{
    echo "No se encuentra el id";
}

?>