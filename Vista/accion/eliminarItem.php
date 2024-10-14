<?php
session_start();
include_once "../../configuracion.php";

$datos = $_POST;

if (isset($datos["id"])) {
  $id = $datos["id"];
  if (isset($_SESSION['carrito'])) {
    $i = 0;
    $encontrado = false;
    while ($i < count($_SESSION['carrito']) && !$encontrado) {
      if ($_SESSION['carrito'][$i]['id'] == $id) {
        unset($_SESSION['carrito'][$i]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexa el array
        $encontrado = true;
      }
      $i++;
    }
  }
}

header("Location: ../carrito_view.php");
exit();
