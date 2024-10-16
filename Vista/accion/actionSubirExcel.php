<?php

require '../../vendor/autoload.php';
require '../../Modelo/conector/BaseDatos.php';
include_once "../../Control/controlSubirArchivo.php"; // Incluimos la clase Archivo
include_once "../../util/funciones.php";


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

$datos = data_submitted();

$archivoSubir = new Archivo();
$rta = $archivoSubir->subirArchivo($datos);
$texto = "11";

// Manejar el resultado de la subida de archivo
if ($rta == 0) {
    $texto = "<p>ERROR: no se cargó el archivo </p>";
} elseif ($rta == 1) {
    $texto = "<p>Archivo subido correctamente.</p>";

    // Procesar el archivo Excel si es de tipo Excel
    if ($datos['miArchivo']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
        // Procesar el archivo Excel
        

        $bd = new BaseDatos();

        if (!$bd->Iniciar()) {
            die("Error en la conexión a la base de datos: " . $bd->getError());
        }

        // Ruta completa al archivo subido
        $rutaArchivo = $archivoSubir->getDir() . $datos['miArchivo']['name'];
        echo $rutaArchivo;
        // Cargar el archivo Excel
        $documento = IOFactory::load($rutaArchivo);
        $hojaActual = $documento->getSheet(0); // Primera hoja
        $numeroFilas = $hojaActual->getHighestDataRow();
        $numeroLetra = Coordinate::columnIndexFromString($hojaActual->getHighestColumn());

        // Insertar los datos del archivo en la base de datos
        for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) {
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
                $stmt->bindParam(':marca', $valorA);
                $stmt->bindParam(':modelo', $valorB);
                $stmt->bindParam(':tipo', $valorC);
                $stmt->bindParam(':precio', $valorD);
                $stmt->bindParam(':stock', $valorE);
                $stmt->bindParam(':fecha_ingreso', $valorF);
                $stmt->execute();
                echo "1";
            } else {
                echo "Error en la preparación de la consulta: " . $bd->getError();
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
}else if ($rta == -3){
    $texto = "<p class='text-danger border-bottom border-danger'>ERROR: No hay archivo seleccionado.</p>";
}

echo $texto;
