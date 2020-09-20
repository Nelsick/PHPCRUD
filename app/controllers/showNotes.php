<?php 

session_start();

require "connect.php";

$usuario = $_SESSION['username'];

if(isset($_POST['filter'])){

    $data = $_POST['filter'];

}else{

    $data = 'all';

}


function showNotes($data, $usuario){

    switch($data){

        case 'all':
            $data = "SELECT id, titulo, descripcion, fecha, color, estado, usuario FROM notas WHERE usuario ='$usuario' AND estado = 0 OR estado = 1 " ;
            break;

        case 'hides':
            $data = "SELECT id, titulo, descripcion, fecha, color, estado, usuario FROM notas WHERE usuario ='$usuario' AND estado = 1 " ;
            break;

        case 'actives':
            $data = "SELECT id, titulo, descripcion, fecha, color, estado, usuario FROM notas WHERE usuario ='$usuario' AND estado = 0 ";
            break;
    }

    return $data;

}

$filtro = showNotes($data, $usuario);

function getNotesData($conexion, $data){

    $sql = $data;

    $result = $conexion->query($sql);

    $imprimir = [];

    foreach($result as $valor){

        array_push($imprimir, ["id"=>$valor['id'], "titulo"=>$valor['titulo'], "descripcion"=>$valor['descripcion'], "fecha"=>$valor['fecha'], "color"=>$valor['color']]);

    }

    echo json_encode($imprimir);

}

getNotesData($conexion, $filtro);

?>