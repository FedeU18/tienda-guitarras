<?php
include_once "../config.php";
include_once "../modelo/carrito.php";

session_start();

if (!isset($_SESSION['carrito'])) {
  echo "El carrito está vacío.";
} else {
  $carrito = $_SESSION['carrito'];
  $items = $carrito->getItems();
  echo "<h3>Carrito de Compras</h3>";
  echo "<ul>";
  foreach ($items as $idGuitarra => $cantidad) {
    echo "<li>Guitarra ID: $idGuitarra - Cantidad: $cantidad</li>";
  }
  echo "</ul>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <title>Carrito de Compras</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
  <br><a href="listar_guitarras.php">Volver a la lista de guitarras</a>
</body>

</html>