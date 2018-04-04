<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>
<?php include 'validarSesion.php'; ?>


  <style type="text/css">

  /*********************************************
  REAJUSTAR BODY HASTA EL FINAL DE LA PANTALLA
  *********************************************/
  body{
    height: auto !important;
    min-height: 100%;
  }

  /**************
  * SUBIR BODY  *
  **************/
        body {
            padding-top: 0px !important;
        }

        /**************
        * BAJAR EL FORMULARIO  *
        **************/

        .panel-login {
          margin-top: 80px;
        }
  </style>
  <link rel="stylesheet" href="assets/css/menu.css">

  <!-- *******************************
  **              FORMULARIO        **
  **********************************-->
  <div class="container">

    <div class="starter-template">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"> Mis datos </h3>
                  </div>
                  <div class="panel-body">

                    <form id="updateCuentaForm" action="cuentaCode.php" method="post" role="form" style="display: block;">
                      <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="txtPassword" id="txtPassword"  class="form-control">
                      </div>
                      <div class="form-group" >
                        <div class="row">
                          <div class="col-md-5 col-md-offset-5">
                              <label id="labelPass">Mostrar Password</label>
                          </div>
                          <div class="col-md-2" id="opcion">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6 col-md-offset-3">
                            <input type="submit" name="btnCambiarCuenta" id="btnCambiarCuenta" class="form-control btn btn-success" value="Guardar">
                          </div>
                        </div>
                      </div>
                    </form>

                  </div>
                  <div class="panel-footer">

                  </div>
                </div>
        </div>
      </div>
    </div>

    </div>

    <link rel="stylesheet" href="assets/css/formulario.css">
    <?php include 'partials/footer.php' ?>
    <script type="text/javascript">

    $('#opcion').append(getBoton('no', 'btnPass'));

    $('#btnPass').click(function(event) {
      event.preventDefault();
      changeIcon(this);
    }
  );

    function changeIcon(boton) {
      elemento = '#'+boton.id;

      if($(elemento).children().hasClass('glyphicon glyphicon-ok')) {
        $(elemento).children().removeClass('glyphicon glyphicon-ok');
        $(elemento).children().addClass('glyphicon glyphicon-remove');
        $('#txtPassword').attr('type', 'password');
        $('#labelPass').text('Mostrar Password');
      } else {
        $(elemento).children().removeClass('glyphicon glyphicon-remove');
        $(elemento).children().addClass('glyphicon glyphicon-ok');
        $('#txtPassword').attr('type', 'text');
        $('#labelPass').text('Ocultar Password');
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

      var boton = document.createElement("button");
      var span = document.createElement("span");
      span.className = clase;
      boton.appendChild(span);
      boton.id = id;
      return boton;
    }

    mostrarDatosUsuario();

    </script>

  </body>
  </html>
