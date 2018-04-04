<?php

include_once 'Conexion.php';
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  /**
  * Metodo que sirve para validar el login
  *
  * @param  object $usuario
  * @return boolean
  */
  public static function login ($usuario) {
    $query = "SELECT * FROM usuarios WHERE
    Nombre_Usuario = :nom AND Password = :pass";

    self::getConexion();

    $resultado = self::$cnx->prepare($query);

    $resultado->bindParam(":nom", $usuario->getNombre_usuario());
    $resultado->bindParam(":pass", $usuario->getPassword());

    $resultado->execute();

    if($resultado->rowCount() > 0) {
      $filas = $resultado->fetch();
      if($filas["Nombre_Usuario"] == $usuario->getNombre_Usuario() && $filas["Password"] == $usuario->getPassword()) {
        return true;
      }
    }

    return false;
  }

  /**
  * Método que sirve para obtener un usuario
  * @param  object $usuario
  * @return object
  */
  public static function getUsuario($usuario) {
    $query = "SELECT id_usuarios, Nombre_Usuario, Admin, Activo FROM usuarios WHERE
    Nombre_Usuario = :nom AND Password = :pass";

    self::getConexion();

    $resultado = self::$cnx->prepare($query);

    $resultado->bindParam(":nom", $usuario->getNombre_usuario());
    $resultado->bindParam(":pass", $usuario->getPassword());

    $resultado->execute();

    $filas = $resultado->fetch();

    $usuario = new Usuario();
    $usuario->setId_usuarios($filas['id_usuarios']);
    $usuario->setNombre_Usuario($filas['Nombre_Usuario']);
    $usuario->setAdmin($filas['Admin']);
    $usuario->setActivo($filas['Activo']);

    return $usuario;
  }

  /**
  * Metodo que sirve para registrar usuarios
  *
  * @param  object $usuario
  * @return boolean
  */
  public static function registrar($usuario) {
    $query = "INSERT INTO usuarios (
      Nombre_Usuario, Password) VALUES
      (:nom,:pass)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $resultado->bindParam(":nom", $usuario->getNombre_usuario());
      $resultado->bindParam(":pass", $usuario->getPassword());

      if($resultado->execute()) {
        return true;
      }

      ///////////////////////////
      // Usuario no registrado //
      ///////////////////////////
      return false;
    }

    /**
    * Método que sirve para listar los usuarios
    * @return ArrayObject
    */
    public static function getUsuarios() {
      $query = "SELECT id_usuarios, Nombre_Usuario, Admin, Activo FROM usuarios";
      $mensaje = "";

      self::getConexion();
      $res = self::$cnx->prepare($query);
      $res->execute();
      $datos = array();

        foreach ($res as $row) {
          $producto_array = array(
          'ID DE USUARIO' => $row['id_usuarios'],
          'NOMBRE DE USUARIO' => $row['Nombre_Usuario'],
          'ADMIN' => $row['Admin'],
          'ACTIVO' => $row['Activo']
        );
        $datos[] = $producto_array;
        }
        echo json_encode($datos, JSON_FORCE_OBJECT);
      }

      /**
      * Método que sirve para actualizar el permiso de acceso de un usuario
      * @param  object $usuario
      * @return boolean
      */
      public static function setAdmin($usuario) {
        $query = "UPDATE usuarios SET admin = :admin WHERE id_usuarios = :id";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id", $usuario->getId_usuarios());
        $resultado->bindParam(":admin", $usuario->getAdmin());

        if($resultado->execute()) {
          return true;
        }

        ///////////////////////////
        // Usuario no registrado //
        ///////////////////////////
        return false;
      }

      /**
      * Método que sirve para actualizar el status de un usuario
      * @param  object $usuario
      * @return boolean
      */
      public static function setActivo($usuario) {
        $query = "UPDATE usuarios SET activo = :activo WHERE id_usuarios = :id";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id", $usuario->getId_usuarios());
        $resultado->bindParam(":activo", $usuario->getActivo());

        if($resultado->execute()) {
          return true;
        }

        ///////////////////////////
        // Usuario no registrado //
        ///////////////////////////
        return false;
      }

      public static function setUsuario($usuario) {
        $query = "UPDATE usuarios SET Nombre_Usuario =:usuario WHERE id_usuarios =:id";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id", $usuario->getId_usuarios());
        $resultado->bindParam(":usuario", $usuario->getNombre_Usuario());

        if($resultado->execute()) {
          return true;
        }

        ///////////////////////////
        // Usuario no registrado //
        ///////////////////////////
        return false;
      }

      public static function setPassword($usuario) {
        $query = "UPDATE usuarios SET Password=:pass WHERE id_usuarios=:id";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id", $usuario->getId_usuarios());
        $resultado->bindParam(":pass", $usuario->getPassword());

        if($resultado->execute()) {
          return true;
        }

        ///////////////////////////
        // Usuario no registrado //
        ///////////////////////////
        return false;
      }

      public static function getUsuarioNombre($usuario) {
        $query = "SELECT Nombre_Usuario FROM usuarios WHERE id_usuarios=:id";

        self::getConexion();
        $res = self::$cnx->prepare($query);
        $res->bindParam(":id", $usuario->getId_usuarios());
        $res->execute();
        $filas = $res->fetch();
        $user = $filas['Nombre_Usuario'];

        return $user;
        }

        public static function getPassword($usuario) {
          $query = "SELECT Password FROM usuarios WHERE id_usuarios=:id";

          self::getConexion();
          $res = self::$cnx->prepare($query);
          $res->bindParam(":id", $usuario->getId_usuarios());
          $res->execute();
          $filas = $res->fetch();
          $pass = $filas['Password'];

          return $pass;
          }
    }
  ?>
