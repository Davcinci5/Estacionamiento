<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>
<?php include 'validarSesion.php' ?>

<link rel="stylesheet" href="assets/css/menu.css">
<link rel="stylesheet" href="assets/css/contenido.css">

<div class="container text-center">

  <span class="label label-info">
    VEHÍCULOS APARCADOS
  </span>
  <br>
  <br>

  <div class="table-responsive" id="miDiv"></div>

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
    url:   'listarVehiculos.php',
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
