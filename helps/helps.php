<?php

  /*********************************************************
   * Función que sirve para validar y limpiar un campo     *
   * @param  input $campo tiene que ser campo de tipo POST *
   * @return String                                        *
   *********************************************************/
  function validar_campo($campo) {
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);

    return $campo;
  }

 ?>
