<div class="row">
  <div class="col-md-12 text-center well">

    <h3>Actualizar Sucursal</h3>

  </div>
</div>

<div class="row">
<div class="col-md-12">
  <?php if ($SucursalEditar): ?>
  <form class="" action="<?php echo site_url("sucursales/procesarEditar") ?>" method="post" required>
    <center>
    <input type="hidden" name="id_suc_dn" value="<?php echo $sucursalEditar->id_suc_dn ?>">
    </center>
    <br>
    <div class="row">
      <div class="col-md-4 text-right">
        <label for="">Provincia:</label>
      </div>
      <div class="col-md-7">
        <input type="text" class="form-control" name="provincia_suc_dn" value="<?php echo $sucursalEditar->provincia_suc_dn; ?>" placeholder="Ingresar la provincia" required>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4 text-right">
        <label for="">Ciudad:</label>
      </div>
      <div class="col-md-7">
        <input type="text" class="form-control" name="ciudad_suc_dn" value="<?php echo $sucursalEditar->ciudad_suc_dn ?>" placeholder="Ingresar la ciudad" required>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4 text-right">
        <label for="">estado:</label>
      </div>
      <div class="col-md-7">
        <input type="text" class="form-control" name="estado_suc_dn" value="<?php echo $sucursalEditar->estado_suc_dn ?>" placeholder="Ingresar el estado" required>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4 text-right">
        <label for="">direccion:</label>
      </div>
      <div class="col-md-7">
        <input type="number" class="form-control" name="direccion_suc_dn" value="<?php echo $sucursalEditar->direccion_suc_dn ?>" placeholder="Ingresar la direccion" required>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4 text-right">
        <label for="">Email:</label>
      </div>
      <div class="col-md-7">
        <input type="number" class="form-control" name="email_usu_dn" value="<?php echo $Editar->email_suc_dn ?>" placeholder="Ingresar el email" required>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-7">
        <button type="submit" name="button" class="btn btn-success">
          <i class="glyphicon glyphicon-ok"></i>
          Actualizar
        </button>
        <a href=" <?php echo site_url("sucursales/sucursal") ?>" class="btn btn-warning ">
          <i class="glyphicon glyphicon-remove"></i>
          Regresar
        </a>
      </div>
    </div>
  </form>
  <?php  else: ?>
  <div class="alert alert-danger">
    <b>No se encontro al profesor</b>
  </div>
  <?php endif; ?>
</div>
</div>
