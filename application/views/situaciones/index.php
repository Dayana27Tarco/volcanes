<script type="text/javascript">
  $("#menu-situacion").addClass('active');
</script>

<center>
  <h1>Listado de situaciones volcanicas del ecuador </h1>
  <br>
  <button data-toggle="modal" data-target="#modalNuevaSituacion" class="btn btn-primary  glyphicon glyphicon-pencil">
    agregar situacion</button>
</center>

<?php if ($listadoSituaciones) : ?>
  <table class="table table-bordered
table-striped table-hover" id="tabla_situaciones">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre situacion</th>
        <th class="text-center">Alerta</th>
        <th class="text-center">Avtividad</th>
        <th class="text-center">Id Volcan</th>
        <th class="text-center">Id Alerta</th>
        <th class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listadoSituaciones as $situacion) : ?>
        <tr>
          <td class="text-center">
            <?php echo $situacion->id_si_dn; ?>
          </td>
          <td class="text-center">
            <?php echo $situacion->nombre_si_dn ?>
          </td>
          <td class="text-center">
            <?php echo $situacion->alerta_si_dn; ?>
          </td>
          <td class="text-center">
            <?php echo $situacion->actividad_si_dn; ?>
          </td>
          <td class="text-center">
            <?php echo $situacion->fk_id_nomvol_dn; ?>
          </td>
          <td class="text-center">
            <?php echo $situacion->fk_id_alerta_dn; ?>
          </td>
          <td class=text-center>
            <button data-toggle="modal" data-target="#modalEditarSituacion" id="botonEditarSituacion<?php echo $situacion->id_si_dn ?>" class="btn btn-primary">
              <i class="glyphicon glyphicon-pencil">Editar</i>
            </button>
            <button id="botonEliminarSituacion<?php echo $situacion->id_si_dn ?>" class="btn btn-danger ">
              <i class="glyphicon glyphicon-trash">Eliminar</i>
            </button>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else : ?>
  <div class="alert alert-info" role="alert">
    <strong>Info!</strong> No hay situaciones registradas.
  </div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="modalNuevaSituacion" tabindex="-1" role="dialog" aria-labelledby="modalNuevaSituacionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNuevaSituacionLabel">Agregar nueva situación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="form_nueva_situacion">
        <div class="modal-body">
          <div class="form-group">
            <label for="nombre_si_dn">Nombre situación</label>
            <input name="nombre_si_dn" type="text" class="form-control" id="nombre_si_dn" placeholder="Nombre de la situación">
          </div>
          <div class="form-group">
            <label for="alerta_si_dn">Descripcion alerta</label>
            <input name="alerta_si_dn" type="text" class="form-control" id="alerta_si_dn" placeholder="Descripcion de la alerta">
          </div>
          <div class="form-group">
            <label for="actividad_si_dn">Actividad situación</label>
            <input name="actividad_si_dn" type="text" class="form-control" id="actividad_si_dn" placeholder="Última Erupción">
          </div>
          <div class="form-group">
            <label for="fk_id_nomvol_dn">Volcan implicado</label>
            <?php if ($listadoVolcan) : ?>
              <select name="fk_id_nomvol_dn" id="fk_id_nomvol_dn">
                <option value="">Seleccione un Volcán</option>
                <?php foreach ($listadoVolcan as $volcan) : ?>
                  <option value="<?php echo $volcan->id_vol_dn; ?>"><?php echo $volcan->nombre_vol_dn; ?></option>
                <?php endforeach; ?>
              </select>
            <?php else : ?>
              <select required name="fk_id_nomvol_dn" id="fk_id_nomvol_dn">
                <option value="">Seleccione un Volcán</option>
                <?php foreach ($listadoVolcan as $volcan) : ?>
                  <option value="<?php echo $volcan->id_vol_dn; ?>"><?php echo $volcan->nombre_vol_dn; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="alert alert-info" role="alert">
                <strong>Info!</strong> No hay volcanes registrados.
              </div>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="fk_id_nomvol_dn">Alerta registrada</label>
            <?php if ($listadoAlerta) : ?>
              <select name="fk_id_alerta_dn" id="fk_id_alerta_dn">
                <option value="">Seleccione una alerta</option>
                <?php foreach ($listadoAlerta as $alerta) : ?>
                  <option value="<?php echo $alerta->id_alert_dn; ?>"><?php echo $alerta->nombre_alert_dn; ?></option>
                <?php endforeach; ?>
              </select>
            <?php else : ?>
              <select required name="fk_id_alerta_dn" id="fk_id_alerta_dn">
                <option value="">Seleccione una alerta</option>
                <?php foreach ($listadoAlerta as $alerta) : ?>
                  <option value="<?php echo $alerta->id_alert_dn; ?>"><?php echo $alerta->nombre_alert_dn; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="alert alert-info" role="alert">
                <strong>Info!</strong> No hay alertas registradas.
              </div>
            <?php endif; ?>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Situacion</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalEditarSituacion" tabindex="-1" role="dialog" aria-labelledby="modalEditarSituacionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarSituacionLabel">Editar situación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="form_editar_situacion">
        <div class="modal-body">
          <div class="form-group">
            <label for="nombre_si_dn_editar">Nombre situación</label>
            <input name="nombre_si_dn_editar" type="text" class="form-control" id="nombre_si_dn_editar" placeholder="Nombre de la situación">
          </div>
          <div class="form-group">
            <label for="alerta_si_dn_editar">Descripcion alerta</label>
            <input name="alerta_si_dn_editar" type="text" class="form-control" id="alerta_si_dn_editar" placeholder="Descripcion de la alerta">
          </div>
          <div class="form-group">
            <label for="actividad_si_dn_editar">Actividad situación</label>
            <input name="actividad_si_dn_editar" type="text" class="form-control" id="actividad_si_dn_editar" placeholder="Última Erupción">
          </div>
          <div class="form-group">
            <label for="fk_id_nomvol_dn_editar">Volcan implicado</label>
            <?php if ($listadoVolcan) : ?>
              <select name="fk_id_nomvol_dn_editar" id="fk_id_nomvol_dn_editar">
                <option value="">Seleccione un Volcán</option>
                <?php foreach ($listadoVolcan as $volcan) : ?>
                  <option value="<?php echo $volcan->id_vol_dn; ?>"><?php echo $volcan->nombre_vol_dn; ?></option>
                <?php endforeach; ?>
              </select>
            <?php else : ?>
              <select required name="fk_id_nomvol_dn_editar" id="fk_id_nomvol_dn_editar">
                <option value="">Seleccione un Volcán</option>
                <?php foreach ($listadoVolcan as $volcan) : ?>
                  <option value="<?php echo $volcan->id_vol_dn; ?>"><?php echo $volcan->nombre_vol_dn; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="alert alert-info" role="alert">
                <strong>Info!</strong> No hay volcanes registrados.
              </div>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="fk_id_alerta_dn_editar">Alerta registrada</label>
            <?php if ($listadoAlerta) : ?>
              <select name="fk_id_alerta_dn_editar" id="fk_id_alerta_dn_editar">
                <option value="">Seleccione una alerta</option>
                <?php foreach ($listadoAlerta as $alerta) : ?>
                  <option value="<?php echo $alerta->id_alert_dn; ?>"><?php echo $alerta->nombre_alert_dn; ?></option>
                <?php endforeach; ?>
              </select>
            <?php else : ?>
              <select required name="fk_id_alerta_dn_editar" id="fk_id_alerta_dn_editar">
                <option value="">Seleccione una alerta</option>
                <?php foreach ($listadoAlerta as $alerta) : ?>
                  <option value="<?php echo $alerta->id_alert_dn; ?>"><?php echo $alerta->nombre_alert_dn; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="alert alert-info" role="alert">
                <strong>Info!</strong> No hay alertas registradas.
              </div>
            <?php endif; ?>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Editar Situacion</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $('#form_nueva_situacion').validate({
    rules: {
      nombre_si_dn: {
        required: true,
        minlength: 3
      },
      alerta_si_dn: {
        required: true,
        minlength: 3
      },
      actividad_si_dn: {
        required: true,
        minlength: 3
      },
      fk_id_nomvol_dn: {
        required: true,
        minlength: 1
      },
      fk_id_alerta_dn: {
        required: true,
        minlength: 1
      }
    },
    messages: {
      nombre_si_dn: {
        required: "Por favor ingrese un nombre",
        minlength: "El nombre debe tener al menos 3 caracteres"
      },
      alerta_si_dn: {
        required: "Por favor ingrese una descripción",
        minlength: "La descripción debe tener al menos 3 caracteres"
      },
      actividad_si_dn: {
        required: "Por favor ingrese una actividad",
        minlength: "La actividad debe tener al menos 3 caracteres"
      },
      fk_id_nomvol_dn: {
        required: "Por favor seleccione un volcán",
        minlength: "El volcán debe tener al menos 1 caracteres"
      },
      fk_id_alerta_dn: {
        required: "Por favor seleccione una alerta",
        minlength: "La alerta debe tener al menos 1 caracteres"
      }
    },
    submitHandler: function(form) {
      $.ajax({
        url: "<?php echo site_url("situaciones/agregar"); ?>",
        type: "POST",
        data: $('#form_nueva_situacion').serialize(),
        dataType: "json",
        success: function(data) {
          if (data.status = "ok") {
            Swal.fire({
              icon: 'success',
              title: 'Situación registrada',
              text: data.message,
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
              $('#modal_nueva_situacion').modal('hide');
              $('#form_nueva_situacion')[0].reset();
            }).then(function() {
              location.reload();
            });

          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: data.message,
              showConfirmButton: false,
              timer: 1500
            });
          }
        }
      });
    }
  })
</script>

<script>
  <?php if ($listadoSituaciones) : ?>
    <?php foreach ($listadoSituaciones as $situacion) : ?>
      $('#botonEliminarSituacion<?php echo $situacion->id_si_dn; ?>').click(function(e) {
        e.preventDefault();
        Swal.fire({
          title: '¿Está seguro de eliminar la situación?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "<?php echo site_url("situaciones/eliminar/"); ?>" + <?php echo $situacion->id_si_dn; ?>,
              type: "POST",
              dataType: "json",
              success: function(response) {
                if (response.status = "ok") {
                  Swal.fire({
                    icon: 'success',
                    title: 'Situación eliminada',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(function() {
                    location.reload();
                  });
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  });
                }
              }
            });
          }
        })
      })
    <?php endforeach; ?>
  <?php endif; ?>
</script>

<script>
  <?php if ($listadoSituaciones) : ?>
    <?php foreach ($listadoSituaciones as $situacion) : ?>
      $('#botonEditarSituacion<?php echo $situacion->id_si_dn; ?>').click(function(e) {
        e.preventDefault();
        $.ajax({
          url: "<?php echo site_url("situaciones/obtenerSituacionPorId/"); ?>" + <?php echo $situacion->id_si_dn; ?>,
          type: "POST",
          dataType: "json",
          success: function(response) {
            if (response) {
              $('#nombre_si_dn_editar').val(response.nombre_si_dn);
              $('#alerta_si_dn_editar').val(response.alerta_si_dn);
              $('#actividad_si_dn_editar').val(response.actividad_si_dn);
              $('#fk_id_nomvol_dn_editar').val(response.fk_id_nomvol_dn);
              $('#fk_id_alerta_dn_editar').val(response.fk_id_alerta_dn);
              $('#form_editar_situacion').validate({
                rules: {
                  nombre_si_dn_editar: {
                    required: true,
                    minlength: 3
                  },
                  alerta_si_dn_editar: {
                    required: true,
                    minlength: 3
                  },
                  actividad_si_dn_editar: {
                    required: true,
                    minlength: 3
                  },
                  fk_id_nomvol_dn_editar: {
                    required: true,
                    minlength: 1
                  },
                  fk_id_alerta_dn_editar: {
                    required: true,
                    minlength: 1
                  }
                },
                messages: {
                  nombre_si_dn_editar: {
                    required: "Por favor ingrese un nombre",
                    minlength: "El nombre debe tener al menos 3 caracteres"
                  },
                  alerta_si_dn_editar: {
                    required: "Por favor ingrese una descripción",
                    minlength: "La descripción debe tener al menos 3 caracteres"
                  },
                  actividad_si_dn_editar: {
                    required: "Por favor ingrese una actividad",
                    minlength: "La actividad debe tener al menos 3 caracteres"
                  },
                  fk_id_nomvol_dn_editar: {
                    required: "Por favor seleccione un volcán",
                    minlength: "El volcán debe tener al menos 1 caracteres"
                  },
                  fk_id_alerta_dn_editar: {
                    required: "Por favor seleccione una alerta",
                    minlength: "La alerta debe tener al menos 1 caracteres"
                  }
                },
                submitHandler: function(form) {
                  $.ajax({
                    url: "<?php echo site_url("situaciones/editar/"); ?>" + <?php echo $situacion->id_si_dn; ?>,
                    type: "POST",
                    data: $('#form_editar_situacion').serialize(),
                    dataType: "json",
                    success: function(data) {
                      if (data.status = "ok") {
                        Swal.fire({
                          icon: 'success',
                          title: 'Situación editada',
                          text: data.message,
                          showConfirmButton: false,
                          timer: 1500
                        }).then(function() {
                          $('#modal_editar_situacion').modal('hide');
                          $('#form_editar_situacion')[0].reset();
                        }).then(function() {
                          location.reload();
                        });

                      } else {
                        Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: data.message,
                          showConfirmButton: false,
                          timer: 1500
                        });
                      }
                    }
                  });
                }
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message,
                showConfirmButton: false,
                timer: 1500
              });
            }
          }
        });
      })
    <?php endforeach; ?>
  <?php endif; ?>
</script>