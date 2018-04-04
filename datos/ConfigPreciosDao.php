<?php

include_once 'Conexion.php';
include '../entidades/ConfigPrecios.php';

class ConfigPreciosDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  public static function actualizar($config, $concepto, $precio) {
    $query = "UPDATE config_precios SET " . $concepto . "=:precio WHERE tipo=:tipo";

    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":precio", $precio);
    $resultado->bindParam(":tipo", $config->getTipo());

    if($resultado->execute()) {
      return true;
    }

    return false;
  }

  /**
  * Método que sirve para obtener los precios para un tipo de automóvil
  * @param  object $configTicket
  * @return object
  */
  public static function getConfig($config) {
    $query = "SELECT * FROM config_precios WHERE tipo=:tipo";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":tipo", $config->getTipo());
    $resultado->execute();
    $filas = $resultado->fetch();

    $config = new ConfigPrecios();
    $config->setTipo($filas['tipo']);
    $config->setFraccion($filas['fraccion']);
    $config->setHora($filas['hora']);
    $config->setDia($filas['dia']);
    $config->setSemana($filas['semana']);
    $config->setMes($filas['mes']);
    $config->setQuincena($filas['quincena']);
    $config->setLavado($filas['lavado']);

    return $config;
  }

  /**
  * Método que sirve para listar los precios actuales
  * @return ArrayObject
  */
  public static function getPrecios() {
    $query = "SELECT * FROM config_precios";

    self::getConexion();
    $res = self::$cnx->prepare($query);
    $res->execute();
    $datos = array();

      foreach ($res as $row) {
        $precios_array = array(
          'TIPO' => $row['tipo'],
          'FRACCIÓN' => $row['fraccion'],
          'HORA' => $row['hora'],
          'DÍA' => $row['dia'],
          'SEMANA' => $row['semana'],
          'QUINCENA' => $row['quincena'],
          'MES' => $row['mes'],
          'LAVADO' => $row['lavado']
      );
      $datos[] = $precios_array;
      }
      echo json_encode($datos, JSON_FORCE_OBJECT);
    }

}
?>
