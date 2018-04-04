<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>

<?php
if(isset($_SESSION["usuario"])) {
  if($_SESSION["usuario"]["Activo"] == 1) {
    header("location:vehiculos.php");
  }
} else {
  header("location:login.php");
}
?>

<div class="container">
  <div class="container text-center jumbotron">
    <p>
      <h4><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["Nombre_Usuario"]; ?></h4>
    </p>
    <p>
      Estado: <span class="label label-danger"> <?php echo $_SESSION["usuario"]["Activo"] == 1 ? 'Activo' : 'Inactivo'; ?> </span>
    </p>
    <p>
      Por favor ponte en contacto con el <span class="label label-info"> Admin </span>
    </p>
  </div>
</div>

<?php include 'partials/footer.php' ?>
