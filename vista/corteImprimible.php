<?php
// VISTA DE CORTE IMPRIMIBLE
?>
<div class="container text-center vacia" id="miCorte">

  <h4 class="">CORTE</h4>

  <div class="row borde-superior">
    <div class="col-xs-6">
      <div class="col-xs-7 text-left">
        <label>No. Corte:</label>
      </div>
      <div class="col-xs-1 text-left">
        <label id="numCorte"></label>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="col-xs-6 text-left">
        <label>Atendidos:</label>
      </div>
      <div class="col-xs-6 text left">
        <label id="atendidosCorte"></label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="col-xs-2 text-left">
        <label>Fecha:</label>
      </div>
      <div class="col-xs-10 text left">
        <label id="fechaCorte"></label>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="col-xs-2 text-left">
        <label>Hora:</label>
      </div>
      <div class="col-xs-10 text left">
        <label id="horaCorte"></label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="col-xs-4 text-left">
        <label>Usuario:</label>
      </div>
      <div class="col-xs-8 text-left">
        <label id="usuarioCorte"></label>
      </div>
    </div>
  </div>

  <h4>Ingresos</h4>

  <div class="row">
    <div class="col-xs-6">
      <div class="col-xs-6 text-left">
        <label>Efectivo:</label>
      </div>
      <div class="col-xs-6 text-left">
        <label id="efectivoCorte"></label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="col-xs-6 text-left">
        <label>Otros:</label>
      </div>
      <div class="col-xs-6 text-left">
        <label id="otrosCorte"></label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="col-xs-6 text-left">
        <label>Total Ingresos:</label>
      </div>
      <div class="col-xs-6 text-left">
        <label id="total_ingresoCorte"></label>
      </div>
    </div>
  </div>

  <h4>Egresos</h4>

  <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-12 text-left">
        <label id="egresos_deescripcionCorte" class="white-space-pre"></label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="col-xs-6 text-left">
        <label>Total Egresos:</label>
      </div>
      <div class="col-xs-6 text-left">
        <label id="egresos_montoCorte"></label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="col-xs-6 text-left">
        <label>Caja:</label>
      </div>
      <div class="col-xs-6 text-left">
        <label id="cajaCorte"></label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="col-xs-6 text-left">
        <label>Entregado:</label>
      </div>
      <div class="col-xs-6 text-left">
        <label id="entregadoCorte"></label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6">
      <div class="col-xs-6 text-left">
        <label>Diferencia:</label>
      </div>
      <div class="col-xs-6 text-left">
        <label id="diferenciaCorte"></label>
      </div>
    </div>
  </div>

<br>
<br>

      <h4 class="vacia" id="titleDetalle">Detalle de vehículos</h4>
      <div class="table-responsive vacia" id="miDivVehiculos"></div>

  </div>

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

</script>
