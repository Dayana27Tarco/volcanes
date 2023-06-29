<h1 class="text-center" style="padding: 20px 0;">Listado de Volcanes</h1>

<!-- Button trigger modal -->
<div class="text-center" style="margin: 0 0 20px 0;">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevoVolcan">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    Agregar un nuevo volcán
  </button>
</div>

<div class="container">
  <?php if ($listaVolcanes) : ?>
    <table class="table" style="background-color: whitesmoke;">
      <thead class="thead-dark" style="background-color: #3F3844;">
        <tr style="color: white;">
          <th scope="col">#</th>
          <th scope="col">Nombre Volcán</th>
          <th scope="col">Provincia</th>
          <th scope="col">Última Erupción</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($listaVolcanes as $volcan) : ?>
          <tr>
            <th scope="row"><?php echo $volcan->id_vol_dn; ?></th>
            <td><?php echo $volcan->nombre_vol_dn; ?></td>
            <td><?php echo $volcan->provincia_vol_dn ?></td>
            <td><?php echo $volcan->ultimo_vol_dn; ?></td>
            <td>
              <button data-toggle="modal" data-target="#modalEditarVolcan" id="botonEditarVolcan<?php echo $volcan->id_vol_dn; ?>" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar
              </button>
              <button id="botonEliminarVolcan<?php echo $volcan->id_vol_dn; ?>" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                Eliminar
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>
    <div class="alert alert-info" role="alert">
      <strong>Info!</strong> No hay volcanes registrados.
    </div>
  <?php endif; ?>

</div>

<!-- Modal -->
<div class="modal fade" id="modalNuevoVolcan" tabindex="-1" role="dialog" aria-labelledby="modalNuevoVolcanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNuevoVolcanLabel">Agregar nuevo volcán</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="form_volcan">
        <div class="modal-body">
          <div class="form-group">
            <label for="nombre_vol_dn">Nombre del Volcán</label>
            <input name="nombre_vol_dn" type="text" class="form-control" id="nombre_vol_dn" placeholder="Nombre del Volcán">
          </div>
          <div class="form-group">
            <label for="provincia_vol_dn">Provincia</label>
            <input name="provincia_vol_dn" type="text" class="form-control" id="provincia_vol_dn" placeholder="Provincia">
          </div>
          <div class="form-group">
            <label for="ultima_vol_dn">Última Erupción</label>
            <input name="ultimo_vol_dn" type="date" class="form-control" id="ultima_vol_dn" placeholder="Última Erupción">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Volcán</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditarVolcan" tabindex="-1" role="dialog" aria-labelledby="modalEditarVolcanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarVolcanLabel">Editar volcán</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="form_volcan_editar">
        <div class="modal-body">
          <div class="form-group">
            <label for="nombre_vol_dn">Nombre del Volcán</label>
            <input name="nombre_vol_dn_editar" type="text" class="form-control" id="nombre_vol_dn_editar" placeholder="Nombre del Volcán">
          </div>
          <div class="form-group">
            <label for="provincia_vol_dn">Provincia</label>
            <input name="provincia_vol_dn_editar" type="text" class="form-control" id="provincia_vol_dn_editar" placeholder="Provincia">
          </div>
          <div class="form-group">
            <label for="ultima_vol_dn">Última Erupción</label>
            <input name="ultima_vol_dn_editar" type="date" class="form-control" id="ultima_vol_dn_editar" placeholder="Última Erupción">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="botonEditarVolcanModal" class="btn btn-primary">Editar Volcán</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Aqui se va a crear el script para insertar de forma asincrona en la base de datos -->
<script>
  $("#form_volcan").validate({ //captura el id del formulario
    rules: { //reglas de validacion
      nombre_dn: { //nombre del campo
        required: true, //requerido
        minlength: 3 //minimo de caracteres
      },
      provincia_dn: { //nombre del campo
        required: true, //requerido
        minlength: 3 //minimo de caracteres
      },
      ultimo_dn: { //nombre del campo
        required: true, //requerido
        minlength: 3 //minimo de caracteres
      }
    },
    messages: { //mensajes de validacion
      nombre_dn: { //nombre del campo
        required: "El nombre del volcán es requerido", //se da el mensaje 'El nombre del volcán es requerido' cuando el campo no es llenado
        minlength: "El nombre del volcán debe tener al menos 3 caracteres" //se da el mensaje 'El nombre del volcán debe tener al menos 3 caracteres' cuando el campo no cumple con la cantidad de caracteres
      },
      provincia_dn: { //nombre del campo
        required: "La provincia es requerida", //se da el mensaje 'La provincia es requerida' cuando el campo no es llenado
        minlength: "La provincia debe tener al menos 3 caracteres" //se da el mensaje 'La provincia debe tener al menos 3 caracteres' cuando el campo no cumple con la cantidad de caracteres
      },
      ultimo_dn: {
        required: "La fecha de la última erupción es requerida",
        minlength: "La fecha de la última erupción debe tener al menos 3 caracteres"
      }
    },
    submitHandler: function(form) { //esta es la funcion que se ejecuta cuando el formulario es enviado
      $.ajax({ //ajax, aqui se hace la peticion asincrona al controlador y se envian los datos del formulario por el metodo post
        type: "POST", //metodo post
        url: "<?php echo site_url('volcanes/guardarVolcan'); ?>", //url del controlador que va a recibir los datos del formulario
        data: $(form).serialize(), //se envian los datos del formulario serializados por el metodo post al controlador
        dataType: "json", //el tipo de dato que se va a recibir del controlador es json
        success: function(response) { //esta es la funcion que se ejecuta cuando la peticion ajax es exitosa
          if (response.status == 'ok')  { //si el status es ok, se muestra un mensaje de exito y se recarga la pagina
            Swal.fire({
              icon: 'success',
              title: 'Guardado',
              text: response.message,
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
              location.reload(); //recarga la pagina
            })
          } else { //si el status es error, se muestra un mensaje de error
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response.message, //se muestra el mensaje de error que se recibe del controlador
              showConfirmButton: false,
              timer: 1500
            })
          }

        }
      });
      return false; //evita que el formulario se envie de forma normal y se ejecute la accion por defecto
    }
  });
</script>

<script>
  <?php if ($listaVolcanes) : ?>
    <?php foreach ($listaVolcanes as $volcan) : ?>
      $(`#botonEditarVolcan<?php echo $volcan->id_vol_dn ?>`).click(function(e) {
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "<?php echo site_url('volcanes/getVolcanPorId/'); ?>" + <?php echo $volcan->id_vol_dn ?>,
          dataType: "json",
          success: function(response) {
            if (response) {
              const {
                id_vol_dn,
                nombre_vol_dn,
                provincia_vol_dn,
                ultima_vol_dn
              } = response[0];
              $('#nombre_vol_dn_editar').val(nombre_vol_dn);
              $('#provincia_vol_dn_editar').val(provincia_vol_dn);
              $('#ultima_vol_dn_editar').val(ultima_vol_dn);
              // $('#id_vol_dn_editar').val(id_vol_dn);
              $('#botonEditarVolcanModal').click(function(e) {
                e.preventDefault();
                $.ajax({
                  type: "POST",
                  url: "<?php echo site_url('volcanes/editarVolcan/'); ?>" + id_vol_dn,
                  data: $('#form_volcan_editar').serialize(),
                  dataType: "json",
                  success: function(response) {
                    if (response.status == 'ok') {
                      Swal.fire({
                        icon: 'success',
                        title: 'Guardado',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                      }).then(() => {
                        location.reload();
                      })
                    } else {
                      Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                      })
                    }
                  }
                });
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salió mal!',
              })
            }
          }
        });
      });
    <?php endforeach; ?>
  <?php endif; ?>
</script>

<script>
  <?php if ($listaVolcanes) : ?>
    <?php foreach ($listaVolcanes as $volcan) : ?>
      $('#botonEliminarVolcan<?php echo $volcan->id_vol_dn; ?>').click(function(e) {
        e.preventDefault();
        Swal.fire({
          title: '¿Estás seguro?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: '¡Sí, bórralo!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: "POST",
              url: "<?php echo site_url('volcanes/eliminarVolcan/'); ?>" + <?php echo $volcan->id_vol_dn; ?>,
              dataType: "json",
              success: function(response) {
                if (response.status == 'ok') {
                  Swal.fire({
                    icon: 'success',
                    title: 'Eliminado',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    location.reload();
                  })
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  })
                }
              }
            });
          }
        })
      })
    <?php endforeach; ?>
  <?php endif; ?>
</script>