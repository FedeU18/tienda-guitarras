<?php
$title = "Editar Guitarra";
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
<div class="container mt-4">
  <h3 class="mb-4">Editar Guitarra</h3>
  <?php if ($obj != null) { ?>
    <form method="post" action="accion/abmGuitarra.php" class="needs-validation" novalidate>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="id">ID</label>
          <input id="id" name="id" type="text" class="form-control" readonly value="<?php echo $obj->getId() ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="marca">Marca</label>
          <input id="marca" name="marca" type="text" class="form-control" value="<?php echo $obj->getMarca() ?>" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="modelo">Modelo</label>
          <input id="modelo" name="modelo" type="text" class="form-control" value="<?php echo $obj->getModelo() ?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="tipo">Tipo</label>
          <input id="tipo" name="tipo" type="text" class="form-control" value="<?php echo $obj->getTipo() ?>" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="precio">Precio</label>
          <input id="precio" name="precio" type="text" class="form-control" value="<?php echo $obj->getPrecio() ?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="stock">Stock</label>
          <input id="stock" name="stock" type="text" class="form-control" value="<?php echo $obj->getStock() ?>" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="fecha_ingreso">Fecha de Ingreso</label>
          <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="form-control" value="<?php echo $obj->getFechaIngreso() ?>" required>
        </div>
      </div>

      <input id="accion" name="accion" value="editar" type="hidden">
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
  <?php } else { ?>
    <div class="alert alert-danger mt-4">
      <p>No se encontró la clave que desea modificar.</p>
    </div>
  <?php } ?>
  <br>
  <a href="Guitarra.php" class="btn btn-secondary">Volver</a>
</div>

<?php
include_once('../Vista/Estructura/footer.php');
?>