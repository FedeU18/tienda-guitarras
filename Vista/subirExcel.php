<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<main class="text-light bg-dark d-flex align-items-center justify-content-center flex-column mt-5">
  <h2>Subir Archivo</h2>
  <form action="./Action//actionSubirExcel.php" method="post" enctype="multipart/form-data">
    <label for="miArchivo">Elige un archivo (.xlsx):</label><br><br>
    <input type="file" name="miArchivo" id="miArchivo" class="border rounded border-secondary p-1"><br><br>
    <input type="submit" class="bg-info w-100 border rounded border-secondary" value="Subir Archivo">
  </form>
</main>    
</body>
</html>