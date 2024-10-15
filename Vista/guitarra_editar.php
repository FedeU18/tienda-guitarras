<?php
$title = "Ejemplo";
$jsFileFooter = "./Assets/validacion.js";
include_once('../Vista/Estructura/header.php');
include_once '../config.php';
$objAbmGuitarra = new AbmGuitarra();
$datos = data_submitted();
$obj = NULL;
if (isset($datos['id'])) {
  $listaGuitarra = $objAbmGuitarra->buscar($datos);
  if (count($listaGuitarra) == 1) {
    $obj = $listaGuitarra[0];
  }
}
?>
  <h3>Guitarra</h3>
  <?php if ($obj != null) { ?>
    <form method="post" action="accion/abmGuitarra.php">
      <label>ID</label><br />
      <input id="id" readonly name="id" width="80" type="text" value="<?php echo $obj->getId() ?>"><br />
      <label>Marca</label><br />
      <input id="marca" name="marca" type="text" value="<?php echo $obj->getMarca() ?>"><br />
      <label>Modelo</label><br />
      <input id="modelo" name="modelo" type="text" value="<?php echo $obj->getModelo() ?>"><br />
      <label>Tipo</label><br />
      <input id="tipo" name="tipo" type="text" value="<?php echo $obj->getTipo() ?>"><br />
      <label>Precio</label><br />
      <input id="precio" name="precio" type="text" value="<?php echo $obj->getPrecio() ?>"><br />
      <label>Stock</label><br />
      <input id="stock" name="stock" type="text" value="<?php echo $obj->getStock() ?>"><br />
      <label>Fecha de Ingreso</label><br />
      <input id="fecha_ingreso" name="fecha_ingreso" type="date" value="<?php echo $obj->getFechaIngreso() ?>"><br />
      <input id="accion" name="accion" value="editar" type="hidden">
      <input type="submit">
    </form>
  <?php } else {
    echo "<p>No se encontró la clave que desea modificar</p>";
  } ?>
  <br>
  <a href="Guitarra.php">Volver</a>
<?php
include_once('../Vista/Estructura/footer.php');
?>