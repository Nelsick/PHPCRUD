<?php

session_start();
$usuario = $_SESSION['username'];
    
if(!isset($usuario)){
    header("location: ./public/login.php");
}else{
    include "./app/views/partials/header.php";
}

?>

<div class="container col-sm-3 px-4 py-4 float-left">
    <div class="card text-black bg-light mb-3">

        <div class="card-header bg-light text-center">
 	        <h5 style="color:black">Ingresa tu tarea</h5>
        </div>

        <div class="card-body border-light">

        <form action="./app/controllers/addNote.php" method="POST">

          <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titulo de la nota" autofocus>
          </div>

          <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description"></textarea>
            <small id="description" class="form-text">Ingresa la descripción de tu tarea</small>
          </div>

          <div class="form-group">
            <select class="form-control" name="color">
              <option value="">Blanco</option>
              <option value="bg-light mb-3">Gris claro</option>
              <option value="text-white bg-primary mb-3">Azul</option>
              <option value="bg-warning mb-3">Amarillo</option>
              <option value="text-white bg-success mb-3">Verde</option>
              <option value="bg-danger mb-3">Rojo</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary btn-lg">Enviar</button>

        </form>
        </div>
    </div>
    
    <div class="card text-black bg-light mb-3">

      <div class="card-header bg-light text-center">
 	      <h5 style="color:black">Mostrar tareas</h5>
      </div>

      <div class="card-body border-light">

        <form id="form-filter">

          <div class="custom-control custom-radio">
            <input type="radio" id="all" name="filter" value="all" class="custom-control-input">
            <label class="custom-control-label" for="all">Todas</label>
          </div>

          <div class="custom-control custom-radio">
            <input type="radio" id="actives" name="filter" value="actives" class="custom-control-input" checked>
            <label class="custom-control-label" for="actives">Solo Activas</label>
          </div>

          <div class="custom-control custom-radio">
            <input type="radio" id="hides" name="filter" value="hides" class="custom-control-input">
            <label class="custom-control-label" for="hides">Solo Ocultas</label>
          </div>

          <button type="submit" class="btn btn-primary mt-2">Mostrar</button>

        </form>

      </div>

    </div>

</div>

<div class="container col-sm-9 py-4">
  <div class="row row-cols-1 row-cols-md-3" id="notas">

  </div>
</div>

<?php

    include "./app/views/partials/footer.php";

?>


