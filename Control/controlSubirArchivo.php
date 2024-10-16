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
        return isset($archivo['type']) && $archivo['type'] == 'text/plain';
    }

    // Subir archivo y manejar errores
    public function subirArchivo($array) {
        // Verifica si el archivo fue cargado correctamente
        if (isset($array['miArchivo']) && $array['miArchivo']['error'] == UPLOAD_ERR_OK) {
            if ($this->verificaTipo($array['miArchivo'])) {
                $rutaDestino = $this->getDir() . $array['miArchivo']['name'];
                if (!copy($array['miArchivo']['tmp_name'], $rutaDestino)) {
                    return 0; // No se cargó el archivo
                } else {
                    return 1; // Archivo cargado correctamente
                }
            } else {
                return -2; // No es un archivo de texto plano
            }
        } elseif (isset($array['miArchivo']) && $array['miArchivo']['error'] > 0) {
            return -1; // Error al subir el archivo
        } else {
            return -3; // No se seleccionó ningún archivo
        }
    }
}
