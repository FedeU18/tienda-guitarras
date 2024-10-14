<?php
session_start();
include_once "../../config.php";

$datos = $_POST;

if (isset($datos["id"])) {
  $id = $datos["id"];
  if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $key => $item) {
      if ($item['id'] == $id) {
        unset($_SESSION['carrito'][$key]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexa el array
        break;
      }
    }
  }
}

header("Location: ../ver_carrito.php");
exit();
