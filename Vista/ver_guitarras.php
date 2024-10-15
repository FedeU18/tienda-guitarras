<?php
session_start();
include_once "../config.php";

$objAbmGuitarra = new AbmGuitarra();
$listaGuitarra = $objAbmGuitarra->buscar(null);


if (isset($_SESSION["carrito"])) {
  $carrito = $_SESSION["carrito"];
} else {
  $carrito = [];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <title>Lista de Guitarras</title>
  <div>carrito: <?php echo count($carrito) ?></div>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
  <h3>Lista de Guitarras</h3>
  <a href="ver_carrito.php">Ver Carrito</a>
  <?php
  if (count($listaGuitarra) > 0) {
    foreach ($listaGuitarra as $objGuitarra) {
      echo '<form id="formulario" method="post" action="./accion/carrito.php">';
      echo '<input name="id" type="hidden" value="' . $objGuitarra->getId() . '" />';
      echo '<input name="precio" type="hidden" value="' . $objGuitarra->getPrecio() . '" />';
      echo '<input name="marca" type="hidden" value="' . $objGuitarra->getMarca() . '" />';
      echo '<input name="modelo" type="hidden" value="' . $objGuitarra->getModelo() . '" />';
      echo '<div class="card">';
      echo '<h4>' . $objGuitarra->getMarca() . ' ' . $objGuitarra->getModelo() . '</h4>';
      echo '<p>Precio: $' . $objGuitarra->getPrecio() . '</p>';
      echo '<input type="submit" value="Agregar al carrito"/>';
      echo '</div>';
      echo '</form>';
    }
  } else {
    echo "<p>No se encontraron guitarras.</p>";
  }
  ?>
</body>

</html>