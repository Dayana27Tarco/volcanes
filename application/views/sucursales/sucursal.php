<legend class="text-center">
  <i class="glyphicon glyphicon-user "></i><br>
  <b>Gestion de Sucursales</b><hr>
  <center>
    <a href=" <?php echo site_url("sucursales/nuevo_sucursal") ?>" class="btn btn-success">
      <i class="glyphicon glyphicon-plus"></i>
      Agregar Nuevo
    </a>
  </center>
</legend>

<hr>
<br>
<br>

<?php if ($listadoSucursales): ?>
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
      <?php foreach ($listadoSucursales->result() as $sucursalTemporal): ?>
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
  <h3><b>No existe Profesores</b></h3>
<?php endif; ?>
