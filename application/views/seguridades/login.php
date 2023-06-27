<!DOCTYPE html>
<html lang="es" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Volcanes del ecuador</title>
    <link rel="icon" type="imagen/jpg" href="https://st2.depositphotos.com/5262531/8721/i/450/depositphotos_87218904-stock-photo-lightning-letter-j.jpg">

    <!-- importacion de jquerry -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  	<!-- importacion de bootstrap -->
  	<!-- Latest compiled and minified CSS -->
    <!--  Importacion de Jquerry Validate -->
    <script type="text/javascript" src="<?php echo base_url('assets/librerias/validate/jquery.validate.min.js'); ?>">
    </script>
        <!--  Importacion de Jquerry methods-->
    <script type="text/javascript" src="<?php echo base_url('assets/librerias/validate/additional-methods.min.js'); ?>">
    </script>
         <!--  Importacion de Jquerry español -->
    <script type="text/javascript" src="<?php echo base_url('assets/librerias/validate/messages_es_PE.min.js'); ?>">
    </script>
    <br>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <!-- importacion sweetalert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.css" integrity="sha512-JzSVRb7c802/njMbV97pjo1wuJAE/6v9CvthGTDxiaZij/TFpPQmQPTcdXyUVucsvLtJBT6YwRb5LhVxX3pQHQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.js" integrity="sha512-9V+5wAdU/RmYn1TP+MbEp5Qy9sCDYmvD2/Ub8sZAoWE2o6QTLsKx/gigfub/DlOKAByfhfxG5VKSXtDlWTcBWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Importacion Bootstrap Select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/i18n/defaults-es_ES.min.js" integrity="sha512-RN/dgJo36dNkKVnb1XGzePP4/8XGa/r+On4XYUy8I1C5z+9SsIEU2rFh6TrunAnddKwtXwMdI0Se8HZxd0GtiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php if ($this->session->flashdata('confirmacion')): ?>
          <script type="text/javascript">
            $(document).ready(function(){
              Swal.fire(
                'CONFIRMACIÓN', //titulo
                '<?php echo $this->session->flashdata('confirmacion'); ?>', //Contenido o mensaje
                'success' //Tipo de alerta
              )
            });
          </script>
        <?php endif; ?>


        <?php if ($this->session->flashdata('error')): ?>
          <script type="text/javascript">
            $(document).ready(function(){
              Swal.fire(
                'ERROR', //titulo
                '<?php echo $this->session->flashdata('error'); ?>', //Contenido o mensaje
                'error' //Tipo de alerta
              )
            });
          </script>
        <?php endif; ?>

  </head>
<body>
<div class="row">
  <div class="col-md-4">

  </div>
  <div class="col-md-4 well">
    <center>
      <h3>
        <i class="glyphicon glypicon-lock"></i>
        Inicio de sesion
      </h3>

      <form class="form-horizontal" id="frm_login" method="post" action="<?php echo site_url("seguridades/validarUsuario"); ?>">
            <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="email_usu_dn">Email:</label>
                <div class="col-md-6">
                <input id="email_usu_dn" name="email_usu_dn" type="text" placeholder="Ingrese su email" class="form-control input-md" required="">
                <span class="help-block">Ej. dayana@hotmail.com</span>
                </div>
              </div>

              <!-- Password input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="passwor_usu_dn">Contraseña:</label>
                <div class="col-md-6">
                  <input id="passwor_usu_dn" name="passwor_usu_dn" type="password" placeholder="Ingrese su contraseña" class="form-control input-md" required="">

                </div>
              </div>

              <!-- Button (Double) -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                  <button type="submit" class="btn btn-primary">Ingresar</button>
                  <button type="reset" class="btn btn-default">Cancelar</button>
                </div>
              </div>

              </fieldset>
          </form>

    </center>
  </div>
  <div class="col-md-4">

  </div>
</div>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
<div class="well">
  <h1 class="text-center">
    <br>
      <h3 align="center">By: Dayana Tarco</h3>
      <h1 align="center">Welcome In My Page</h1>
      <style>

    label.error{
        border:1px solid white;
        color:white;
        background-color:#E15B69;
        padding:5px;
        padding-left:15px;
        padding-right:15px;
        font-size:12px;
        opacity: 0;
          /visibility: hidden;/
          /position: absolute;/
          left: 0px;
          transform: translate(0, 10px);
          /background-color: white;/
          /padding: 1.5rem;/
          box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
          width: auto;
          margin-top:30px !important;


          z-index: 10;
          opacity: 1;
          visibility: visible;
          transform: translate(0, -20px);
          transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
          border-radius:10px;
          width:100%;

    }

    input.error{
        border:1px solid #E15B69;
    }


    select.error{
        border:1px solid #E15B69;
    }

    label.error:before{
         position: absolute;
          z-index: -1;
          content: "";
          right: calc(90% - 10px);
          top: -8px;
          border-style: solid;
          border-width: 0 10px 10px 10px;
          border-color: transparent transparent #E15B69 transparent;
          transition-duration: 0.3s;
          transition-property: transform;
    }


</style>
</div>
</footer>
</html>
