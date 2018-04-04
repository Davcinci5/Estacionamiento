<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>
<?php include 'validarSesion.php'; ?>

<link rel="stylesheet" href="assets/css/menu.css">

<div class="container">
  <div class="text-center">
    <h4>Acceso sólo a</h4> <span class="label label-info"> <?php echo $_SESSION["usuario"]["Admin"] == 1 ? 'Admin' : 'User'; ?> </span>
    <h4>Configuración de precios</h4>
  </div>
  <br>

  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive" id="miDiv"></div>
    </div>
  </div>
  <br>

  <form class="" action="preciosCode" method="post" id="preciosForm">
    <div class="form-group">
      <div class="row">

        <div class="col-md-4">
          <label class="col-md-4 control-label" for="selectbasic">Tipo</label>
          <div class="col-md-8">
            <select id="selectbasic" name="selectTipo" class="form-control">
              <option>Seleccione</option>
              <option value="1">Automóvil</option>
              <option value="2">Camioneta</option>
              <option value="3">Motocicleta</option>
              <option value="4">Otro</option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <label class="col-md-4 control-label" for="selectbasic">Concepto</label>
          <div class="col-md-8">
            <select id="selectbasic" name="selectConcepto" class="form-control">
              <option>Seleccione</option>
              <option value="fraccion">Fracción</option>
              <option value="hora">Hora</option>
              <option value="dia">Día</option>
              <option value="semana">Semana</option>
              <option value="mes">Mes</option>
              <option value="quincena">Quincena</option>
              <option value="lavado">Lavado</option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <label class="col-md-4 control-label" for="selectbasic">Precio</label>
          <div class="col-md-8">
            <input type="text" name="txtPrecio" value="" class="form-control input-md">
          </div>
        </div>

      </div>
    </div>

    <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
        <button type="submit" class="btn btn-success form-control" id="btnActualizar">Guardar</button>
      </div>
    </div>

  </form>

</div>

<?php include 'partials/footer.php' ?>
<script type="text/javascript">

function crearTabla(data, idElement, idContainer) {
  var tabla = document.createElement('table');
  $("#"+idElement).remove();
  tabla.id = idElement;
  tabla.className = 'table table-hover';
  var thead = document.createElement('thead');
  var tr = document.createElement('tr');

  for (var j in data[0]) {
    var th = document.createElement('th');
    th.appendChild(document.createTextNode(j));
    tr.appendChild(th);
  }
  thead.appendChild(tr);
  tabla.appendChild(thead);

  var tbody = document.createElement('tbody');

  for (var i in data) {
    var filaHTML = document.createElement('tr');
    for (var j in data[i]) {
      var celda = document.createElement('th');
      celda.appendChild(document.createTextNode(data[i][j]));
      filaHTML.appendChild(celda);
    }
    tbody.appendChild(filaHTML);
  }

  tabla.appendChild(tbody);
  document.getElementById(idContainer).appendChild(tabla);
};

function listar() {
  $.ajax({
    type: 'GET',
    dataType: "json",
    url:   'listarPrecios.php',
  })
  .done(function( data, textStatus, jqXHR ) {
    if ( console && console.log ) {
      crearTabla(data, "miTabla", "miDiv");
    }
  })
  .fail(function( jqXHR, textStatus, errorThrown ) {
    if ( console && console.log ) {
      console.log(jqXHR);
      console.log(textStatus);
    }
  });
}

listar();

</script>
</body>
</html>
