<?php

include_once 'Conexion.php';
include '../entidades/CortesVehiculos.php';

class CortesVehiculosDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  public function setCortesVehiculos($corte_detalle) {
    $query = "INSERT INTO cortes_vehiculos (
      id_corte, folio_vehiculo, total, recibido, diferencia) VALUES
      (:id_corte, :folio_vehiculo, :total, :recibido, :diferencia)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $resultado->bindParam(":id_corte", $corte_detalle->getIdCorte());
      $resultado->bindParam(":folio_vehiculo", $corte_detalle->getFolioVehiculo());
      $resultado->bindParam(":total", $corte_detalle->getTotal());
      $resultado->bindParam(":recibido", $corte_detalle->getRecibido());
      $resultado->bindParam(":diferencia", $corte_detalle->getDiferencia());

      //echo var_dump($corte_detalle);
      if($resultado->execute()) {
        return true;
      }

      /////////////////////////
      // Corte no registrado //
      /////////////////////////
      return false;
  }

  public static function getTotalRecibido($corte_detalle) {
    $query = "SELECT SUM(recibido) FROM cortes_vehiculos WHERE id_corte =:id_corte";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":id_corte", $corte_detalle->getIdCorte());
    $resultado->execute();
    $filas = $resultado->fetch();
    $totalRecibido = $filas['SUM(recibido)'];

    return $totalRecibido;
  }

  }
  ?>
