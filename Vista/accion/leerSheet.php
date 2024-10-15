<?php 


require '../../vendor/autoload.php';
require '../../Modelo/conector/BaseDatos.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

$nombreArchivo = 'DB_Guitarras.xlsx';
$documento = IOFactory::load($nombreArchivo);
$totalHojas = $documento->getSheetCount();

// for($indiceHoja = 0 ;  $indiceHoja < $totalHojas; $indiceHoja++){

// }

$hojaActual = $documento->getSheet(0);
$numeroFilas = $hojaActual->getHighestDataRow();
$letra = $hojaActual->getHighestColumn();


for($indiceFila = 1 ; $indiceFila<=$numeroFilas ; $indiceFila++){

    // $numeroLetra = Coordinate::columnIndexFromString('A');
    // $valor = $hojaActual->getCell('A' . $numeroLetra , $indiceFila);

    $valorA = $hojaActual->getCell('A' . $indiceFila)->getValue();
    $valorB = $hojaActual->getCell('B' . $indiceFila)->getValue();
    $valorC = $hojaActual->getCell('C' . $indiceFila)->getValue();
    $valorD = $hojaActual->getCell('D' . $indiceFila)->getValue();
    $valorE = $hojaActual->getCell('E' . $indiceFila)->getValue();
    $valorF = $hojaActual->getCell('F' . $indiceFila)->getValue();
    echo $valorA. ' '. $valorB . ' ' . $valorC . ' ' . $valorD . ' ' . $valorE . ' ' . $valorF .  '<br/>';
}

?>