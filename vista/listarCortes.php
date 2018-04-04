<?php
include '../controlador/CorteControlador.php';

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['datepicker'])) {
    $fecha = $_POST['datepicker'];
    $fecha = date_create($fecha);
    $fecha = date_format($fecha, 'Y-m-d');

      $datos = CorteControlador::getCortes($fecha);
      if(sizeof($datos) > 0) {
        $resultado = array(
          "estado" => "true",
          "datos" => $datos
        );
        return print(json_encode($resultado));
      } else {
        $resultado = array(
          "estado" => "false",
          "error" => "No hay cortes en esa fecha"
        );
        return print(json_encode($resultado));
      }
  } else {
    $resultado = array(
      "estado" => "false"
    );
    return print(json_encode($resultado));
  }
}

?>
