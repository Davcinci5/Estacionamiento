<?php

  include '../controlador/UsuarioControlador.php';
  include '../helps/helps.php';
  include '../controlador/ConfigTicketControlador.php';

  /*****************************************************************************************
   * Para usar la variable $_SESSION lo primero es llamar a la funcion que Inicia/Continua *
   * la Sesion y desde ahi ya podemos comenzar a grabar.                                   *
   * Esta variable estará disponible en cualquier otro script (pagina2.php, test.php,      *
   * cualquierpagina.php), mientras el navegador NO SEA CERRADO se podrá accesar a los     *
   * datos grabados ahi.                                                                   *
   *****************************************************************************************/
  session_start();

  //////////////////////////////////////////////
  // Retornará los headers en aplication/json //
  //////////////////////////////////////////////
  header('Content-type: aplication/json');

  $resultado = array();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['txtUsuario']) && isset($_POST['txtPassword'])) {
      $txtUsuario = validar_campo($_POST['txtUsuario']);
      $txtPassword = validar_campo($_POST['txtPassword']);

      $resultado = array("estado" => "true");

      if(UsuarioControlador::login($txtUsuario, $txtPassword)) {
          $usuario = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);

          /*******************************************************************************************************************
           * La Variable $_SESSION es una Superglobal en PHP, por tanto está disponible en cualquier parte de los scripts    *
           * sin la necesidad de usar un global de llamada. está variable es muy similar a un $_COOKIE pero la diferencia    *
           * es que se graba en el servidor y dura hasta que el navegador sea cerrado (no la pestaña de visualización, sino  *
           * cerrar el navegador completo).                                                                                  *
           *******************************************************************************************************************/
          $_SESSION["usuario"] = array(
            "id_usuarios" => $usuario->getId_usuarios(),
            "Nombre_Usuario" => $usuario->getNombre_Usuario(),
            "Admin" => $usuario->getAdmin(),
            "Activo" => $usuario->getActivo()
          );
          return print(json_encode($resultado));
      }
    }
  }

  $resultado = array("estado" => "false");
  return print(json_encode($resultado));

 ?>
