<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>
<?php include 'validarSesion.php'; ?>

<link rel="stylesheet" href="assets/css/menu.css">
<link rel="stylesheet" href="assets/css/ticket.css">
<link rel="stylesheet" href="assets/css/contenido.css">

<div class="container text-center" id="noImprimible">

  <div class="col-md-12 text-center">
    <strong>Acceso sólo a</strong>
    <span class="label label-info">
      <?php echo $_SESSION["usuario"]["Admin"] == 1 ? 'Admin' : 'User'; ?>
    </span>
  </div>

  <br>
  <br>

  <div class="col-md-3 col-md-offset-4">
    <form class="form-horizontal" method="post" id="buscaCortesForm">
      <div class="form-group">
        <div class="col-md-4 text-left">
          <label>Fecha:</label>
        </div>
        <div class="col-md-8 espacio-izquierdo">
          <input type="text" name="datepicker" id="datepicker" class="form-control input-md ancho">
        </div>
      </div>
      <?php /*
      <div class="form-group">
      <input type="submit" id="btnGetCortes" value="Buscar" class="btn btn-success form-control">
      </div>
      */ ?>
    </form>
  </div>
  <div class="col-md-12">
    <div class="table-responsive" id="miDiv"></div>
  </div>
</div>
<?php include 'corteImprimible.php' ?>
<?php include 'partials/footer.php' ?>
</body>
</html>
