<?php
$title = "Lista de Guitarras";
include_once('../Vista/Estructura/header.php');
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

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
  <div class="d-flex align-items-center">
    <span class="mr-2">Carrito:</span>
    <span class="badge badge-pill badge-primary"><?php echo count($carrito); ?></span>
  </div>
    <a href="ver_carrito.php" class="btn btn-primary">Ver Carrito</a>
  </div>

  <h3 class="mb-4">Lista de Guitarras</h3>

  <div class="row">
    <?php
    if (count($listaGuitarra) > 0) {
      foreach ($listaGuitarra as $objGuitarra) {
        echo '<div class="col-md-4 mb-4">';
        echo '<form method="post" action="./accion/carrito.php">';
        echo '<input name="id" type="hidden" value="' . $objGuitarra->getId() . '" />';
        echo '<input name="precio" type="hidden" value="' . $objGuitarra->getPrecio() . '" />';
        echo '<input name="marca" type="hidden" value="' . $objGuitarra->getMarca() . '" />';
        echo '<input name="modelo" type="hidden" value="' . $objGuitarra->getModelo() . '" />';

        echo '<div class="card h-100">';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">' . $objGuitarra->getMarca() . ' ' . $objGuitarra->getModelo() . '</h4>';
        echo '<p class="card-text">Precio: $' . $objGuitarra->getPrecio() . '</p>';
        echo '</div>';
        
        echo '<div class="card-footer">';
        echo '<button type="submit" class="btn btn-success w-100">Agregar al carrito</button>';
        echo '</div>';

        echo '</div>';
        echo '</form>';
        echo '</div>';
      }
    } else {
      echo "<p>No se encontraron guitarras.</p>";
    }
    ?>
  </div>
</div>

<?php
include_once('../Vista/Estructura/footer.php');
?>