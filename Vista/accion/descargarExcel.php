<?php

include_once "../../config.php";
include_once "../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

//Me traigo todas la guitarras de la base de datos
$abmGuitarra = new AbmGuitarra();
$guitarras = $abmGuitarra->buscar(null);

//instancio el excel, me ubico en la hoja activa y le seteo el título
$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Guitarras");

//Seteo los Títulos en la primer fila

$hojaActiva->setCellValue("A1", "ID");
$hojaActiva->setCellValue("B1", "Marca");
$hojaActiva->setCellValue("C1", "Modelo");
$hojaActiva->setCellValue("D1", "Tipo");
$hojaActiva->setCellValue("E1", "Precio");
$hojaActiva->setCellValue("F1", "Stock");
$hojaActiva->setCellValue("G1", "Fecha de Ingreso");

//Dinámicamente seteo los valores de las siguientes filas con los registros de la base de datos

$fila = 2;

foreach ($guitarras as $guitarra) {
  $hojaActiva->setCellValue('A' . $fila, $guitarra->getId());
  $hojaActiva->setCellValue('B' . $fila, $guitarra->getMarca());
  $hojaActiva->setCellValue('C' . $fila, $guitarra->getModelo());
  $hojaActiva->setCellValue('D' . $fila, $guitarra->getTipo());
  $hojaActiva->setCellValue('E' . $fila, $guitarra->getPrecio());
  $hojaActiva->setCellValue('F' . $fila, $guitarra->getStock());
  $hojaActiva->setCellValue('G' . $fila, $guitarra->getFechaIngreso());
  $fila++;
}


//Headers y funciones para crear y descargar el archivo excel

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Guitarras.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
