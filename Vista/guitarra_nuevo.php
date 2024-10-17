<?php
$title = "Crear Guitarra";
$jsFileFooter = "./Assets/validacion.js";
include_once('../Vista/Estructura/header.php');
?>
<div class="container mt-4">
  <h3>Guitarra</h3>
  <form method="post" action="accion/abmGuitarra.php" novalidate>
    <div class="form-group">
      <label for="marca">Marca</label>
      <input id="marca" name="marca" type="text" class="form-control" placeholder="Ingrese la marca" required>
    </div>
    <div class="form-group">
      <label for="modelo">Modelo</label>
      <input id="modelo" name="modelo" type="text" class="form-control" placeholder="Ingrese el modelo" required>
    </div>
    <div class="form-group">
      <label for="tipo">Tipo</label>
      <input id="tipo" name="tipo" type="text" class="form-control" placeholder="Ingrese el tipo de guitarra" required>
    </div>
    <div class="form-group">
      <label for="precio">Precio</label>
      <input id="precio" name="precio" type="text" class="form-control" placeholder="Ingrese el precio" required>
    </div>
    <div class="form-group">
      <label for="stock">Stock</label>
      <input id="stock" name="stock" type="text" class="form-control" placeholder="Ingrese el stock disponible" required>
    </div>
    <div class="form-group">
      <label for="fecha_ingreso">Fecha de Ingreso</label>
      <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="form-control" required>
    </div>
    <input id="accion" name="accion" value="nuevo" type="hidden">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
  <br><br>
  <a href="Guitarra.php" class="btn btn-secondary">Volver</a>
</div>
<?php
include_once('../Vista/Estructura/footer.php');
?>