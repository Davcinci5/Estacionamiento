<?php
if(isset($_SESSION["usuario"])) {
  if($_SESSION["usuario"]["Activo"] == 0) {
      header("location:inactivo.php");
  }
} else {
  header("location:login.php");
}
?>
