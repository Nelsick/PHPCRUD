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

</div>

<div class="container col-sm-9 py-4">
  <div class="row row-cols-1 row-cols-md-3">

<!-- Esta será la card de prueba para generar las siguientes -->

  <div class="col mb-4">
    <div class="card">

      <div class="card-header">
        <div class="btn-group btn-group-sm col-md-4 offset-md-6" role="group">
          
        <button type="button" class="btn btn-link text-success" data-toggle="modal" data-target="#editar" title="Editar"><i class="fas fa-edit"></i></button>

            <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Editar Nota</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    
                    <!-- Formulario para actualizar las notas -->

                      <form action="./app/controllers/editNote.php" method="POST">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Titulo:</label>
                          <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Descripción:</label>
                          <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>

          <button class="btn btn-link text-warning" title="Ocultar"><i class="fas fa-minus-circle"></i></button>
          <button class="btn btn-link text-danger" title="Eliminar"><i class="far fa-times-circle"></i></button>
        </div>
      </div>

      <div class="card-body">
        
        <div>
          <p class="font-weight-bold">Titulo de la nota</p>
        </div>

        <p class="card-text">Texto de ejemplo de la descripción de la nota.</p>
        <footer class="blockquote-footer">Hora de la nota</footer>
      </div>

    </div>

  </div>

  <!--Muestras -->

<?php
  //Se llama a función para solicitar las notas
  include "./app/controllers/getNotes.php";

  getNotes($conexion,$usuario);

?>

  <!-- Fin muestras -->

  </div>
</div>

<?php

    include "./app/views/partials/footer.php";

?>


