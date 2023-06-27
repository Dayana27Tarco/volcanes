<script type="text/javascript">
  $("#menu-alertas").addClass('active');
</script>
<br>
<center>
  <h1><b>GESTION DE ALERTAS</b></h1>
</center>
<center>
  <button type="button" class="btn btn.primary" data-toggle="modal" data-target="#modalNuevoAlerta">
    <i class="glyphicon glyphicon-plus"></i>Agregar
  </button>
</center>

<div id="modalNuevoAlerta" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> <b>Nueva Alerta</b> </h4>
      </div>
      <div class="modal-body">
        <form id="frm_nuevo_alerta" class="" action="<?php echo site_url('alertas/guardar'); ?>" method="post">
          <b>Nombre:</b>
          <input type="text" id="nombre_alert_dn" name="nombre_alert_dn" value="" placeholder="Ingrese los Nombres" class="form-control"> <br>
          <b>Impacto</b>
          <input type="text" id="impacto_alert_dn" name="impacto_alert_dn" value="" placeholder="Ingrese el Impacto" class="form-control"> <br>
          <button type="submit" name="button" class="btn btn-success">
            <i class="glyphicon glyphicon-OK"></i>Guardar
          </button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defaut" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<button type="button" name="button" onclick="consultarAlertas()">Actualizar datos</button>
<div class="container">
  <div id="contenedor-listado-alertas">
    <center>
      <i class="fa fa-spinner fa-spin fa-6x"></i>
      <br>Espere por favor
    </center>
  </div>
</div>

<script type="text/javascript">
  function consultarAlertas() {
    $("#contenedor-listado-alertas").html('<center> <i class="fa fa-spinner fa-spin fa-6x"></i> <br>Espere por favor </center>');
    $("#contenedor-listado-alertas").load("<?php echo site_url('alertas/listado'); ?>");
  }
  consultarAlertas();
</script>

<script type="text/javascript">
  $("#frm_nuevo_alerta").validate({
    rules: {
      nombre_alert_dn: {
        required: true
      },
      impacto_alert_dn: {
        required: true
      }
    },
    messages: {
      nombre_alert_dn: {
        required: "Por favor ingrese el nombre"
      },
      impacto_alert_dn: {
        required: "Por favor ingrese el impacto"
      }
    },
    submitHandler: function(formulario) {
      //ejecutando la peticion Asincrona
      $.ajax({
        type: 'post',
        url: '<?php echo site_url("alertas/guardar"); ?>',
        data: $(formulario).serialize(),
        success: function(data) {
          var objetoRespuesta = JSON.parse(data);
          if (objetoRespuesta.estado == "OK") {
            Swal.fire(
              'CONFIRMACIÓN',
              objetoRespuesta.mensaje,
              'success'
            );
            $("#modalNuevoAlerta").modal("hide");
            consultarAlertas();


          } else {
            Swal.fire(
              'ERROR',
              'Error al insertar, intente nuevamente',
              'error'
            );
          }

        }
      });

    }
  });
</script>

