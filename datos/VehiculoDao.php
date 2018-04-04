<?php

include_once 'Conexion.php';
include '../entidades/Vehiculo.php';

class VehiculoDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  /**
  * Metodo que sirve para ingresar vehiculos
  *
  * @param  object $vehículo
  * @return boolean
  */
  public static function ingresar($vehiculo) {
    $query = "INSERT INTO vehiculos (
      Placas, Modelo, Color, Tipo_auto, Cajon, Observaciones, Lavado) VALUES
      (:placas,:modelo, :color, :tipo, :cajon, :observaciones, :lavado)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $resultado->bindParam(":placas", $vehiculo->getPlacas());
      $resultado->bindParam(":modelo", $vehiculo->getModelo());
      $resultado->bindParam(":color", $vehiculo->getColor());
      $resultado->bindParam(":tipo", $vehiculo->getTipoAuto());
      $resultado->bindParam(":cajon", $vehiculo->getCajon());
      $resultado->bindParam(":observaciones", $vehiculo->getObservaciones());
      $resultado->bindParam(":lavado", $vehiculo->getLavado());

      if($resultado->execute()) {
        return true;
      }

      ////////////////////////////
      // Vehículo no registrado //
      ////////////////////////////
      return false;
    }

    /**
    * funcion para obtener el id del último registro ingresado
    * @return int Folio
    */
    public static function getUltimo() {
      $query = "SELECT Folio FROM vehiculos ORDER BY Folio DESC LIMIT 1";

      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $filas = $resultado->fetch();
      $ultimo = $filas['Folio'];

      return $ultimo;
    }

    /**
    * funcion para obtener la hora de un registro
    * @param int folio
    * @return string
    */
    public static function getHoraEntrada($folio) {
      $query = "SELECT TIME(entrada) FROM vehiculos WHERE Folio = :folio";

      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $folio);
      $resultado->execute();
      $filas = $resultado->fetch();
      $hora = $filas['TIME(entrada)'];

      return $hora;
    }

    /**
    *
    * funcion para obtener la fecha de un registro
    * @param int folio
    * @return string
    */
    public static function getFechaEntrada($folio) {
      $query = "SELECT DATE_FORMAT(DATE(entrada), \"%d-%m-%Y\") as fecha_entrada FROM vehiculos WHERE Folio = :folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $folio);
      $resultado->execute();
      $filas = $resultado->fetch();
      $fecha = $filas['fecha_entrada'];
      return $fecha;
    }

    /**
    * Método que sirve para insertar la hora de salida de un vehiculo
    * @param  object $vehiculo
    * @return boolean
    */
    public static function terminarTiempo($vehiculo) {
      // comprobamos si hay vehiculos
      $query = "SELECT count(*) as total from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $total = $filas['total'];

      // comprobamos si el vehiculo buscado aun no tiene seteado el tiempo
      $query = "SELECT Tiempo from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $tiempo = $filas['Tiempo'];

      // verificamos el campo total para saber si el vehiculo ya ha sido cobrado
      $query = "SELECT pagado from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $pagado = $filas['pagado'];

      if($pagado != 0) {
        return false;
      }

      $query = "UPDATE vehiculos SET hora_salida=TIME(now()), fecha_salida=DATE(now()) WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();

      return true;
    }

    /**
    * funcion para obtener la hora de salida de un registro
    * @param object vehiculo
    * @return string
    */
    public static function getHoraSalida($vehiculo) {
      $query = "SELECT hora_salida FROM vehiculos WHERE Folio = :folio";

      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $hora = $filas['hora_salida'];

      return $hora;
    }

    /**
    * funcion para obtener la fecha de salida de un registro
    * @param object vehículo
    * @return string
    */
    public static function getFechaSalida($vehiculo) {
      $query = "SELECT DATE_FORMAT(DATE(fecha_salida), \"%d-%m-%Y\") as fecha_salida FROM vehiculos WHERE Folio = :folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $fecha = $filas['fecha_salida'];
      return $fecha;
    }

    /**
    * funcion para obtener las placas de un registro
    * @param int folio
    * @return string
    */
    public static function getPlacas($vehiculo) {
      $query = "SELECT Placas FROM vehiculos WHERE Folio = :folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $placas = $filas['Placas'];
      return $placas;
    }

    /**
    * funcion para obtener el tipo de un registro
    * @param object vehículo
    * @return string
    */
    public static function getTipo($vehiculo) {
      $query = "SELECT Tipo_auto FROM vehiculos WHERE Folio = :folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $tipo_auto = $filas['Tipo_auto'];
      return $tipo_auto;
    }

    /**
    * funcion para saber si un vehiculo solicitó el servicio de lavado
    * @param object vehículo
    * @return string
    */
    public static function getLavado($vehiculo) {
      $query = "SELECT Lavado FROM vehiculos WHERE Folio = :folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $lavado = $filas['Lavado'];
      return $lavado;
    }

    public static function getModelo($vehiculo) {
      $query = "SELECT Modelo FROM vehiculos WHERE Folio = :folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $modelo = $filas['Modelo'];
      return $modelo;
    }

    public static function getColor($vehiculo) {
      $query = "SELECT Color FROM vehiculos WHERE Folio = :folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $color = $filas['Color'];
      return $color;
    }

    public static function getCajon($vehiculo) {
      $query = "SELECT Cajon FROM vehiculos WHERE Folio = :folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $cajon = $filas['Cajon'];
      return $cajon;
    }

    public static function getObservaciones($vehiculo) {
      $query = "SELECT Observaciones FROM vehiculos WHERE Folio = :folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $observaciones = $filas['Observaciones'];
      return $observaciones;
    }

    /**
    * Método que sirve para insertar la descripccion de adicional de un vehiculo
    * @param  object $vehiculo
    * @return boolean
    */
    public static function setAdicionalDescripcion($vehiculo) {
      $query = "SELECT count(*) as total from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $total = $filas['total'];

      if($total == 0) {
        return false;
      }

      $query = "UPDATE vehiculos SET Adicional=:adicional WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->bindParam(":adicional", $vehiculo->getAdicional());
      $resultado->execute();

      return true;
    }

    /**
    * Método que sirve para insertar el monto de adicional de un vehiculo
    * @param  object $vehiculo
    * @return boolean
    */
    public static function setAdicionalMonto($vehiculo) {
      $query = "SELECT count(*) as total from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $total = $filas['total'];

      if($total == 0) {
        return false;
      }

      $query = "UPDATE vehiculos SET Monto_adicional=:adicional WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->bindParam(":adicional", $vehiculo->getMontoAdicional());
      $resultado->execute();

      return true;
    }

    public static function setTotal($vehiculo) {
      $query = "SELECT count(*) as total from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $total = $filas['total'];

      if($total == 0) {
        return false;
      }

      $query = "UPDATE vehiculos SET Total=:total WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->bindParam(":total", $vehiculo->getTotal());
      $resultado->execute();

      return true;
    }

    public static function setTiempo($vehiculo) {
      $query = "SELECT count(*) as total from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $total = $filas['total'];

      if($total == 0) {
        return false;
      }

      $query = "UPDATE vehiculos SET Tiempo=:tiempo WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->bindParam(":tiempo", $vehiculo->getTiempo());
      $resultado->execute();

      return true;
    }

    /**
    * Método que sirve para listar los vehiculos aparcados actualmente
    * @return ArrayObject
    */
    public static function getVehiculos() {
      $query = "SELECT Folio, Tipo_auto, Placas,
      DATE_FORMAT( DATE(entrada), \"%d-%m-%Y\" ) as fecha_entrada, TIME(entrada) as hora_entrada FROM vehiculos
      WHERE pagado = 0";

      self::getConexion();
      $res = self::$cnx->prepare($query);
      $res->execute();
      $datos = array();

      foreach ($res as $row) {
        $vehiculos_array = array(
          'FOLIO' => $row['Folio'],
          'TIPO' => $row['Tipo_auto'],
          'PLACAS' => $row['Placas'],
          'FECHA DE ENTRADA' => $row['fecha_entrada'],
          'HORA DE ENTRADA' => $row['hora_entrada']
        );
        $datos[] = $vehiculos_array;
      }
      echo json_encode($datos, JSON_FORCE_OBJECT);
    }

    /**
    * funcion para obtener el ingreso total de todos los vehiculos que aun no han
    * sido incluidos en algun corte previamente
    * @return int total
    */
    public static function getTotalCorte($efectivo_entregado, $egresos_monto, $egresos_descripcion) {
      $query = "SELECT SUM(Monto_adicional) FROM vehiculos WHERE corte = 0 AND pagado = 1";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $filas = $resultado->fetch();
      $adicional = $filas['SUM(Monto_adicional)'];
      if($adicional == null) {
        $adicional = 0;
      }

      $query = "SELECT SUM(Total) FROM vehiculos WHERE corte = 0 AND pagado = 1";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $filas = $resultado->fetch();
      $total_ingresos = $filas['SUM(Total)'];

      $query = "SELECT COUNT(*) FROM vehiculos WHERE corte = 0 AND pagado = 1";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $filas = $resultado->fetch();
      $atendidos = $filas['COUNT(*)'];

      // enviamos todos los vehiculos que pasaron a corte hacia la tabla
      // cortes_vehiculos para asociarlos con un numero de corte y recuperarlos
      // posteriormente
        $vehiculos_todos = array();
        $vehiculos_con_diferencia = array();
        $query = "SELECT Folio, Total, recibido, diferencia FROM vehiculos WHERE corte = 0 AND pagado = 1";
        self::getConexion();
        $res = self::$cnx->prepare($query);
        $res->execute();
        foreach ($res as $row) {
          if($row['diferencia'] > 0) {
            $con_diferencia = array(
              'FOLIO' => $row['Folio'],
              'TOTAL' => $row['Total'],
              'PAGADO' => $row['recibido'],
              'DIFERENCIA' => $row['diferencia']
            );
            $vehiculos_con_diferencia[] = $con_diferencia;
          }

          $todos = array(
            'FOLIO' => $row['Folio'],
            'TOTAL' => $row['Total'],
            'PAGADO' => $row['recibido'],
            'DIFERENCIA' => $row['diferencia']
          );
          $vehiculos_todos[] = $todos;
        }

      // Cambiamos el valor del campo corte para todos los vehiculos
      // que fueron incluidos en el corte
      $query = "UPDATE vehiculos SET corte = 1 WHERE corte = 0 AND pagado = 1";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->execute();

      $corte = new Corte();
      $corte->setEfectivoEntregado($efectivo_entregado);
      $corte->setTotalIngresos($total_ingresos);
      $corte->setEgresosDescripcion($egresos_descripcion);
      $corte->setEgresosMonto($egresos_monto);
      $corte->setEnCaja($total_ingresos - $egresos_monto);
      $corte->setDiferencia($efectivo_entregado - $corte->getEnCaja());
      $corte->setAtendidos($atendidos);
      $corte->setImporte($total_ingresos - $adicional);
      $corte->setAdicional($adicional);

      return array(
        "estado" => "true",
        "corte" => $corte,
        "vehiculos_todos" => $vehiculos_todos,
        "vehiculos_con_diferencia" => $vehiculos_con_diferencia
      );
    }

    public static function setHoraSalida($vehiculo) {
      $query = "SELECT count(*) as total from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $total = $filas['total'];

      if($total == 0) {
        return false;
      }

      $query = "UPDATE vehiculos SET hora_salida=:hora WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->bindParam(":hora", $vehiculo->getHoraSalida());
      $resultado->execute();

      return true;
    }

    public static function setFechaSalida($vehiculo) {
      $query = "SELECT count(*) as total from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $total = $filas['total'];

      if($total == 0) {
        return false;
      }

      $query = "UPDATE vehiculos SET fecha_salida=:fecha WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->bindParam(":fecha", $vehiculo->getFechaSalida());
      $resultado->execute();

      return true;
    }

    public static function setPagado($vehiculo) {
      $query = "SELECT count(*) as total from vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $total = $filas['total'];

      if($total == 0) {
        return false;
      }

      $query = "UPDATE vehiculos SET pagado = 1 WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();

      return true;
    }

    public static function existe($vehiculo) {
      $query = "SELECT COUNT(*) FROM vehiculos WHERE Folio=:folio";
      self::getConexion();
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $total = $filas['COUNT(*)'];

      if($total == 0) { // No existe ese folio en la bd
        return false;
      }

      return true;
    }

    public static function getPagado($vehiculo) {
      $query = "SELECT pagado FROM vehiculos WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->execute();
      $filas = $resultado->fetch();
      $estado = $filas['pagado'];
      $estado == 1 ? $estado = true : $estado = false;
      return $estado;
    }

    public static function setRecibido($vehiculo) {
      $query = "UPDATE vehiculos SET recibido=:recibido WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->bindParam(":recibido", $vehiculo->getRecibido());
      $resultado->execute();
      return true;
    }

    public static function setDiferencia($vehiculo) {
      $query = "UPDATE vehiculos SET diferencia=:diferencia WHERE Folio=:folio";
      $resultado = self::$cnx->prepare($query);
      $resultado->bindParam(":folio", $vehiculo->getFolio());
      $resultado->bindParam(":diferencia", $vehiculo->getDiferencia());
      $resultado->execute();
      return true;
    }

  }
  ?>
