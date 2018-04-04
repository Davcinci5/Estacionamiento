<?php
include '../controlador/VehiculoControlador.php';
include '../controlador/CorteControlador.php';
include '../controlador/CortesVehiculosControlador.php';
include '../helps/helps.php';

session_start();

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['txtEfectivo']) &&
    isset($_POST['txtEgresosDescripcion']) &&
    isset($_POST['txtEgresos'])
  ) {
    $efectivo_entregado = validar_campo($_POST['txtEfectivo']);
    $egresos_monto = validar_campo($_POST['txtEgresos']);
    $egresos_descripcion = validar_campo($_POST['txtEgresosDescripcion']);
    $datosCorte = VehiculoControlador::getTotalCorte($efectivo_entregado, $egresos_monto, $egresos_descripcion);
    $miCorte = $datosCorte['corte'];
    $vehiculos_todos = $datosCorte['vehiculos_todos'];
    $total_ingresos = $miCorte->getTotalIngresos();
    //$diferencia = $total_ingresos - $entregado;
    //$diferencia > 0 ? : $diferencia = 0;

    if($miCorte->getImporte() == null) {
      $resultado = array(
        "estado" => "false",
        "error" => "No hay vehiculos para hacer corte"
       );
      return print(json_encode($resultado));
    }

    // Consultamos todos los vehiculos que aun no han sido incluidos previamente
    // en algún otro corte y sumamos el campo total de todos ellos
    if(
     CorteControlador::setCorte(
       $_SESSION['usuario']['Nombre_Usuario'],
       $miCorte->getAtendidos(),
       $miCorte->getEfectivoEntregado(),
       $miCorte->getTotalIngresos(),
       $miCorte->getEgresosDescripcion(),
       $miCorte->getEgresosMonto(),
       $miCorte->getEnCaja(),
       $miCorte->getDiferencia(),
       $miCorte->getImporte(),
       $miCorte->getAdicional()
       )
     ){
       // recuperamos el id del ultimo corte
       $ultimo = CorteControlador::getCorteUltimo()['corte'];
       $id_ultimo = $ultimo->getIdCorte();
       // insertamos los datos de cada vehiculo recuperado
       $atendidos = count($vehiculos_todos);

       for($i=0; $i<$atendidos; $i++) {
         $folio_vehiculo = $vehiculos_todos[$i]['FOLIO'];
         $total = $vehiculos_todos[$i]['TOTAL'];
         $recibido = $vehiculos_todos[$i]['PAGADO'];
         $diferencia = $vehiculos_todos[$i]['DIFERENCIA'];
         CortesVehiculosControlador::setCortesVehiculos($id_ultimo, $folio_vehiculo, $total, $recibido, $diferencia);
       }

       $resultado = array(
         "estado" => "true"
       );
       return print(json_encode($resultado));
     } else {
       $resultado = array("estado" => "false", "error" => "Corte no ingresado");
       return print(json_encode($resultado));
     }
      }
    }

$resultado = array("estado" => "false");
return print(json_encode($resultado));

?>
