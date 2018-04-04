<?php

function cobroMes($horas, $minutos, $precios) {
  $precio = $precios->getMes();
  $meses = floor($horas/720);
  $importe = $meses * $precio;
  $resto = $horas % 720;
  return cobroQuincena(
    array(
      'importe' => $importe,
      'resto' => $resto,
      'minutos' => $minutos,
      'precios' => $precios
    )
  );
}

function cobroQuincena($datos) {
  $precio = $datos['precios']->getQuincena();
  $quincenas = floor($datos['resto']/360);
  $importe = $quincenas * $precio;
  $resto = $datos['resto'] % 360;
  return cobroSemana(
    array(
      'importe' => $datos['importe'] + $importe,
      'resto' => $resto,
      'minutos' => $datos['minutos'],
      'precios' => $datos['precios']
    )
  );
}

function cobroSemana($datos) {
  $precio = $datos['precios']->getSemana();
  $semanas = floor($datos['resto']/168);
  $importe = $semanas * $precio;
  $resto = $datos['resto'] % 168;
  return cobroDia(
    array(
      'importe' => $datos['importe'] + $importe,
      'resto' => $resto,
      'minutos' => $datos['minutos'],
      'precios' => $datos['precios']
    )
  );
}

function cobroDia($datos) {
  $precio = $datos['precios']->getDia();
  $dias = floor($datos['resto']/24);
  $importe = $dias * $precio;
  $resto = $datos['resto'] % 24;
  return cobroHora(
    array(
      'importe' => $datos['importe'] + $importe,
      'resto' => $resto,
      'minutos' => $datos['minutos'],
      'precios' => $datos['precios']
    )
  );
}

function cobroHora($datos) {
  $precio = $datos['precios']->getHora();
  $horas = $datos['resto'];
  $importe = $horas * $precio;
  $resto = 0;
  return cobroFraccion(
    array(
      'importe' => $datos['importe'] + $importe,
      'resto' => $resto,
      'minutos' => $datos['minutos'],
      'precios' => $datos['precios']
    )
  );
}

function cobroFraccion($datos) {
  $precio = $datos['precios']->getFraccion();
  $importe;
  if($datos['minutos'] >= 0 && $datos['minutos'] <= 30) {
    $importe = $precio;
  } elseif($datos['minutos'] >= 31) {
    $importe = $datos['precios']->getHora();
  } else {
    $importe = 0;
  }
  $resto = 0;
  return array(
    'importe' => $datos['importe'] + $importe,
    //'resto' => $resto,
    //'minutos' => $datos['minutos'],
    //'precios' => $datos['precios'],
    'lavado' => $datos['precios']->getLavado()
  );
}

?>
