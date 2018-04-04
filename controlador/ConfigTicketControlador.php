<?php

include '../datos/ConfigTicketDao.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if(isset($_GET['funcion']) ) {
  $funcion =$_GET['funcion'];
  if($funcion === "getConfig()"){
  $config = ConfigTicketControlador::getConfig();
  $datos = array(
    'logotipo' => $config->getLogotipo(),
    'encabezado' => $config->getEncabezado(),
    'pie_pagina' => $config->getPiePagina(),
    'pie_pagina_salida' => $config->getPiePaginaSalida()
  );
  echo json_encode($datos);
  }
}
}

  class ConfigTicketControlador {

public function getConfig() {
  return ConfigTicketDao::getConfig();
}

public function actualizar($encabezado, $pie, $pieSalida) {
  $obj_config = new ConfigTicket();
  $obj_config->setEncabezado($encabezado);
  $obj_config->setPiePagina($pie);
  $obj_config->setPiePaginaSalida($pieSalida);

  return ConfigTicketDao::actualizar($obj_config);
}

public function actualizarConLogotipo($encabezado, $pie, $logotipo, $pieSalida) {
  $obj_config = new ConfigTicket();
  $obj_config->setEncabezado($encabezado);
  $obj_config->setPiePagina($pie);
  $obj_config->setPiePaginaSalida($pieSalida);
  $obj_config->setLogotipo($logotipo);

  return ConfigTicketDao::actualizar($obj_config);
}

}

 ?>
