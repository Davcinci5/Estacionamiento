<?php

include_once 'Conexion.php';
include '../entidades/ConfigTicket.php';

class ConfigTicketDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  /**
  * Método que sirve para obtener los datos de una configuración para generar la ficha de ingreso
  * @param  object $configTicket
  * @return object
  */
  public static function getConfig() {
    $query = "SELECT * FROM config_ticket WHERE id_config = 1";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $resultado->execute();
    $filas = $resultado->fetch();

    $config = new ConfigTicket();
    $config->setIdConfig($filas['id_config']);
    $config->setPiePagina($filas['pie_pagina']);
    $config->setPiePaginaSalida($filas['pie_pagina_salida']);
    $config->setLogotipo($filas['logotipo']);
    $config->setEncabezado($filas['encabezado']);

    return $config;
  }

  public static function actualizar($config) {
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    // primero leemos el logo actual almacenado para utilizarlo en caso de que no se reciba un nuevo logo //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    $query = "SELECT logotipo FROM config_ticket WHERE id_config = 1";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $resultado->execute();
    $filas = $resultado->fetch();
    $logoAlmacenado = $filas['logotipo'] ;



    $query = "UPDATE config_ticket SET encabezado=:encabezado, pie_pagina=:pie, logotipo=:logo, pie_pagina_salida=:pieSalida WHERE id_config=1";

    self::getConexion();

    $resultado = self::$cnx->prepare($query);

    $resultado->bindParam(":pie", $config->getPiePagina());
    $resultado->bindParam(":pieSalida", $config->getPiePaginaSalida());
    $resultado->bindParam(":encabezado", $config->getEncabezado());

    if($config->getLogotipo() != '') {
      $resultado->bindParam(":logo", $config->getLogotipo());
    } else {
      $resultado->bindParam(":logo", $logoAlmacenado);
    }

    if($resultado->execute()) {
      return true;
    }

    return false;
  }

}
?>
