<?php
session_start();
$title = "Exito";

$_SESSION["carrito"] = [];
include_once('../Vista/Estructura/header.php');
?>
<h1>Tu compra a sido confirmada</h1>
<div>
  <p>
    Pronto te llegará un mail con los detalles de tu compra
  </p>
  <p>Gracias por elegirnos</p>
</div>
<a href="./ver_guitarras.php">Volver a Inicio</a>
<?php
include_once('../Vista/Estructura/footer.php');
?>