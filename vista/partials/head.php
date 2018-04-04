<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  ///////////////////////////////////////
  // continuamos o iniciamos la sesión //
  //////////////////////////////////////
  session_start();
   ?>
   <style type="text/css">

   /*************************************************
   REDCUCIR TAMAÑO DE FUENTE CUANDO LA RESOLUCIÓN
   DE LA PANTALLA ES MENOR A 320PX
   *************************************************/
   @media only screen and (max-width: 320px) {
     .minFont {
       font-size: 10px;
     }

    /**********************************************
     * Ocultar legend cuando sobresale de la caja *
     **********************************************/
     legend {
       width: 1px;
       height: 1px;
       overflow: hidden;
    }
   }

   </style>
  <title>Estacionamiento</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/overhang.css">
  <link rel="stylesheet" href="assets/css/zebra_datepicker.min.css">
</head>
<body>
