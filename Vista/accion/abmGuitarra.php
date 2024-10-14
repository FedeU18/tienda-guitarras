<?php
include_once '../../config.php';
$datos = data_submitted();
// verEstructura($datos);
$resp = false;
$objTrans = new AbmGuitarra();
if (isset($datos['accion'])) {
  if ($datos['accion'] == 'editar') {
    if ($objTrans->modificacion($datos)) {
      $resp = true;
    }
  }
  if ($datos['accion'] == 'borrar') {
    if ($objTrans->baja($datos)) {
      $resp = true;
    }
  }
  if ($datos['accion'] == 'nuevo') {
    if ($objTrans->alta($datos)) {
      $resp = true;
    }
  }
  $mensaje = $resp ? "La acción " . $datos['accion'] . " se realizó correctamente." : "La acción " . $datos['accion'] . " no pudo concretarse.";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <title>Ejemplo</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
  <h3>Guitarra</h3>
  <br><a href="../Guitarra.php">Volver</a><br>
  <?php echo $mensaje; ?>
</body>

</html>