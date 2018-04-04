<nav class="navbar navbar-inverse">

  <div class="container-fluid">

      <?php if(isset($_SESSION["usuario"])) { ?>
    <div class="navbar-header">
      <a class="navbar-brand" href="vehiculos.php">Inicio</a>
    </div>
  <?php } ?>

    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">
        <?php if(!isset($_SESSION["usuario"])) { ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="registro.php">Registro</a></li>
        <?php } else { ?>

          <?php if($_SESSION["usuario"]["Admin"] == 1) { ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilerías<span class="caret"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="actuales.php">Reporte de vehículos</a></li>
                  <li><a href="corte.php">Corte</a></li>
                <?php if($_SESSION["usuario"]["Admin"] == 1) { ?>
                  <li><a href="verCortes.php">Ver Cortes</a></li>
                <?php } ?>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuración <span class="caret"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="miCuenta.php">Mi cuenta</a></li>
                    <?php if($_SESSION["usuario"]["Admin"] == 1) { ?>
                  <li><a href="configurarPrecios.php">Precios</a></li>
                  <li><a href="configTicket.php">Ticket</a></li>
                  <li><a href="usuarios.php">Usuarios</a></li>
                <?php } ?>
                </ul>
            </li>
          <?php } else { ?>
            <li><a href="actuales.php">Reporte de vehículos</a></li>
            <li><a href="corte.php">Corte</a></li>
          <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrar-sesion.php">Salir</a></li>
      </ul>
    <?php  } ?>
    </div>
  </div>
</nav>
