<?php
include_once './Modelo/conector/bd.php';
include_once './Modelo/Guitarra.php';
include_once './Control/GuitarraControl.php';

function verEstructura($obj)
{
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
}

$abmGuitarra = new AbmGuitarra();

// Ejemplo de alta
$paramsAlta = [
  'id' => null,
  'marca' => 'Epiphone',
  'modelo' => 'SG',
  'tipo' => 'Eléctrica',
  'precio' => 700.00,
  'stock' => 6,
  'fecha_ingreso' => '2024-08-10'
];
if ($abmGuitarra->alta($paramsAlta)) {
  echo "Alta exitosa!";
} else {
  echo "Error en alta.";
}

// Ejemplo de modificación
$paramsMod = [
  'id' => 1,
  'marca' => 'Gibson',
  'modelo' => 'Les Paul Custom',
  'tipo' => 'Eléctrica',
  'precio' => 2600.00,
  'stock' => 4,
  'fecha_ingreso' => '2024-02-10'
];
if ($abmGuitarra->modificacion($paramsMod)) {
  echo "Modificación exitosa!";
} else {
  echo "Error en modificación.";
}

// Ejemplo de baja
$paramsBaja = ['id' => 7];
if ($abmGuitarra->baja($paramsBaja)) {
  echo "Baja exitosa!";
} else {
  echo "Error en baja.";
}

// Ejemplo de búsqueda
$paramsBusqueda = ['marca' => 'Fender'];
$resultado = $abmGuitarra->buscar($paramsBusqueda);
if (count($resultado) > 0) {
  foreach ($resultado as $obj) {
    verEstructura($obj);
  }
} else {
  echo "No se encontraron resultados.";
}

$paramsBusquedaElectrica = ['tipo' => 'Eléctrica'];
$resultadoElectrica = $abmGuitarra->buscar($paramsBusquedaElectrica);
if (count($resultadoElectrica) > 0) {
  foreach ($resultadoElectrica as $obj) {
    verEstructura($obj);
  }
} else {
  echo "No se encontraron resultados.";
}

$paramsBusquedaPrecio = ['precio' => 2000.00];
$resultadoPrecio = $abmGuitarra->buscar($paramsBusquedaPrecio);
if (count($resultadoPrecio) > 0) {
  foreach ($resultadoPrecio as $obj) {
    verEstructura($obj);
  }
} else {
  echo "No se encontraron resultados.";
}
