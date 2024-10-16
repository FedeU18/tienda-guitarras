<?php

require '../../vendor/autoload.php';
require '../../Modelo/conector/BaseDatos.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;


$bd = new BaseDatos();


if (!$bd->Iniciar()) {
    die("Error en la conexión a la base de datos: " . $bd->getError());
}

$nombreArchivo = 'DB_Guitarras.xlsx';
$documento = IOFactory::load($nombreArchivo);
$totalHojas = $documento->getSheetCount();

$hojaActual = $documento->getSheet(0);
$numeroFilas = $hojaActual->getHighestDataRow();
$numeroLetra = Coordinate::columnIndexFromString($hojaActual->getHighestColumn());

for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) {
    // Obtener los valores de las celdas
    $valorA = $hojaActual->getCell(Coordinate::stringFromColumnIndex(1) . $indiceFila)->getValue();
    $valorB = $hojaActual->getCell(Coordinate::stringFromColumnIndex(2) . $indiceFila)->getValue();
    $valorC = $hojaActual->getCell(Coordinate::stringFromColumnIndex(3) . $indiceFila)->getValue();
    $valorD = $hojaActual->getCell(Coordinate::stringFromColumnIndex(4) . $indiceFila)->getValue();
    $valorE = $hojaActual->getCell(Coordinate::stringFromColumnIndex(5) . $indiceFila)->getValue();
    $valorF = $hojaActual->getCell(Coordinate::stringFromColumnIndex(6) . $indiceFila)->getValue();


    $sql = "INSERT INTO guitarras (marca, modelo, tipo, precio, stock, fecha_ingreso) 
            VALUES (:marca, :modelo, :tipo, :precio, :stock, :fecha_ingreso)";

    $stmt = $bd->prepare($sql);

    if ($stmt) {
        // Ejecutar la consulta con los valores obtenidos del archivo Excel
        $stmt->bindParam(':marca', $valorA);
        $stmt->bindParam(':modelo', $valorB);
        $stmt->bindParam(':tipo', $valorC);
        $stmt->bindParam(':precio', $valorD);
        $stmt->bindParam(':stock', $valorE);
        $stmt->bindParam(':fecha_ingreso', $valorF);
        $stmt->execute();
    } else {
        echo "Error en la preparación de la consulta: " . $bd->getError();
    }
}
