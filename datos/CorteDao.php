<?php

include_once 'Conexion.php';
include '../entidades/Corte.php';

class CorteDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  /**
  * Metodo que sirve para ingresar cortes
  *
  * @param  object $corte
  * @return boolean
  */
  public static function setCorte($corte) {
    $query = "INSERT INTO cortes (
      fecha, hora, usuario, atendidos, efectivo_entregado, total_ingresos, egresos_descripcion, egresos_monto,
      en_caja, diferencia, importe, adicional) VALUES
      (DATE(now()), TIME(now()), :user, :atendidos, :efectivo_entregado, :total_ingresos, :egresos_descripcion, :egresos_monto,
      :en_caja, :diferencia, :importe, :adicional)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $resultado->bindParam(":user", $corte->getUsuario());
      $resultado->bindParam(":atendidos", $corte->getAtendidos());
      $resultado->bindParam(":efectivo_entregado", $corte->getEfectivoEntregado());
      $resultado->bindParam(":total_ingresos", $corte->getTotalIngresos());
      $resultado->bindParam(":egresos_descripcion", $corte->getEgresosDescripcion());
      $resultado->bindParam(":egresos_monto", $corte->getEgresosMonto());
      $resultado->bindParam(":en_caja", $corte->getEnCaja());
      $resultado->bindParam(":diferencia", $corte->getDiferencia());
      $resultado->bindParam(":importe", $corte->getImporte());
      $resultado->bindParam(":adicional", $corte->getAdicional());

      if($resultado->execute()) {
        return true;
      }

      /////////////////////////
      // Corte no registrado //
      /////////////////////////
      return false;
    }

    /**
    * Método que sirve para obtener un corte
    * @return ArrayObject
    */
    public static function getCorte($corte) {
      $query = "SELECT id_corte, DATE_FORMAT(fecha, \"%d-%m-%Y\") as fecha, hora, usuario, efectivo_entregado,
      total_ingresos, egresos_monto, egresos_descripcion, en_caja, diferencia, atendidos
      FROM cortes
      WHERE id_corte =:id_corte";

      self::getConexion();
      $res = self::$cnx->prepare($query);
      $res->bindParam(":id_corte", $corte->getIdCorte());
      $res->execute();
      $filas = $res->fetch();

      $corte = new Corte();
      $corte->setIdCorte($filas['id_corte']);
      $corte->setFecha($filas['fecha']);
      $corte->setHora($filas['hora']);
      $corte->setUsuario($filas['usuario']);
      $corte->setEfectivoEntregado($filas['efectivo_entregado']);
      $corte->setTotalIngresos($filas['total_ingresos']);
      $corte->setEgresosMonto($filas['egresos_monto']);
      $corte->setEgresosDescripcion($filas['egresos_descripcion']);
      $corte->setEnCaja($filas['en_caja']);
      $corte->setDiferencia($filas['diferencia']);
      $corte->setAtendidos($filas['atendidos']);

      // obtenemos todos los vehiculos para un determinado ID de corte que hayan realizado pago incompleto o nulo
      $query = "SELECT * FROM cortes_vehiculos WHERE id_corte=:id AND diferencia > 0";
      self::getConexion();
      $res = self::$cnx->prepare($query);
      $res->bindParam(":id", $corte->getIdCorte());
      $res->execute();
      $datos = array();
      foreach ($res as $row) {
        $cortes_array = array(
          'FOLIO' => $row['folio_vehiculo'],
          'TOTAL' => $row['total'],
          'PAGADO' => $row['recibido'],
          'DIFERENCIA' => $row['diferencia']
        );
        $datos[] = $cortes_array;
      }

      return array(
        "estado" => "true",
        "corte" => $corte,
        "vehiculos" => $datos
      );
    }

    /**
    * funcion para obtener todos los cortes que se han realizado anteriormente
    */
    public static function getCortes($corte) {
      $query = "SELECT id_corte, DATE_FORMAT(fecha, \"%d-%m-%Y\") as fecha, hora, usuario, efectivo_entregado,
      total_ingresos, egresos_monto, egresos_descripcion, en_caja, diferencia, atendidos
      FROM cortes
      WHERE fecha=:fecha";

      self::getConexion();
      $res = self::$cnx->prepare($query);
      $res->bindParam(":fecha", $corte->getFecha());
      $res->execute();

      $datos = array();
      foreach ($res as $row) {
        $cortes_array = array(
          'No. CORTE' => $row['id_corte'],
          'FECHA' => $row['fecha'],
          'HORA' => $row['hora'],
          'USUARIO' => $row['usuario'],
          'ATENDIDOS' => $row['atendidos'],
          'INGRESOS' => $row['total_ingresos'],
          'ENTREGADO' => $row['efectivo_entregado'],
          'EGRESOS' => $row['egresos_monto'],
          'DIFERENCIA' => $row['diferencia'],
          '' => 0
        );
        $datos[] = $cortes_array;
      }
      return $datos;
    }

    /**
    * funcion para obtener el último corte ingresado
    * @return int Folio
    */
    public static function getCorteUltimo() {
      $query = "SELECT id_corte, DATE_FORMAT(fecha, \"%d-%m-%Y\") as fecha, hora, usuario,
      total_ingresos, egresos_monto, egresos_descripcion, diferencia, atendidos
      FROM cortes
      ORDER BY id_corte DESC LIMIT 1";

      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $filas = $resultado->fetch();

      $corte = new Corte();
      $corte->setIdCorte($filas['id_corte']);
      $corte->setFecha($filas['fecha']);
      $corte->setHora($filas['hora']);
      $corte->setUsuario($filas['usuario']);
      $corte->setTotalIngresos($filas['total_ingresos']);
      $corte->setEgresosMonto($filas['egresos_monto']);
      $corte->setDiferencia($filas['diferencia']);
      $corte->setAtendidos($filas['atendidos']);

      // obtenemos todos los vehiculos para un determinado ID de corte
      $query = "SELECT * FROM cortes_vehiculos WHERE id_corte=:id";
      self::getConexion();
      $res = self::$cnx->prepare($query);
      $res->bindParam(":id", $corte->getIdCorte());
      $res->execute();
      $datos = array();
      foreach ($res as $row) {
        $cortes_array = array(
          'FOLIO' => $row['folio_vehiculo'],
          'TOTAL' => $row['total'],
          'PAGADO' => $row['recibido'],
          'DIFERENCIA' => $row['diferencia']
        );
        $datos[] = $cortes_array;
      }

      return array(
        "estado" => "true",
        "corte" => $corte,
        "vehiculos" => $datos
      );
    }

    public static function setDiferenciaCalculada($corte) {
      $query = "UPDATE cortes SET diferencia=:diferencia
      WHERE id_corte =:id_corte";

      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":id_corte", $corte->getIdCorte());
      $resultado->bindParam(":diferencia", $corte->getDiferencia());

      if($resultado->execute()) {
        return true;
      }
      return false;
    }

  }
  ?>
