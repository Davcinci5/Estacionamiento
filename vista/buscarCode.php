<?php

include '../controlador/VehiculoControlador.php';
include '../controlador/ConfigPreciosControlador.php';
include '../helps/helps.php';
include 'calculaImporte.php';

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['txtBuscar'])) {
    $folio = validar_campo($_POST['txtBuscar']);
    if(VehiculoControlador::existe($folio)) {
      if(!VehiculoControlador::getPagado($folio)) {
        $placas = VehiculoControlador::getPlacas($folio);
        $tipo = VehiculoControlador::getTipo($folio);
        $precios = ConfigPreciosControlador::getConfig($tipo);
        $lavado = VehiculoControlador::getLavado($folio);

        $hoy = getdate();
        $hora_salida = $hoy = date("H:i:s");
        $fecha_salida = $hoy = date("Y-m-d");

        $hora_entrada = VehiculoControlador::getHoraEntrada($folio);
        $fecha_entrada = VehiculoControlador::getFechaEntrada($folio);
        $fecha_entrada = date_create($fecha_entrada);
        $fecha_entrada = date_format($fecha_entrada, 'Y-m-d');

        $date1 = new DateTime($fecha_entrada . ' ' . $hora_entrada);
        $date2 = new DateTime($fecha_salida . ' ' . $hora_salida);
        $diff = $date2->diff($date1);
        $horas = $diff->h;
        $minutos = $diff->i;
        $segundos = $diff->s;
        $horas = $horas + ($diff->days*24);

        $cobro = cobroMes($horas, $minutos, $precios);
        $precioLavado = 0;
        $importe = $cobro['importe'];
        if($lavado == 1){
          $precioLavado = $cobro['lavado'];
        }
        $subtotal = $importe + $precioLavado;
        $tiempo = $horas . ':' . $minutos . ':' . $segundos;
        $total = $subtotal;

        // es necesario setear la hora de salida porque hay una variación de aproximadamente 10 segundos
        // entre la ejecución de este script y la ejecución del script que procesa el cobro
        // con lo cual difiere la hora que aqui se muestra (ficha de salida preliminar) con la vista del
        // ticket (el que se imprime finalmente). De esa forma cuando recuperemos la hora de salida desde la BD
        // para alimentar el ticket imprimible, ésta va coincidrir con la hora aqui mostrada (ficha de salida preliminar)
        if(VehiculoControlador::setHoraSalida($folio, $hora_salida)) {
        // damos el formato a la fecha para presentarla finalmente al cliente
        $fecha_salida = $hoy = date("d-m-Y");
        // damos formato al tiempo para presentarlo finalmente al cliente
        //$tiempo = new DateTime($tiempo);
        //$tiempo = $tiempo->format('H:i:s');
        // volvemos a pedir la fecha de entrada para presentarla finalmente al cliente
        $fecha_entrada = VehiculoControlador::getFechaEntrada($folio);
        $resultado = array(
          "estado" => "true",
          "folio" => $folio,
          "placas" => $placas,
          "hora_salida" => $hora_salida,
          "fecha_salida" => $fecha_salida,
          "hora_entrada" => $hora_entrada,
          "fecha_entrada" => $fecha_entrada,
          "horas" => $horas,
          "minutos" => $minutos,
          "segundos" => $segundos,
          "cobro" => $cobro,
          "lavado" => $lavado,
          "tiempo" => $tiempo
        );
        return print(json_encode($resultado));
      }
    } else {
      $resultado = array("estado" => "false", "error" => 'El vehículo ya ha salido');
      return print(json_encode($resultado));
    }
  } else {
    $resultado = array("estado" => "false", "error" => 'No existe el folio ingresado');
    return print(json_encode($resultado));
  }
}
}
$resultado = array("estado" => "false");
return print(json_encode($resultado));

?>
