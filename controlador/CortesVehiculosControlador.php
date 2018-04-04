<?php

  include '../datos/CortesVehiculosDao.php';

  class CortesVehiculosControlador {

    public function setCortesVehiculos($id_corte, $folio_vehiculo, $total, $recibido, $diferencia) {
      $obj_corte_detalle = new CortesVehiculos();
      $obj_corte_detalle->setIdCorte($id_corte);
      $obj_corte_detalle->setFolioVehiculo($folio_vehiculo);
      $obj_corte_detalle->setTotal($total);
      $obj_corte_detalle->setRecibido($recibido);
      $obj_corte_detalle->setDiferencia($diferencia);
      return CortesVehiculosDao::setCortesVehiculos($obj_corte_detalle);
    }

    public function getTotalRecibido($id_corte){
      $obj_corte_detalle = new CortesVehiculos();
      $obj_corte_detalle->setIdCorte($id_corte);
      return CortesVehiculosDao::getTotalRecibido($obj_corte_detalle);
    }
  }

  ?>
