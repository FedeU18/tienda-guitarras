<?php
include_once "../config.php";
$objAbmGuitarra = new AbmGuitarra();
$listaGuitarra = $objAbmGuitarra->buscar(null);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <title>Ejemplo</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
  <h3>ABM - Guitarra</h3>
  <a href="guitarra_nuevo.php">nuevo</a>
  <table border="1">
    <?php
    if (count($listaGuitarra) > 0) {
      foreach ($listaGuitarra as $objGuitarra) {
        echo '<tr><td style="width:500px;">' . $objGuitarra->getMarca() . ' ' . $objGuitarra->getModelo() . '</td>';
        echo '<td><a href="guitarra_editar.php?id=' . $objGuitarra->getId() . '">editar</a></td>';
        echo '<td><a href="accion/abmGuitarra.php?accion=borrar&id=' . $objGuitarra->getId() . '">borrar</a></td></tr>';
      }
    }
    ?>
  </table>
</body>

</html>