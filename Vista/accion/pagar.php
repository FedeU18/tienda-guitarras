<?php
session_start();



require_once "../../vendor/autoload.php";

$carrito = $_SESSION["carrito"];
$items = [];
foreach ($carrito as $item) {
  $detalle = [
    "quantity" => 1,
    "price_data" => [
      "currency" => "usd",
      "unit_amount" => $item["precio"] * 100,
      "product_data" => [
        "name" => $item["marca"] . " " . $item["modelo"]
      ]
    ]
  ];
  $items[] = $detalle;
}


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();
$stripe_secret_key = $_ENV["stripe_secret_key"];

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
  "mode" => "payment",
  "success_url" => "http://localhost/tienda-guitarras/Vista/exito.php",
  "cancel_url" => "http://localhost/tienda-guitarras/Vista/ver_carrito.php",
  "locale" => "es",
  "line_items" => $items
]);

header("Location: " . $checkout_session->url);
