<?php
$title = "Carrito de Compras";
include_once('../Vista/Estructura/header.php');
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
    echo '<form method="post" action="accion/pagar.php">';
    echo '<button type="submit">Pagar</button>';
    echo '</form>';
  }
  ?>
  <br><a href="ver_guitarras.php">Volver a la lista de guitarras</a>
<?php
include_once('../Vista/Estructura/footer.php');
?>