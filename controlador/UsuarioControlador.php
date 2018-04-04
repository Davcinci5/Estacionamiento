<?php

  include '../datos/UsuarioDao.php';

  class UsuarioControlador {

      public static function login($usuario, $password) {
        $obj_usuario = new Usuario();
        $obj_usuario->setNombre_usuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::login($obj_usuario);
      }

      public function getUsuario($usuario, $password) {
        $obj_usuario = new Usuario();
        $obj_usuario->setNombre_usuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::getUsuario($obj_usuario);
      }

      public function registrar($usuario, $password) {
        $obj_usuario = new Usuario();
        $obj_usuario->setNombre_usuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::registrar($obj_usuario);
      }

      public function getUsuarios(){
        return UsuarioDao::getUsuarios();
      }

      public function setAdmin($id_usuario, $admin) {
        $obj_usuario = new Usuario();
        $obj_usuario->setId_usuarios($id_usuario);
        $obj_usuario->setAdmin($admin);

        return UsuarioDao::setAdmin($obj_usuario);
      }

      public function setActivo($id_usuario, $activo) {
        $obj_usuario = new Usuario();
        $obj_usuario->setId_usuarios($id_usuario);
        $obj_usuario->setActivo($activo);

        return UsuarioDao::setActivo($obj_usuario);
      }

      public function setUsuario($idUsuario, $usuario) {
        $obj_usuario = new Usuario();
        $obj_usuario->setId_usuarios($idUsuario);
        $obj_usuario->setNombre_Usuario($usuario);

        return UsuarioDao::setUsuario($obj_usuario);
      }

      public function setPassword($idUsuario, $password) {
        $obj_usuario = new Usuario();
        $obj_usuario->setId_usuarios($idUsuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::setPassword($obj_usuario);
      }

      public function getUsuarioNombre($idUsuario) {
        $obj_usuario = new Usuario();
        $obj_usuario->setId_usuarios($idUsuario);

        return UsuarioDao::getUsuarioNombre($obj_usuario);
      }

      public function getPassword($idUsuario) {
        $obj_usuario = new Usuario();
        $obj_usuario->setId_usuarios($idUsuario);

        return UsuarioDao::getPassword($obj_usuario);
      }

  }

 ?>
