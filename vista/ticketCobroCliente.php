<?php
// VISTA DE TICKET DE COBRO PARA EL CLIENTE
?>
<div class="container text-center vacia" id="miTicket">
  <p>
    <img class="logoFichaIngreso" id="logoEstacionamientoCliente">
  </p>

  <?php // ENCABEZADO DE PÁGINA ?>
  <h4 id="encabezadoCliente" class=" white-space-pre"></h4>

  <?php // CUERPO ?>
  <h4 class="espaciado borde-superior">SALIDA DE VEHÍCULO</h4>
  <?php
  //<h1 id="folio" class=""></h1>
  //<h1 id="placas" class="borde-inferior"></h1>
   ?>
  <div class="row">
    <div class="col-xs-12">
      <strong>FOLIO:</strong>
      <h1 id="folioCliente"></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <strong>PLACAS:</strong>
      <h1 id="placasCliente"></h1>
    </div>
  </div>

      <div class="borde-superior">

        <div class="row borderedAround">
          <div class="col-xs-6 borderedRight">
            <div class="col-xs-6 text-left">
              <label>Cajón:</label>
            </div>
            <div class="col-xs-6">
              <label id="cajonCliente"></label>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <label>Tipo:</label>
            </div>
            <div class="col-xs-6">
              <label id="tipoCliente"></label>
            </div>
          </div>
        </div>

        <div class="row borderedLeft borderedRight borderedBottom">
          <div class="col-xs-6 borderedRight">
            <div class="col-xs-6 text-left">
              <label>Modelo:</label>
            </div>
            <div class="col-xs-6">
              <label id="modeloCliente"></label>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <label>Color:</label>
            </div>
            <div class="col-xs-6">
              <label id="colorCliente"></label>
            </div>
          </div>
        </div>

        <div class="row borderedLeft borderedRight borderedBottom">
          <div class="col-xs-6 borderedRight">
            <div class="col-xs-4 text-left">
              <label>Entrada:</label>
            </div>
            <div class="col-xs-8 text-right">
              <label id="fechaCliente"></label>
            </div>
          </div>
          <div class="col-xs-6 borderedRight">
            <div class="col-xs-4 text-left">
              <label>Hora:</label>
            </div>
            <div class="col-xs-8 text-right">
              <label id="horaCliente"></label>
            </div>
          </div>
        </div>

        <div class="row borderedRight borderedLeft borderedBottom">
          <div class="col-xs-6 borderedRight">
            <div class="col-xs-4 text-left">
              <label>Salida:</label>
            </div>
            <div class="col-xs-8 text-right">
              <label id="fechaSalidaCliente"></label>
            </div>
          </div>
          <div class="col-xs-6 borderedRight">
            <div class="col-xs-4 text-left">
              <label>Hora:</label>
            </div>
            <div class="col-xs-8 text-right">
              <label id="horaSalidaCliente"></label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <label>Lavado:</label>
            </div>
            <div class="col-xs-6">
              <label id="lavadoCliente"></label>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <label>Precio:</label>
            </div>
            <div class="col-xs-6 text-right">
              <label id="lavadoPrecioCliente"></label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <label>Tiempo:</label>
            </div>
            <div class="col-xs-6">
              <label id="tiempoCliente"></label>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <label>Importe:</label>
            </div>
            <div class="col-xs-6 text-right">
              <label id="importeCliente"></label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <label>Adicional:</label>
            </div>
            <div class="col-xs-6 text-right">
              <label id="adicionalDescripcionCliente"></label>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <label>Monto:</label>
            </div>
            <div class="col-xs-6 text-right">
              <label id="adicionalMontoCliente"></label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <label></label>
          </div>
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <h4>Total:</h4>
            </div>
            <div class="col-xs-6 text-right">
              <h4 id="totalCliente"></h4>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <label></label>
          </div>
          <div class="col-xs-6">
            <div class="col-xs-4 text-left">
              <h4>Pago:</h4>
            </div>
            <div class="col-xs-8 text-right">
              <h4 id="pagoCliente"></h4>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <label></label>
          </div>
          <div class="col-xs-6">
            <div class="col-xs-6 text-left">
              <h4>Cambio:</h4>
            </div>
            <div class="col-xs-6 text-right">
              <h4 id="cambioCliente"></h4>
            </div>
          </div>
        </div>

      </div>

  <?php // PIE DE PÁGINA ?>
  <h4 id="pieSalidaCliente" class=" white-space-pre borde-superior"></h4>


</div>
