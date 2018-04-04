<?php

  include '../controlador/UsuarioControlador.php';
  include '../helps/helps.php';

  session_start();

  header('Content-type: aplication/json');

  $resultado = array();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['txtUsuario']) && isset($_POST['txtPassword'])) {
      $txtUsuario = validar_campo($_POST['txtUsuario']);
      $txtPassword = validar_campo($_POST['txtPassword']);
      $idUsuario = $_SESSION["usuario"]['id_usuarios'];
      //$user = $_SESSION["usuario"]['Nombre_Usuario'];
      //$pass = $_SESSION["usuario"]['password'];

      $resultado = array("estado" => "true");

      if(
        UsuarioControlador::setUsuario($idUsuario, $txtUsuario) &&
        UsuarioControlador::setPassword($idUsuario, $txtPassword)
      ) {
        //$user = UsuarioControlador::getUsuarioNombre($idUsuario, $txtUsuario);
        //$pass = UsuarioControlador::getPassword($idUsuario, $txtUsuario);
        //$usuario = UsuarioControlador::getUsuario($user, $pass);
        $resultado = array(
          "estado" => "true",
          "usuario" => $txtUsuario,
          "password" => $txtPassword
          );
          return print(json_encode($resultado));
      }
    }
  } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['funcion']) ) {
    $funcion =$_GET['funcion'];
    if($funcion === "getUser()"){
    $idUser = $_SESSION["usuario"]['id_usuarios'];
    $user = UsuarioControlador::getUsuarioNombre($idUser);
    $pass = UsuarioControlador::getPassword($idUser);
    $datos = array(
      'usuario' => $user,
      'password' => $pass
    );
    echo json_encode($datos);
    }
  }
} else {
  $resultado = array("estado" => "false");
  return print(json_encode($resultado));
}



 ?>
