<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>
<?php include 'validarSesion.php'; ?>

<link rel="stylesheet" href="assets/css/menu.css">
<link rel="stylesheet" href="assets/css/ticket.css">
<link rel="stylesheet" href="assets/css/contenido.css">

<div class="container" id="noImprimible">
  <div class="row">

    <div class="col-md-12 text-center">
      <span class="label label-info"> CORTE </span>
    </div>

    <br>
    <br>

    <div class="col-md-12">
      <form class="form-horizontal" action="corteCode.php" method="post" id="corteForm" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-md-2 control-label col-md-offset-2">Efectivo:</label>
          <div class="col-md-6">
            <input class="form-control input-md" name="txtEfectivo" id="txtEfectivo" value=0></input>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label col-md-offset-2">Egresos (descripción):</label>
          <div class="col-md-6">
            <textarea class="form-control input-md" name="txtEgresosDescripcion" rows="3" cols="80" id="txtEgresosDescripcion"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label col-md-offset-2">Egresos (monto):</label>
          <div class="col-md-6">
            <input class="form-control input-md" name="txtEgresos" id="txtEgresos" value=0></input>
          </div>
        </div>        
        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-success form-control" id="btnCorte">Generar corte</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>

<?php include 'corteImprimible.php' ?>
<?php include 'partials/footer.php' ?>

<script type="text/javascript">

$("#conDetalle").hide();

$('#txtEfectivo, #txtOtra').keyup(() => {
  var efectivo = parseFloat($('#txtEfectivo').val());
  var otra = parseFloat($('#txtOtra').val());
  isNaN(otra) ? otra = 0 : otra = otra
  isNaN(efectivo) ? efectivo = 0 : efectivo = efectivo
  $('#txtSuma').val(efectivo + otra);
});

$('#opcion').append(getBoton('no', 'btnDetalle'));

$('#btnDetalle').click(function(event) {
  event.preventDefault(); // detiene el envío del formulario
  changeIcon(this);
}
);

function changeIcon(boton) {
  elemento = '#'+boton.id;

  if($(elemento).children().hasClass('glyphicon glyphicon-ok')) {
    $(elemento).children().removeClass('glyphicon glyphicon-ok');
    $(elemento).children().addClass('glyphicon glyphicon-remove');
    $("#conDetalle").attr('value', 0);
  } else {
    $(elemento).children().removeClass('glyphicon glyphicon-remove');
    $(elemento).children().addClass('glyphicon glyphicon-ok');
    $("#conDetalle").attr('value', 1);
}

}

function getBoton(icono, id) {
  var clase;

  switch (icono) {
    case 'yes':
    clase = 'glyphicon glyphicon-ok';
    break;
    case 'no':
    clase = 'glyphicon glyphicon-remove';
    break;
  }

  var boton = document.createElement('button');
  var span = document.createElement("span");
  span.className = clase;
  boton.appendChild(span);
  boton.id = id;
  return boton;
}

</script>

</body>
</html>
