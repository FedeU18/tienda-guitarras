<?php
function data_submitted()
{
  $_AAux = array();
  if (!empty($_POST)) {
    $_AAux = $_POST;
  } else if (!empty($_GET)) {
    $_AAux = $_GET;
  }
  if (count($_AAux)) {
    foreach ($_AAux as $indice => $valor) {
      if ($valor == "") {
        $_AAux[$indice] = 'null';
      }
    }
  }
  if (!empty($_FILES)) {
    $_AAux = array_merge($_AAux, $_FILES);
}
  return $_AAux;
}



function verEstructura($e)
{
  echo "<pre>";
  print_r($e);
  echo "</pre>";
}

function my_autoload($class_name)
{
  $directorys = array(
    $_SESSION['ROOT'] . 'Modelo/',
    $_SESSION['ROOT'] . 'Modelo/conector/',
    $_SESSION['ROOT'] . 'Control/',
  );

  foreach ($directorys as $directory) {
    if (file_exists($directory . $class_name . '.php')) {
      require_once($directory . $class_name . '.php');
      return;
    }
  }
}

spl_autoload_register('my_autoload');
