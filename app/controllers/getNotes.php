<?php

function getNotes($conexion,$usuario, $state){

    $sql = "SELECT id, titulo, descripcion, fecha, color, estado, usuario FROM notas WHERE usuario ='$usuario' AND estado = $state ";

    $result = $conexion->query($sql);

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
      ?>

        <div class="col mb-4">
        <div class="card <?php echo $row['color'] ?>">
          <div class="card-header">
            <div class="btn-group btn-group-sm float-right" role="group">

    <!-- Botón de edición de notas -->

            <button type="button" class="btn btn-link text-success" data-toggle="modal" data-target="#modal_editar_<?php echo $row['id'] ?>" title="Editar"><i class="fas fa-edit"></i></button>
    
    <!-- Inicio de la modal -->

              <div class="modal fade text-dark" id="modal_editar_<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editando nota: <?php echo $row['id'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

    <!-- Formulario para actualizar las notas -->

                        <form action="./app/controllers/editNote.php" method="POST">

                          <input type="hidden" name="reg" value="<?php echo $row['id']; ?>">

                          <div class="form-group">
                            <label for="id_nota_<?php echo $row['id']; ?>" class="col-form-label"> ID: </label>
                            <input type="text" class="form-control" id="id_nota_<?php echo $row['id']; ?>" name="id_nota_<?php echo $row['id']; ?>" value="<?php echo $row['id'] ?>" readonly>
                          </div>

                          <div class="form-group">
                            <label for="title_<?php echo $row['id']; ?>" class="col-form-label"> Titulo: </label>
                            <input type="text" class="form-control" id="title_<?php echo $row['id']; ?>" name="title_<?php echo $row['id']; ?>" value="<?php echo $row['titulo'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="description_<?php echo $row['id']; ?>" class="col-form-label"> Descripción: </label>
                            <textarea class="form-control" id="description_<?php echo $row['id']; ?>" name="description_<?php echo $row['id']; ?>"><?php echo $row['descripcion'] ?></textarea>
                          </div>

                          <div class="form-group">
                            <label for="color_<?php echo $row['id']; ?>" class="col-form-label"> Color: </label>
                            <select class="form-control" name="color_<?php echo $row['id']; ?>">
                              <option value="">Blanco</option>
                              <option value="bg-light mb-3">Gris claro</option>
                              <option value="text-white bg-primary mb-3">Azul</option>
                              <option value="bg-warning mb-3">Amarillo</option>
                              <option value="text-white bg-success mb-3">Verde</option>
                              <option value="bg-danger mb-3">Rojo</option>
                            </select>
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

    <!-- Botón para ocultar la nota -->
            <form action="./app/controllers/hideNote.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="estado" value="<?php echo $row['estado']; ?>">
              <button type="submit" class="btn btn-link text-warning" title="Ocultar"><i class="fas fa-minus-circle"></i></button>
            </form>
    
    <!-- Botón para eliminar la nota -->
            <button type="button" class="btn btn-link text-danger" data-toggle="modal" data-target="#eliminar_nota<?php echo $row['id'];?>"><i class="far fa-times-circle"></i></button>

            <!-- Modal -->
            <div class="modal fade text-dark" id="eliminar_nota<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Nota <?php echo $row['id']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    La nota <?php echo $row['id']; ?> se borrará para siempre
                  <form action="./app/controllers/deleteNote.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
                    <button type="submit" class="btn btn-danger">Borrar</button>
                  </form>
                  </div>
                  </div>
                </div>
              </div>
            </div>
   
            </div>
          </div>

    <!-- Fin de las acciones -->

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