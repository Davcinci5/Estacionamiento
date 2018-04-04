<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>
<?php include 'validarSesion.php'; ?>

<link rel="stylesheet" href="assets/css/menu.css">
<link rel="stylesheet" href="assets/css/ticket.css">
<link rel="stylesheet" href="assets/css/contenido.css">

<div class="container" id="noImprimible">
  <div class="row">
    <div class="col-md-4 margenSup">
      <div class="clock">
        <ul class="listaUL">
          <li class="ElementosLI" id="hours"></li>
          <li class="ElementosLI"  id="point">:</li>
          <li class="ElementosLI" id="min"></li>
          <li class="ElementosLI" id="point">:</li>
          <li class="ElementosLI" id="sec"></li>
        </ul>
        <div id="Date"></div>
      </div>
    </div>
    <div class="col-md-6 col-md-offset-2" >
      <div class="text-center">
        <h4>INGRESO</h4>
        <hr>
      </div>
      <form id="loginForm" action="ingresoCode.php" class="form-horizontal" method="post" >
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Placas</label>
              <div class="col-md-8">
                <input id="INPUTplacas" name="txtPlacas" type="text" placeholder="" class="form-control input-md btnGrande" required="">
              </div>
            </div>
          </div>
          <div class="col-md-4 col-md-offset-2">
            <div class="form-group">
              <label class="col-md-1 col-md-offset-5 control-label numFolio" for="name">FOLIO</label>
              <div class="col-md-9 col-md-offset-3">
                <input id="txtFolio" type="text" placeholder="" class="form-control input-md inputFolio" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Modelo</label>
              <div class="col-md-5">
                <input id="name" name="txtModelo" type="text" placeholder="" class="form-control input-md">
              </div>
              <label class="col-md-2 control-label" for="name">Color</label>
              <div class="col-md-3">
                <input name="txtColor" type="text" placeholder="" class="form-control input-md">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-md-2 control-label" for="selectbasic">Tipo</label>
              <div class="col-md-5">
                <select id="selectbasic" name="selectTipo" class="form-control">
                  <option>Seleccione</option>
                  <option value="1">Automóvil</option>
                  <option value="2">Camioneta</option>
                  <option value="3">Motocicleta</option>
                  <option value="4">Otro</option>
                </select>
              </div>
              <label class="col-md-2 control-label" for="name">Cajón</label>
              <div class="col-md-3">
                <input id="name" name="txtCajon" type="text" placeholder="" class="form-control input-md">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label" for="name">Observaciones</label>
          <div class="col-md-9 ">
            <input id="name" name="txtObservaciones" type="text" placeholder="" class="form-control input-md" >
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 col-md-offset-2">
            <div class="form-group">
              <div class="col-md-10 ">
                <input type="checkbox" name="chBoxLavado" id="fancy-checkbox-danger-custom-icons" autocomplete="off" />
                <div class="btn-group">
                  <label for="fancy-checkbox-danger-custom-icons" class="btn btn-danger" id="labelLavado">
                    <span class="glyphicon glyphicon-ok"></span>
                    <span class="glyphicon glyphicon-remove"></span>
                  </label>
                  <label for="fancy-checkbox-danger-custom-icons" class="btn btn-default active">Lavado</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-success form-control" id="btnIngreso">Ingresar</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-6 col-md-offset-6">
      <div class="text-center">
        <h4>SALIDA</h4>
      </div>
      <div class="row">
        <form class="form-horizontal" method="post" action="buscarCode.php" id="salidaForm">
          <div class="col-md-6">
            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Folio</label>
              <div class="col-md-8">
                <input id="txtBuscar" name="txtBuscar" type="text" placeholder="" class="form-control input-md" required="Ingresa campo">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <button id="btnBuscar" type="submit" class="btn btn-info btn-lg form-control" data-toggle="modal" data-target="#modalBuscar">Buscar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'fichaIngreso.php' ?>
<?php include 'ticketCobro.php' ?>
<?php include 'ticketCobroCliente.php' ?>
<?php include 'partials/footer.php' ?>
</body>
</html>
