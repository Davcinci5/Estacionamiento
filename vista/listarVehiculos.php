<?php
include '../controlador/VehiculoControlador.php';

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "GET") {
  VehiculoControlador::getVehiculos();
}

?>
