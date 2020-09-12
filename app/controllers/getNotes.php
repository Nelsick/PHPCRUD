<?php

require "./app/controllers/connect.php";

function getNotes($conexion,$usuario){

    $sql = "SELECT id, titulo, descripcion, fecha, color, estado, usuario FROM notas WHERE (usuario ='$usuario' AND estado = 0) ";

    $result = $conexion->query($sql);

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
      ?>

        <div class="col mb-4">
        <div class="card <?php echo $row['color'] ?>">

          <div class="card-header">
            <div class="btn-group btn-group-sm col-md-4 offset-md-6" role="group">

    <!-- Botón de edición de notas -->
    
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

    <!-- Fin del botón de edición más modal -->

              <button class="btn btn-link text-warning" title="Ocultar"><i class="fas fa-minus-circle"></i></button>
              <button class="btn btn-link text-danger" title="Eliminar"><i class="far fa-times-circle"></i></button>
            </div>
          </div>

          <div class="card-body">

            <div>
              <p class="font-weight-bold"> <?php echo $row["titulo"] ?></p>
            </div>

            <p class="card-text"> <?php echo $row["descripcion"] ?> </p>
            <footer class="blockquote-footer"><?php echo $row["fecha"] ?> </footer>
          </div>

        </div>

      </div>
    <?php
      }
    }
}

?>