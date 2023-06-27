<script type="text/javascript">
  $("#menu-sucursales").addClass('active');
</script>

<legend class="text-center">
  <i class="glyphicon glyphicon-user "></i><br>
  <b>Gestion de Sucursales</b><hr>
</legend>


<?php if ($listado): ?>
  <table class="table table-stripe table-border table-hover">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Provincia</th>
        <th class="text-center">Ciudad</th>
        <th class="text-center">Estado</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Email</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php foreach ($listado->result() as $sucursalTemporal): ?>
        <tr>
            <td class="tex-center">
              <?php echo $sucursalTemporal->id_suc_dn; ?>
            </td>
            <td class="tex-center">
              <?php echo $sucursalTemporal->provincia_suc_dn; ?>
            </td>
            <td class="tex-center">
              <?php echo $sucursalTemporal->ciudad_suc_dn; ?>
            </td>
            <td class="tex-center">
              <?php echo $sucursalTemporal->estado_suc_dn; ?>
            </td>
            <td class="tex-center">
              <?php echo $sucursalTemporal->direccion_suc_dn; ?>
            </td>
            <td class="tex-center">
              <?php echo $sucursalTemporal->email_suc_dn; ?>
            </td>

            <td class="text-center">
            <a href="<?php echo site_url("sucursales/editar"); ?>/<?php echo $sucursalTemporal->id_suc_dn; ?>" class="btn btn-warning ">
              <i class="glyphicon glyphicon-pencil">Editar</i>
              </a>
              <a href="<?php echo site_url("sucursales/borrar"); ?>/<?php echo $sucursalTemporal->id_suc_dn; ?>" class="btn btn-danger ">
                <i class="glyphicon glyphicon-trash">Eliminar</i>
              </a>
            </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <h3><b>No existe Sucursal</b></h3>
<?php endif; ?>


<!-- Trigger the modal with a button -->
<center><button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalNuevoSucursal">
<i class="glyphicon glyphicon-plus "></i> Agregar
</button>
</center>
<!-- Modal -->
<div id="modalNuevoSucursal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva Sucursal</h4>
      </div>
      <div class="modal-body">
        <form id="frm_nuevo_sucursal" class="" action="<?php echo site_url('sucursales/guardar') ?>" method="post">
          <b> Provincia: </b> <br>
          <input type="text" id="provincia_suc_dn" name="provincia_suc_dn" value=""
          placeholder="Ingresar  la provincia" class="form-control"><br>

          <b> Ciudad: </b> <br>
          <input type="text" id="ciudad_suc_dn" name="ciudad_suc_dn" value=""
          placeholder="Ingresar  la ciudad" class="form-control"><br>

          <b> Estado: </b> <br>
          <input type="text" id="estado_suc_dn" name="estado_suc_dn" value=""
          placeholder="Ingresar  el estado" class="form-control"><br>

          <b> Direccion: </b> <br>
          <input type="text" id="direccion_suc_dn" name="direccion_suc_dn" value=""
          placeholder="Ingresar  la direccion" class="form-control"><br>

          <b> Email: </b> <br>
          <input type="text" id="email_suc_dn" name="email_suc_dn" value=""
          placeholder="Ingresar  el estado" class="form-control"><br>

          <center><button type="submit" name="button" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>Guardar </button>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center>
        </form>
      </div>
      <div class="modal-footer">
        <center>

      </center>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
   $("#frm_nuevo_sucursal").validate({
      rules:{
          provincia_suc_dn:{
            required:true
          },
          ciudad_suc_dn:{
            required: true
          },
          estado_suc_dn:{
            required:true
          },
          direccion_suc_dn:{
            required: true
          },
          email_suc_dn:{
            required: true
          }
      },
      messages:{
        provincia_suc_dn:{
          required:"Por favor ingrese la provincia"
        },
        ciudad_suc_dn:{
          required: "Por favor ingrese la ciudad"
        },
        estado_suc_dn:{
          required:"Por favor ingrese el estado"
        },
        direccion_suc_dn:{
          required: "Por favor ingrese la direccion"
        },
        email_suc_dn:{
          required: "Por favor ingrese su email"
        }
      },
      submitHandler:function(formulario){
        // ejecutando la peticion asincrona
        $.ajax({
          type:'post',
          url:'<?php echo site_url("sucursales/guardar"); ?>',
          data:$(formulario).serialize(),
          success:function(data){
            var objetoRespuesta=JSON.parse(data);
            if (objetoRespuesta.estado=="ok" || objetoRespuesta.estado=="OK") {
              Swal.fire('Confirmacion',objetoRespuesta.mensaje, 'success'

            );
            $("#modalNuevoSucursal").modal("hide");
            }
            else {
              Swal.fire(
                'ERROR','Error al insertar, intente nuevamente','error'
              );
            }
            // alert(data);
            // $("#modalNuevoProfesor").modal("hide");
          }
        });
      }
   });
</script>
