<?php

  include '../datos/VehiculoDao.php';


  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['funcion']) ) {
    $funcion = $_GET['funcion'];
    if($funcion === "getUltimo()"){
    $folio = VehiculoControlador::getUltimo();
    echo $folio;
    }
  }
}

  class VehiculoControlador {

      public function ingresar($placas, $modelo, $color, $cajon, $observaciones, $lavado, $tipo) {
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setPlacas($placas);
        $obj_vehiculo->setModelo($modelo);
        $obj_vehiculo->setColor($color);
        $obj_vehiculo->setTipoAuto($tipo);
        $obj_vehiculo->setCajon($cajon);
        $obj_vehiculo->setObservaciones($observaciones);
        $obj_vehiculo->setLavado($lavado);

        return VehiculoDao::ingresar($obj_vehiculo);
      }

      public function getUltimo() {
        return VehiculoDao::getUltimo();
      }

      public function getHoraEntrada($folio){
        return VehiculoDao::getHoraEntrada($folio);
      }

      public function getFechaEntrada($folio){
        return VehiculoDao::getFechaEntrada($folio);
      }

      public function terminarTiempo($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::terminarTiempo($obj_vehiculo);
      }

      public function getHoraSalida($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getHoraSalida($obj_vehiculo);
      }

      public function getFechaSalida($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getFechaSalida($obj_vehiculo);
      }

      public function getPlacas($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getPlacas($obj_vehiculo);
      }

      public function getTipo($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getTipo($obj_vehiculo);
      }

      public function getLavado($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getLavado($obj_vehiculo);
      }

      public function getModelo($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getModelo($obj_vehiculo);
      }

      public function getColor($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getColor($obj_vehiculo);
      }

      public function getCajon($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getCajon($obj_vehiculo);
      }

      public function getObservaciones($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getObservaciones($obj_vehiculo);
      }

      public function setAdicionalDescripcion($folio, $adicional) {
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);
        $obj_vehiculo->setAdicional($adicional);

        return VehiculoDao::setAdicionalDescripcion($obj_vehiculo);

      }

      public function setAdicionalMonto($folio, $adicional) {
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);
        $obj_vehiculo->setMontoAdicional($adicional);

        return VehiculoDao::setAdicionalMonto($obj_vehiculo);

      }

      public function setTotal($folio, $total){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);
        $obj_vehiculo->setTotal($total);

        return VehiculoDao::setTotal($obj_vehiculo);
      }

      public function setTiempo($folio, $tiempo){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);
        $obj_vehiculo->setTiempo($tiempo);

        return VehiculoDao::setTiempo($obj_vehiculo);
      }

      public function getVehiculos(){
        return VehiculoDao::getVehiculos();
      }

      public function getTotalCorte($efectivo_entregado, $egresos_monto, $egresos_descripcion){
        return VehiculoDao::getTotalCorte($efectivo_entregado, $egresos_monto, $egresos_descripcion);
      }

      public function getAtendidos(){
        return VehiculoDao::getAtendidos();
      }

      public function setHoraSalida($folio, $hora){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);
        $obj_vehiculo->setHoraSalida($hora);

        return VehiculoDao::setHoraSalida($obj_vehiculo);
      }

      public function setFechaSalida($folio, $fecha){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);
        $obj_vehiculo->setFechaSalida($fecha);

        return VehiculoDao::setFechaSalida($obj_vehiculo);
      }

      public function setPagado($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::setPagado($obj_vehiculo);
      }

      public function getPagado($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::getPagado($obj_vehiculo);
      }

      public function existe($folio){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);

        return VehiculoDao::existe($obj_vehiculo);
      }

      public function setRecibido($folio, $pago){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);
        $obj_vehiculo->setRecibido($pago);

        return VehiculoDao::setRecibido($obj_vehiculo);
      }

      public function setDiferencia($folio, $diferencia){
        $obj_vehiculo = new Vehiculo();
        $obj_vehiculo->setFolio($folio);
        $obj_vehiculo->setDiferencia($diferencia);

        return VehiculoDao::setDiferencia($obj_vehiculo);
      }

  }

 ?>
