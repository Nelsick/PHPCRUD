<?php
    
    include "../views/partials/header.php";
    
    session_start();

    $usuario = $_SESSION['username'];

    echo "Bienvenido $usuario";

?>