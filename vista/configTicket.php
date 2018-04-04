<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>
<?php include 'validarSesion.php' ?>

<link rel="stylesheet" href="assets/css/menu.css">
<link rel="stylesheet" href="assets/css/contenido.css">

<div class="container">
  <div class="row">

    <div class="col-md-12 text-center">
      <strong>Acceso sólo a</strong> <span class="label label-info"> <?php echo $_SESSION["usuario"]["Admin"] == 1 ? 'Admin' : 'User'; ?> </span>
      <p><strong>CONFIGURACIÓN DE TICKET</strong></p>
    </div>

    <div class="col-md-12">
      <form class="form-horizontal" action="configCode.php" method="post" id="ticketForm" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-md-2 control-label col-md-offset-2">Logotipo:</label>
          <div class="col-md-6">
            <p><img id="imgLogo" width="100px"></p>
            <input style="display:none" type="file" name="fileLogo" id="typefile">
            <button id="btnUpload" type="button" class="btn btn-primary">
              Cambiar
            </button>
            <span id="display"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label col-md-offset-2">Encabezado:</label>
          <div class="col-md-6">
            <textarea class="form-control input-md" name="txtEncabezado" rows="5" cols="80" id="txtEncabezado"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label col-md-offset-2">Pie (Entrada):</label>
          <div class="col-md-6">
            <textarea class="form-control input-md" name="txtPie" rows="5" cols="80" id="txtPie"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label col-md-offset-2">Pie (Salida):</label>
          <div class="col-md-6">
            <textarea class="form-control input-md" name="txtPieSalida" rows="5" cols="80" id="txtPieSalida"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-success form-control" id="btnActualizar">Guardar</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>

<?php include 'partials/footer.php' ?>

<script type="text/javascript">

$('#btnUpload').click(function(){
  $("#typefile").click();
});

$("#typefile").change(function(){
/*
  $("#display").html(
    $("#typefile").val().substring(
      $("#typefile").val().lastIndexOf('\\')+1));*/
    }
  );

</script>
