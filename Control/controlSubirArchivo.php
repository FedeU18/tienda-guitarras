<?php

class Archivo {
    private $dir;

    public function __construct() {
        $this->dir = "../../Vista/Assets/Archivos/";
    }

    public function getDir() {
        return $this->dir;
    }

    public function setDir($dir) {
        $this->dir = $dir;
    }

    // Verifica que el archivo es de tipo texto plano
    public function verificaTipo($archivo) {
        return isset($archivo['type']) && ($archivo['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $archivo['type'] == 'application/vnd.ms-excel');
    }

    // Subir archivo y manejar errores
    public function subirArchivo($array) {
        // Verifica si el archivo fue cargado correctamente
        $resp = null;
        if (isset($array['miArchivo'])) {
            if ($array['miArchivo']['error'] == UPLOAD_ERR_OK) {
                if ($this->verificaTipo($array['miArchivo'])) {
                    $rutaDestino = $this->getDir() . $array['miArchivo']['name'];
                    if (!copy($array['miArchivo']['tmp_name'], $rutaDestino)) {
                        $resp= 0; // No se cargó el archivo
                    } else {
                        $resp= 1; // Archivo cargado correctamente
                    }
                } else {
                    $resp= -2; // No es un archivo de texto plano
                }
            } else {
                $resp= -1; // Error al subir el archivo
            }
        } else {
            // Añadir depuración
            error_log("No se seleccionó ningún archivo. Datos recibidos: " . print_r($array, true));
            $resp = -3; // No se seleccionó ningún archivo
        }
        return $resp;
    }
    
}
