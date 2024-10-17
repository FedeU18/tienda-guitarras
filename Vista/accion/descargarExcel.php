<?php

include_once "../../config.php";
include_once "../../vendor/autoload.php";

//funcionan para utilizar estas 2 clases en el archivo actual
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
//Le dice al navegador q tipo de contenido esta recibiendo. en este caso el contenido es un archivo de hoja de calculo Excel XLSX
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//Le indica al navegador como debe tratar el contenido. se especifica que el contenido es un archivo adjunto, lo q obliga al navegador
//a iniciar una descarga en lugar de intentar mostrar el contenido en la ventana.
header('Content-Disposition: attachment;filename="Guitarras.xlsx"');
//Controla el almacenamiento en caché, asegura que se descargue la versión más reciente del archivo Excel y no una versión almacenada en caché
header('Cache-Control: max-age=0');

//genera el archivo excel
$writer = IOFactory::createWriter($excel, 'Xlsx');
//se pone para descargar el archivo excel creado.
$writer->save('php://output');
