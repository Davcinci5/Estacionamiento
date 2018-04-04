<?php
include '../controlador/UsuarioControlador.php';

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "GET") {
  UsuarioControlador::getUsuarios();
}

?>
