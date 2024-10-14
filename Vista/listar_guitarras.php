<?php
include_once "../config.php";
include_once "../modelo/carrito.php";

session_start();

if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = new Carrito();
}

$objAbmGuitarra = new AbmGuitarra();
$listaGuitarra = $objAbmGuitarra->buscar(null);

if (isset($_POST['accion']) && $_POST['accion'] == 'agregar' && isset($_POST['idGuitarra'])) {
  $_SESSION['carrito']->agregar($_POST['idGuitarra']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <title>Lista de Guitarras</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    .card {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 16px;
      margin: 16px;
      text-align: center;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 250px;
      display: inline-block;
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .btn {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 10px 2px;
      cursor: pointer;
      border-radius: 4px;
      border: none;
    }
  </style>
</head>

<body>
  <h3>Lista de Guitarras</h3>
  <?php
  if (count($listaGuitarra) > 0) {
    foreach ($listaGuitarra as $objGuitarra) {
      echo '<div class="card">';
      echo '<h4>' . $objGuitarra->getMarca() . ' ' . $objGuitarra->getModelo() . '</h4>';
      echo '<p>Tipo: ' . $objGuitarra->getTipo() . '</p>';
      echo '<p>Precio: $' . $objGuitarra->getPrecio() . '</p>';
      echo '<p>Stock: ' . $objGuitarra->getStock() . '</p>';
      echo '<p>Fecha de Ingreso: ' . $objGuitarra->getFechaIngreso() . '</p>';
      echo '<form method="post" action="listar_guitarras.php">';
      echo '<input type="hidden" name="idGuitarra" value="' . $objGuitarra->getId() . '">';
      echo '<input type="hidden" name="accion" value="agregar">';
      echo '<button class="btn" type="submit">Agregar al Carrito</button>';
      echo '</form>';
      echo '</div>';
    }
  } else {
    echo "<p>No se encontraron guitarras.</p>";
  }
  ?>
</body>

</html>