<?php

include '../controlador/ConfigTicketControlador.php';
include '../helps/helps.php';

//////////////////////////////////////////////
// Retornará los headers en aplication/json //
//////////////////////////////////////////////
header('Content-type: aplication/json');

$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['txtEncabezado']) && isset($_POST['txtPie']) && isset($_POST['txtPieSalida']) ) {
    $encabezado = validar_campo($_POST['txtEncabezado']);
    $pie = validar_campo($_POST['txtPie']);
    $pieSalida = validar_campo($_POST['txtPieSalida']);


    $nombre_archivo = $_FILES['fileLogo']['name'];
    $tipo_archivo = $_FILES['fileLogo']['type'];
    $tamano_archivo = $_FILES['fileLogo']['size'];

    if($nombre_archivo === '') {
      if(ConfigTicketControlador::actualizar($encabezado, $pie, $pieSalida) ) {
        $resultado = array("estado" => "true");
        return print(json_encode($resultado));
      }
    } else {

      if ( !((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 100000)) )  {
        $resultado = array(
          "estado" => "false",
          "error" => "La extensión o el tamaño del archivo no es correcta. Se permiten .gif y .jpg de 100 Kb maximo"
        );
        return print(json_encode($resultado));
      }else{
        foreach (glob("assets/images/*.jpg") as $filename) {
          unlink($filename);
        }
        if (move_uploaded_file($_FILES['fileLogo']['tmp_name'], "assets/images/" . $nombre_archivo)){
          if(ConfigTicketControlador::actualizarConLogotipo($encabezado, $pie, $nombre_archivo, $pieSalida) ) {

            $resultado = array("estado" => "true");
            return print(json_encode($resultado));
          }
        }else{
          $resultado = array(
            "estado" => "false",
            "error" => "Ocurrió algún error al subir el archivo. No pudo guardarse."
          );
          return print(json_encode($resultado));
        }
      }
    }

  }
}
$resultado = array("estado" => "false");
return print(json_encode($resultado));

?>
