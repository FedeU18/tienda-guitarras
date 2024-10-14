<?php
session_start();
include_once "../config.php";

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
  echo "El carrito está vacío.";
} else {
  $carrito = $_SESSION['carrito'];

  echo "<h3>Carrito de Compras</h3>";
  echo "<ul>";
  foreach ($carrito as $item) {
    echo "<li>Marca: " . $item["marca"] . ", Modelo: " . $item["modelo"] . ", Precio: $" . $item["precio"];
    echo ' <form method="post" action="accion/eliminarItem.php" style="display:inline;">';
    echo '<input type="hidden" name="id" value="' . $item["id"] . '">';
    echo '<button type="submit">Eliminar</button>';
    echo '</form>';
    echo "</li>";
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
  <br><a href="ver_guitarras.php">Volver a la lista de guitarras</a>
</body>

</html>