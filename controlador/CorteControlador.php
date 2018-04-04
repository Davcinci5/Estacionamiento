<?php

include '../datos/CorteDao.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if(isset($_GET['funcion']) ) {
    $funcion =$_GET['funcion'];
    if($funcion === "getCorteUltimo()"){
      $arrayDatos = CorteControlador::getCorteUltimo();
      $corte = $arrayDatos['corte'];
      $datos = array(
        'id_corte' => $corte->getIdCorte(),
        'atendidos' => $corte->getAtendidos(),
        'fecha' => $corte->getFecha(),
        'hora' => $corte->getHora(),
        'usuario' => $corte->getUsuario(),
        '$efectivo_entregado' => $corte->getEfectivoEntregado(),
        'total_ingresos' => $corte->getTotalIngresos(),
        'egresos_descripcion' => $corte->getEgresosDescripcion(),
        'egresos_monto' => $corte->getEgresosMonto(),
        'en_caja' => $corte->getEnCaja(),
        'diferencia' => $corte->getDiferencia(),
        'importe' => $corte->getImporte(),
        'adicional' => $corte->getAdicional(),
        'vehiculos_todos' => $arrayDatos['vehiculos_todos'],
        'vehiculos_con_diferencia' => $arrayDatos['vehiculos_con_diferencia']
      );
      echo json_encode($datos);
    }

    if($funcion === "getCorte()"){
      $id_corte =$_GET['id_corte'];
      $arrayDatos = CorteControlador::getCorte($id_corte);
      $corte = $arrayDatos['corte'];
      $datos = array(
        'id_corte' => $corte->getIdCorte(),
        'atendidos' => $corte->getAtendidos(),
        'fecha' => $corte->getFecha(),
        'hora' => $corte->getHora(),
        'usuario' => $corte->getUsuario(),
        '$efectivo_entregado' => $corte->getEfectivoEntregado(),
        'total_ingresos' => $corte->getTotalIngresos(),
        'egresos_descripcion' => $corte->getEgresosDescripcion(),
        'egresos_monto' => $corte->getEgresosMonto(),
        'en_caja' => $corte->getEnCaja(),
        'diferencia' => $corte->getDiferencia(),
        'importe' => $corte->getImporte(),
        'adicional' => $corte->getAdicional(),
        'vehiculos_todos' => $arrayDatos['vehiculos_todos'],
        'vehiculos_con_diferencia' => $arrayDatos['vehiculos_con_diferencia']
      );
      echo json_encode($datos);
    }
  }
}

class CorteControlador {

  public function setCorte($usuario, $atendidos, $efectivo_entregado, $total_ingresos, $egresos_descripcion,
    $egresos_monto, $en_caja, $diferencia, $importe, $adicional
  ) {
    $obj_corte = new Corte();
    $obj_corte->setUsuario($usuario);
    $obj_corte->setAtendidos($atendidos);
    $obj_corte->setEfectivoEntregado($efectivo_entregado);
    $obj_corte->setTotalIngresos($total_ingresos);
    $obj_corte->setEgresosDescripcion($egresos_descripcion);
    $obj_corte->setEgresosMonto($egresos_monto);
    $obj_corte->setEnCaja($en_caja);
    $obj_corte->setDiferencia($diferencia);
    $obj_corte->setImporte($importe);
    $obj_corte->setAdicional($adicional);

    return CorteDao::setCorte($obj_corte);
  }

  public function getCorte($id_corte) {
    $obj_corte = new Corte();
    $obj_corte->setIdCorte($id_corte);

    return CorteDao::getCorte($obj_corte);
  }

  public function getCortes($fecha) {
    $obj_corte = new Corte();
    $obj_corte->setFecha($fecha);

    return CorteDao::getCortes($obj_corte);
  }

  public function getCorteUltimo() {
    return CorteDao::getCorteUltimo();
  }

  public function setDiferenciaCalculada($id_ultimo, $diferencia) {
    $obj_corte = new Corte();
    $obj_corte->setIdCorte($id_ultimo);
    $obj_corte->setDiferencia($diferencia);
    return CorteDao::setDiferenciaCalculada($obj_corte);
  }

}

?>
