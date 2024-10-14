<?php
header('Content-Type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate ");

$PROYECTO = 'tienda-guitarras';
$ROOT = $_SERVER['DOCUMENT_ROOT'] . "/$PROYECTO/";

include_once($ROOT . 'util/funciones.php');

$INICIO = "Location:http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/vista/login/login.php";
$PRINCIPAL = "Location:http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/principal.php";

$_SESSION['ROOT'] = $ROOT;
