<?php

include '../controlador/configPreciosControlador.php';
include '../helps/helps.php';

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['txtPrecio'])) {
    $precio = validar_campo($_POST['txtPrecio']);
    $tipo = $_POST['selectTipo'];
    switch ($tipo) {
      case '1':
      $tipo = 'automovil';
      break;
      case '2':
      $tipo = 'camioneta';
      break;
      case '3':
      $tipo = 'motocicleta';
      break;
      case '4':
      $tipo = 'otro';
      break;
      default:
      $tipo = '';
    }

    if($tipo === '') {
      $resultado = array(
        "estado" => "false",
        "error" => "Seleccione un tipo de vehículo por favor"
      );
      return print(json_encode($resultado));
    }

    $concepto = $_POST['selectConcepto'];
    if($concepto === 'Seleccione') {
      $resultado = array(
        "estado" => "false",
        "error" => "Seleccione un concepto por favor"
      );
      return print(json_encode($resultado));
    }

    if(ConfigPreciosControlador::actualizar($tipo, $concepto, $precio)) {
      $resultado = array("estado" => "true");
      return print(json_encode($resultado));
    }

  }
}
$resultado = array("estado" => "false");
return print(json_encode($resultado));

?>
