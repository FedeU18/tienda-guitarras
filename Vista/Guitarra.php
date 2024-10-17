<?php
$title = "Ejemplo";
include_once('../Vista/Estructura/header.php');
include_once "../config.php";
$objAbmGuitarra = new AbmGuitarra();
$listaGuitarra = $objAbmGuitarra->buscar(null);
?>

<div class="container mt-4">
  <h3>ABM - Guitarra</h3>
  <div class="d-flex flex-row w-100 justify-content-between">
    <a href="guitarra_nuevo.php" class="btn btn-primary mb-3">Nuevo</a>
    <form action="accion/descargarExcel.php" method="get">
      <input type="submit" class="btn btn-info mb-3" value="Descargar info en excel" />
    </form>
  </div>
  <table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Marca y Modelo</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (count($listaGuitarra) > 0) {
        foreach ($listaGuitarra as $objGuitarra) {
          echo '<tr>';
          echo '<td style="width:500px;">' . $objGuitarra->getMarca() . ' ' . $objGuitarra->getModelo() . '</td>';
          echo '<td>';
          echo '<a href="guitarra_editar.php?id=' . $objGuitarra->getId() . '" class="btn btn-warning btn-sm">Editar</a> ';
          echo '<a href="accion/abmGuitarra.php?accion=borrar&id=' . $objGuitarra->getId() . '" class="btn btn-danger btn-sm">Borrar</a>';
          echo '</td>';
          echo '</tr>';
        }
      } else {
        echo '<tr><td colspan="2" class="text-center">No hay guitarras registradas</td></tr>';
      }
      ?>
    </tbody>
  </table>
</div>

<?php
include_once('../Vista/Estructura/footer.php');
?>