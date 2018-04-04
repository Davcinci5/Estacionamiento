<?php
// VISTA DE FICHA DE INGRESO
?>
<div class="container text-center vacia" id="miFicha">
  <p>
    <img class="logoFichaIngreso" id="logoEstacionamiento">
  </p>

  <?php // ENCABEZADO DE PÁGINA ?>
  <h4 id="encabezado" class=" white-space-pre"></h4>

  <?php // CUERPO ?>
  <h4 class="espaciado borde-superior">ENTRADA DE VEHÍCULO</h4>
  <?php
  //<h1 id="folio" class=""></h1>
  //<h1 id="placas" class="borde-inferior"></h1>
   ?>
  <div class="row">
    <div class="col-xs-12">
      <strong>FOLIO:</strong>
      <h1 id="folio"></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <strong>PLACAS:</strong>
      <h1 id="placas"></h1>
    </div>
  </div>

      <div class="text-center borde-superior">

<?php
// no mostramos fecha y hora de entrada porque difiere varios segundos con las presentadas en el ticket imprimible
// ya que pedimos la hora a PHP al momento de generar la vista de datos preliminares para el usuario y luego volevemos
// a pedir la hora a PHP en el script que procesa el cobro, lo cual tarda aproximadamente 10 segundos.
?>
        <div class="row">
          <div class="col-xs-6 borderedRight">
            Fecha:
            <label id="fecha"></label>
          </div>
          <div class="col-xs-6">
            Hora:
            <label id="hora"></label>
          </div>
        </div>

        <div class="row borderedAround">
          <div class="col-xs-6 borderedRight">
            Cajón:
            <label id="cajon"></label>
          </div>
          <div class="col-xs-6">
            Tipo:
            <label id="tipo"></label>
          </div>
        </div>

        <div class="row borderedLeft borderedRight borderedBottom">
          <div class="col-xs-6 borderedRight">
            Modelo:
            <label id="modelo"></label>
          </div>
          <div class="col-xs-6">
            Color:
            <label id="color"></label>
          </div>
        </div>

        <div class="row borderedLeft borderedRight borderedBottom">
          <div class="col-xs-6">
            Lavado:
            <label id="lavado"></label>
          </div>
        </div>

        <div class="row borderedRight borderedLeft borderedBottom">
          <div class="col-xs-12">
            Observaciones:
            <label id="observaciones"></label>
          </div>
        </div>

      </div>

  <?php // PIE DE PÁGINA ?>
  <h4 id="pie" class=" white-space-pre borde-superior"></h4>


</div>
