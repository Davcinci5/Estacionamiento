<?php

include '../controlador/VehiculoControlador.php';
include '../controlador/ConfigTicketControlador.php';
include '../helps/helps.php';

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(
    isset($_POST['txtPlacas']) && isset($_POST['txtModelo']) &&
    isset($_POST['txtColor']) && isset($_POST['txtCajon']) &&
    isset($_POST['txtObservaciones'])
  ) {
    $placas = validar_campo($_POST['txtPlacas']);
    $modelo = validar_campo($_POST['txtModelo']);
    $color = validar_campo($_POST['txtColor']);
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
    $cajon = validar_campo($_POST['txtCajon']);
    $observaciones = validar_campo($_POST['txtObservaciones']);
    if(isset($_POST['chBoxLavado'])) {
      $lavado = 1;
    } else {
      $lavado = 0;
    }

    $resultado = array("estado" => "true");

    if(VehiculoControlador::Ingresar($placas, $modelo, $color, $cajon, $observaciones, $lavado, $tipo)) {
        $config = ConfigTicketControlador::getConfig();
        $folio = VehiculoControlador::getUltimo();
        $hora = VehiculoControlador::getHoraEntrada($folio);
        $fecha = VehiculoControlador::getFechaEntrada($folio);
        $resultado = array(
          "estado" => "true",
          "placas" => $placas,
          "modelo" => $modelo,
          "color" => $color,
          "cajon" => $cajon,
          "observaciones" => $observaciones,
          "lavado" => $lavado,
          "tipo" => $tipo,
          "hora" => $hora,
          "fecha" => $fecha,
          "logotipo" => $config->getLogotipo(),
          "pie" => $config->getPiePagina(),
          "encabezado" => $config->getEncabezado(),
          "folio" => $folio
        );
        return print(json_encode($resultado));
      }
    }
  }
  $resultado = array("estado" => "false");
  return print(json_encode($resultado));

  ?>
