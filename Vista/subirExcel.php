<?php
$title = "Subir Excel";
include_once('../Vista/Estructura/header.php');
?>
<main class="text-light bg-dark d-flex align-items-center justify-content-center flex-column mt-5">
  <h2>Subir Archivo</h2>
  <form action="accion/actionSubirExcel.php" method="post" enctype="multipart/form-data">
    <label for="miArchivo">Elige un archivo (.xlsx):</label><br><br>
    <input type="file" name="miArchivo" id="miArchivo" class="border rounded border-secondary p-1"><br><br>
    <input type="submit" class="bg-info w-100 border rounded border-secondary" value="Subir Archivo">
  </form>
</main>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        const fileInput = document.getElementById('miArchivo');
        const filePath = fileInput.value;

        // Verificar la extensión del archivo
        const allowedExtensions = /(\.xlsx|\.xls)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Por favor, sube un archivo de Excel (.xlsx).');
            fileInput.value = ''; // Limpiar el campo
            event.preventDefault(); // Prevenir el envío del formulario
        }
    });
</script>
<?php
include_once('../Vista/Estructura/footer.php');
?>