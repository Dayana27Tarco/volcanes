<legend class="text-center">
  <i class="glyphicon glyphicon-plus-sign "></i><br>
  <b>Nueva Sucursal</b>
</legend>
<hr>
<form class="" action="<?php echo site_url("sucursales/guardarSucursales") ?>" method="post" required>
  <div class="row">
    <div class="col-md-4 text-right">
      <label for="">Provincia:</label>
    </div>
    <div class="col-md-7">
      <input type="text" class="form-control" name="provincia_suc_dn" value="" placeholder="Ingresar la sucursal" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4 text-right">
      <label for="">Ciudad:</label>
    </div>
    <div class="col-md-7">
      <input type="text" class="form-control" name="ciudad_suc_dn" value="" placeholder="Ingresar la ciudad" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4 text-right">
      <label for="">Estado:</label>
    </div>
    <div class="col-md-7">
      <input type="text" class="form-control" name="estado_suc_dn" value="" placeholder="Ingresar el estado" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4 text-right">
      <label for="">direccion:</label>
    </div>
    <div class="col-md-7">
      <input type="text" class="form-control" name="direccion_suc_dn" value="" placeholder="Ingrese la direccion" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4 text-right">
      <label for="">email:</label>
    </div>
    <div class="col-md-7">
      <input type="text" class="form-control" name="email_suc_dn" value="" placeholder="Ingrese su email" required>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-7">
      <button type="submit" name="button" class="btn btn-primary">
        <i class="glyphicon glyphicon-ok"></i>
        Ok
      </button>
      <a href=" <?php echo site_url("sucursales/sucursal") ?>" class="btn btn-danger ">
        <i class="glyphicon glyphicon-remove"></i>
        Cancelar
      </a>
    </div>
  </div>
</form>
