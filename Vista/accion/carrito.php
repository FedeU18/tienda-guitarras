<?php
session_start();
include_once "../../config.php";

$datos = data_submitted();
if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = [];
} else {
  $carrito = $_SESSION["carrito"];
}

if (isset($datos["id"])) {
  $id = $datos["id"];
  $marca = $datos["marca"];
  $modelo = $datos["modelo"];
  $precio = $datos["precio"];

  array_push($carrito, ["id" => $id, "marca" => $marca, "modelo" => $modelo, "precio" => $precio]);
}
$_SESSION["carrito"] = $carrito;
header("Location: " . $_SERVER["HTTP_REFERER"]);
exit();
