<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>
<?php include 'validarSesion.php' ?>

<link rel="stylesheet" href="assets/css/menu.css">
<link rel="stylesheet" href="assets/css/contenido.css">

<div class="container text-center">

  <strong>Acceso sólo a</strong>
  <span class="label label-info">
    <?php echo $_SESSION["usuario"]["Admin"] == 1 ? 'Admin' : 'User'; ?>
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

  var idUser = '';
  for (var i in data) {
    var filaHTML = document.createElement('tr');
    for (var j in data[i]) {
      var celda = document.createElement('th');

      /************************************************************************************
      * elemento a ingresar en cada celda de cada fila contenida en el tbody de la tabla *                                                        *
      ************************************************************************************/

      if (j === 'ID DE USUARIO') {
        idUser = data[i][j];
      }

      if(j === 'ADMIN') {
        var boton;
        data[i][j] === '1' ? boton = getBoton('yes') : boton = getBoton('no')
        boton.dataset.admin = j;
        boton.id = i+j;
        boton.dataset.id_usuario = idUser;
        boton.onclick = function() {
          changeIcon(this);
        }
        celda.appendChild(boton);
      } else if (j === 'ACTIVO') {
        var boton;
        data[i][j] === '1' ? boton = getBoton('yes') : boton = getBoton('no')
        boton.dataset.activo = j;
        boton.id = i+j;
        boton.dataset.id_usuario = idUser;
        boton.onclick = function() {
          changeIcon(this);
        }
        celda.appendChild(boton);
      }
      else {
        celda.appendChild(document.createTextNode(data[i][j]));
      }

      filaHTML.appendChild(celda);
    }
    tbody.appendChild(filaHTML);
  }

  tabla.appendChild(tbody);
  document.getElementById(idContainer).appendChild(tabla);
};

function getBoton(icono) {
  var clase;

  switch (icono) {
    case 'yes':
    clase = 'glyphicon glyphicon-ok';
    break;
    case 'no':
    clase = 'glyphicon glyphicon-remove';
    break;
  }

  var boton = document.createElement("button");
  var span = document.createElement("span");
  span.className = clase;
  boton.appendChild(span);
  return boton;
}

function guardarPrivilegios(boton) {

  var datos = {
    'admin': boton.dataset.admin,
    'id_usuario': boton.dataset.id_usuario
  }

  $.ajax({
    type: 'POST',
    dataType: "json",
    url:   'updatePrivilegios.php',
    data: datos,
  })
  .done(function( data, textStatus, jqXHR ) {
    if ( console && console.log ) {
    }
  })
  .fail(function( jqXHR, textStatus, errorThrown ) {
    if ( console && console.log ) {
      console.log(jqXHR);
      console.log(textStatus);
    }
  });
}

function guardarStatus(boton) {

  var datos = {
    'activo': boton.dataset.activo,
    'id_usuario': boton.dataset.id_usuario
  }

  $.ajax({
    type: 'POST',
    dataType: "json",
    url:   'updateStatus.php',
    data: datos,
  })
  .done(function( data, textStatus, jqXHR ) {
    if ( console && console.log ) {
    }
  })
  .fail(function( jqXHR, textStatus, errorThrown ) {
    if ( console && console.log ) {
      console.log(jqXHR);
      console.log(textStatus);
    }
  });
}

function listar() {
  $.ajax({
    type: 'GET',
    dataType: "json",
    url:   'listarUsuarios.php',
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

function changeIcon(boton) {
  elemento = '#'+boton.id;

  if($(elemento).children().hasClass('glyphicon glyphicon-ok')) {
    $(elemento).children().removeClass('glyphicon glyphicon-ok');
    $(elemento).children().addClass('glyphicon glyphicon-remove');

    if(boton.dataset.admin){
      boton.dataset.admin = 0;
    }

    if(boton.dataset.activo) {
      boton.dataset.activo = 0;
    }

  } else {
    $(elemento).children().removeClass('glyphicon glyphicon-remove');
    $(elemento).children().addClass('glyphicon glyphicon-ok');

    if(boton.dataset.admin){
      boton.dataset.admin = 1;
    }

    if(boton.dataset.activo) {
    boton.dataset.activo = 1;
  }
}

if(boton.dataset.admin) {
  guardarPrivilegios(boton);
} else {
  guardarStatus(boton);
}

}

listar();

</script>
</body>
</html>
