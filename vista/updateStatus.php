<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';
//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if( isset($_POST['id_usuario']) && isset($_POST['activo']) ) {

    $id_usuario = validar_campo($_POST['id_usuario']);
    $activo = validar_campo($_POST['activo']);

  if(UsuarioControlador::setActivo($id_usuario, $activo)) {
    $resultado = array("estado" => "true");
    return print(json_encode($resultado));
  }
}
}

$resultado = array("estado" => "false");
return print(json_encode($resultado));

?>
