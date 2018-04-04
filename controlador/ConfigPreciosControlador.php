<?php

include '../datos/ConfigPreciosDao.php';

class ConfigPreciosControlador {

  public function actualizar($tipo, $concepto, $precio) {
    $obj_config = new ConfigPrecios();
    $obj_config->setTipo($tipo);

    return ConfigPreciosDao::actualizar($obj_config, $concepto, $precio);
  }

  public function getConfig($tipo) {
    $obj_config = new ConfigPrecios();
    $obj_config->setTipo($tipo);
    return ConfigPreciosDao::getConfig($obj_config);
  }

  public function getPrecios() {
    return ConfigPreciosDao::getPrecios();
  }

}

?>
