<?php

  class Conexion {

    /**
    * Conexión a la base de datos
    *
    * @return PDO
    */

    public static function conectar(){
      try {
        $cn = new PDO("mysql:host=localhost;dbname=estacionamiento", "root", "");
        return $cn;
      } catch (PDOException $ex) {
        die($ex->getMessage());
      }
    }
  }

  Conexion::conectar();
 ?>
