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

  var idCorte = '';
  for (var i in data) {
    var filaHTML = document.createElement('tr');
    for (var j in data[i]) {
      var celda = document.createElement('th');

      if(j === 'No. CORTE') {
        idCorte = data[i][j];
      }

      if(j === '') {
        var boton = document.createElement('button');
        boton.className = 'glyphicon glyphicon-print';
        boton.id = idCorte;
        boton.onclick = function() {
          getCorteImprimible(this.id);
        }
        celda.appendChild(boton);
      } else {
        celda.appendChild(document.createTextNode(data[i][j]));
      }

      filaHTML.appendChild(celda);
    }
    tbody.appendChild(filaHTML);
  }

  tabla.appendChild(tbody);
  document.getElementById(idContainer).appendChild(tabla);
};
/*
$("#btnGetCortes").click(function (event) {
  if($("#datepicker").val() === '') {
    event.preventDefault();
    alert('Ingrese una fecha por favor!');
  } else {
    $("#buscaCortesForm").submit();
  }
});
*/
$('#datepicker').Zebra_DatePicker(
  {
    format: 'd-m-Y',
    days: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'],
    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    show_clear_date: '0',
    show_select_today: 'Hoy'
  }
);

var fecha = $("#datepicker").val();
$("#datepicker").focus(function() {
  if($("#datepicker").val() != fecha) {
    $("#buscaCortesForm").submit();
    fecha = $("#datepicker").val();
  }
  //$(this).blur();
});
