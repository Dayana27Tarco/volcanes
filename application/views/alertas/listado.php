<?php if ($alertas) : ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-alertas">
    <thead>
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>IMPACTO</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($alertas as $alerta) : ?>
        <tr>
          <td><?php echo $alerta->id_alert_dn; ?></td>
          <td><?php echo $alerta->nombre_alert_dn; ?></td>
          <td><?php echo $alerta->impacto_alert_dn; ?></td>
          <td>
            <button id="botonEditarAlerta<?php echo $alerta->id_alert_dn; ?>" data-toggle="modal" data-target="#modalEditarAlerta">Editar</button>
            <button id="botonEliminarAlerta<?php echo $alerta->id_alert_dn; ?>" onclick="">Eliminar</button>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>
<?php else : ?>
  <div class="alert alert-danger">
    No se encontraron alertas registrados.
  </div>
<?php endif; ?>

<!-- MODAL -->
<div id="modalEditarAlerta" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> <b>Editar Alerta</b> </h4>
      </div>
      <div class="modal-body">
        <form id="frm_editar_alerta" method="post">
          <b>Nombre:</b>
          <input type="text" id="nombre_alert_dn_editar" name="nombre_alert_dn_editar" value="" placeholder="Ingrese los Nombres" class="form-control"> <br>
          <b>Impacto</b>
          <input type="text" id="impacto_alert_dn_editar" name="impacto_alert_dn_editar" value="" placeholder="Ingrese el Impacto" class="form-control"> <br>
          <button id="botonEditarAlerta" type="submit" name="button" class="btn btn-success">
            <i class="glyphicon glyphicon-OK"></i>Editar
          </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defaut" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL -->

<script type="text/javascript">
  <?php if ($alertas) : ?>
    <?php foreach ($alertas as $alerta) : ?>
      $(`#botonEliminarAlerta<?php echo $alerta->id_alert_dn; ?>`).click(function(e) {
        e.preventDefault();
        Swal.fire({
          title: '¿Está seguro de eliminar la alerta?',
          text: "¡No podrá revertir esta acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: '¡Sí, eliminar!',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: 'post',
              url: '<?php echo site_url("alertas/eliminar/"); ?>' + <?php echo $alerta->id_alert_dn; ?>,
              success: function(data) {
                var objetoRespuesta = JSON.parse(data);
                if (objetoRespuesta.estado == "OK") {
                  Swal.fire(
                    'CONFIRMACIÓN',
                    objetoRespuesta.mensaje,
                    'success'
                  );
                  consultarAlertas();
                } else {
                  Swal.fire(
                    'ERROR',
                    objetoRespuesta.mensaje,
                    'error'
                  );
                }
              }
            });
          }
        })
      });
    <?php endforeach; ?>
  <?php endif; ?>
</script>

<script type="text/javascript">
  <?php if ($alertas) : ?>
    <?php foreach ($alertas as $alerta) : ?>
      $(`#botonEditarAlerta<?php echo $alerta->id_alert_dn; ?>`).click(function(e) {
        e.preventDefault();
        $.ajax({
          type: 'post',
          dataType: 'json',
          url: '<?php echo site_url("alertas/obtenerPorId/"); ?>' + <?php echo $alerta->id_alert_dn; ?>,
          success: function({
            estado,
            alerta
          }) {
            if (estado == "OK") {
              $("#nombre_alert_dn_editar").val(alerta.nombre_alert_dn);
              $("#impacto_alert_dn_editar").val(alerta.impacto_alert_dn);
              $('#botonEditarAlerta').click((e) => {
                e.preventDefault();
                $.ajax({
                  type: 'post',
                  url: '<?php echo site_url("alertas/actualizar/"); ?>' + <?php echo $alerta->id_alert_dn; ?>,
                  data: $('#frm_editar_alerta').serialize(),
                  success: function(data) {
                    var objetoRespuesta = JSON.parse(data);
                    if (objetoRespuesta.estado == "OK") {
                      Swal.fire(
                        'CONFIRMACIÓN',
                        objetoRespuesta.mensaje,
                        'success'
                      );
                    } else {
                      Swal.fire(
                        'ERROR',
                        objetoRespuesta.mensaje,
                        'error'
                      );
                    }
                  }
                });
              })
            } else {
              Swal.fire(
                'ERROR',
                'No se pudo obtener la alerta',
                'error'
              );
            }
          }
        });
      });
    <?php endforeach; ?>
  <?php endif; ?>
</script>