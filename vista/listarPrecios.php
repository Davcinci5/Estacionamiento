<?php
include '../controlador/ConfigPreciosControlador.php';

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "GET") {
  ConfigPreciosControlador::getPrecios();
}

?>
