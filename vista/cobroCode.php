<?php

include '../controlador/VehiculoControlador.php';
include '../controlador/ConfigPreciosControlador.php';
include '../controlador/ConfigTicketControlador.php';
include '../helps/helps.php';
include 'calculaImporte.php';

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {

  if (
    isset($_POST['miFolio']) &&
    isset($_POST['descripcionAdicional'] ) &&
    isset($_POST['txtAdicional']) &&
    isset($_POST['txtPagaCon'])
    )
    {
      $folio = validar_campo($_POST['miFolio']);
      $adicionalDescripcion = validar_campo($_POST['descripcionAdicional']);
      $adicionalMonto = validar_campo($_POST['txtAdicional']);
      $pago = validar_campo($_POST['txtPagaCon']);

      $placas = VehiculoControlador::getPlacas($folio);
      $lavado = VehiculoControlador::getLavado($folio);
      $config = ConfigTicketControlador::getConfig();
      $modelo = VehiculoControlador::getModelo($folio);
      $color = VehiculoControlador::getColor($folio);
      $cajon = VehiculoControlador::getCajon($folio);

      $hora_salida = VehiculoControlador::getHoraSalida($folio);

      // No mostramos la hora pedida desde PHP porque difiere aproximadamente 10 segundos, el cual es el tiempo que sucede
      // entre la ejecución del script que procesa la vista preliminar de cobro y este script
      $hoy = getdate();
      $fecha_salida = $hoy = date("Y-m-d");

      $hora_entrada = VehiculoControlador::getHoraEntrada($folio);
      $fecha_entrada = VehiculoControlador::getFechaEntrada($folio);
      $date1 = new DateTime($fecha_entrada . ' ' . $hora_entrada);
      $date2 = new DateTime($fecha_salida . ' ' . $hora_salida);
      $diff = $date2->diff($date1);
      $horas = $diff->h;
      $minutos = $diff->i;
      $segundos = $diff->s;
      $horas = $horas + ($diff->days*24);
      $tipo = VehiculoControlador::getTipo($folio);
      $precios = ConfigPreciosControlador::getConfig($tipo);
      $cobro = cobroMes($horas, $minutos, $precios);
      $precioLavado = 0;
      $importe = $cobro['importe'];
      if($lavado == 1){
        $precioLavado = $cobro['lavado'];
      }
      $subtotal = $importe + $precioLavado;
      $tiempo = $horas . ':' . $minutos . ':' . $segundos;

      if(
        VehiculoControlador::setAdicionalDescripcion($folio, $adicionalDescripcion) &&
        VehiculoControlador::setAdicionalMonto($folio, $adicionalMonto)
      ) {
        $total = $subtotal + $adicionalMonto;
        // habria que validar que $pago sea positivo antes de llegar a este punto
        $pago > $total ? $diferencia = 0 : $diferencia = $total - $pago;

        if(VehiculoControlador::setTotal($folio, $total) &&
           VehiculoControlador::setTiempo($folio, $tiempo) &&
           VehiculoControlador::setPagado($folio) &&
           VehiculoControlador::setRecibido($folio, $pago) &&
           VehiculoControlador::setDiferencia($folio, $diferencia) &&
           VehiculoControlador::setFechaSalida($folio, $fecha_salida)
        ) {
          $pago >= $total ? $cambio = $pago - $total : $cambio = 0;
          // damos el formato a la fecha para presentarla finalmente al cliente
          $fecha_salida = $hoy = date("d-m-Y");
          // damos formato al tiempo para presentarlo finalmente al cliente
          //$tiempo = new DateTime($tiempo);
          //$tiempo = $tiempo->format('H:i:s');
        $resultado = array(
          "estado" => "true",
          "placas" => $placas,
          "modelo" => $modelo,
          "color" => $color,
          "cajon" => $cajon,
          "lavado" => $lavado,
          "tipo" => $tipo,
          "encabezado" => $config->getEncabezado(),
          "pie_salida" => $config->getPiePaginaSalida(),
          "folio" => $folio,
          "hora_salida" => $hora_salida,
          "fecha_salida" => $fecha_salida,
          "hora_entrada" => $hora_entrada,
          "fecha_entrada" => $fecha_entrada,
          "cambio" => $cambio,
          "total" => $total,
          "adicionalDescripcion" => $adicionalDescripcion,
          "adicionalMonto" => $adicionalMonto,
          "pago" => $pago,
          "tiempo" => $tiempo,
          "importe" => $importe,
          "precioLavado" => $precioLavado
        );
        return print(json_encode($resultado));
      }
    }
  }
}
$resultado = array("estado" => "false");
return print(json_encode($resultado));

?>
