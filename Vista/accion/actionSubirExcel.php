<?php

require '../../vendor/autoload.php';
// require '../../Modelo/conector/BaseDatos.php';
require '../../Control/AbmGuitarra.php'; 
include_once "../../Control/controlSubirArchivo.php"; 
// include_once "../../util/funciones.php";
include_once '../../config.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

$datos = data_submitted();

$archivoSubir = new Archivo();
$rta = $archivoSubir->subirArchivo($datos);
$texto = "11";


if ($rta == 0) {
    $texto = "<p>ERROR: no se cargó el archivo </p>";
} elseif ($rta == 1) {
    $texto = "<p>Archivo subido correctamente.</p>";

    // Procesar el archivo Excel si es de tipo Excel
    if ($datos['miArchivo']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
        // Procesar el archivo Excel
        $abmGuitarra = new AbmGuitarra(); 
        
        $rutaArchivo = $archivoSubir->getDir() . $datos['miArchivo']['name'];
        echo $rutaArchivo;

        // Cargar el archivo Excel
        $documento = IOFactory::load($rutaArchivo);
        $hojaActual = $documento->getSheet(0); // Primera hoja
        $numeroFilas = $hojaActual->getHighestDataRow();
        $numeroLetra = Coordinate::columnIndexFromString($hojaActual->getHighestColumn());

        // Insertar los datos del archivo en la base de datos utilizando el ABM
        for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) {
            $valorA = $hojaActual->getCell(Coordinate::stringFromColumnIndex(1) . $indiceFila)->getValue();
            $valorB = $hojaActual->getCell(Coordinate::stringFromColumnIndex(2) . $indiceFila)->getValue();
            $valorC = $hojaActual->getCell(Coordinate::stringFromColumnIndex(3) . $indiceFila)->getValue();
            $valorD = $hojaActual->getCell(Coordinate::stringFromColumnIndex(4) . $indiceFila)->getValue();
            $valorE = $hojaActual->getCell(Coordinate::stringFromColumnIndex(5) . $indiceFila)->getValue();
            $valorF = $hojaActual->getCell(Coordinate::stringFromColumnIndex(6) . $indiceFila)->getValue();

            // Preparar los datos para el ABM
            $param = [
                'id' => null, // El ID se asignará automáticamente
                'marca' => $valorA,
                'modelo' => $valorB,
                'tipo' => $valorC,
                'precio' => $valorD,
                'stock' => $valorE,
                'fecha_ingreso' => $valorF
            ];

            // Intentar insertar la guitarra utilizando el ABM
            if ($abmGuitarra->alta($param)) {
                echo "<p>Guitarra insertada: Marca $valorA, Modelo $valorB</p>";
            } else {
                echo "<p>Error al insertar guitarra: Marca $valorA, Modelo $valorB</p>";
            }
        }
    } else {
        // Si el archivo no es Excel, mostrar el contenido (por ejemplo, un archivo de texto)
        $texto .= "<textarea class='p-3 bg-secondary text-light' rows='10' cols='50'>" . file_get_contents($archivoSubir->getDir() . $datos['miArchivo']['name']) . "</textarea>";
        echo $texto;
    }

} elseif ($rta == -1) {
    $texto = "<p class='text-danger border-bottom border-danger'>ERROR: No se pudo cargar el archivo temporal.</p>";
} elseif ($rta == -2) {
    $texto = "<p class='text-danger border-bottom border-danger'>ERROR: El archivo no es válido. Solo se aceptan archivos de texto o Excel.</p>";
} else if ($rta == -3) {
    $texto = "<p class='text-danger border-bottom border-danger'>ERROR: No hay archivo seleccionado.</p>";
}

echo $texto;
?>
<br><a href="../SubirExcel.php">Volver</a><br>
