<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php
  if (isset($cssFile)) {
    echo '<link rel="stylesheet" href="' . $cssFile . '">';
  }
  if (isset($jsFileFooter)) {
    echo '<script src="' . $jsFileFooter . '"></script>';
  }
  if (isset($title)) {
    echo '<title>' . $title . '</title>';
  }
  ?>
  <title>Document</title>
</head>

<body class="vh-100 d-flex flex-column justify-between">
  <header class="w-100">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <img src="img/pancho.png" height="100px">
        <ul class="navbar-nav w-50 d-flex justify-between align-center">
          <!-- Dropdown -->
          <li class="ml-5 nav-item dropdown">
            <button class="btn btn-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              TP Utiles
            </button>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./Guitarra.php">Lista de Guitarras</a>
              <a class="dropdown-item" href="./guitarra_nuevo.php">Guitarra Nueva</a>
              <a class="dropdown-item" href="./ver_guitarras.php">Ver Guitarras</a>
            </div>
          </li>

        </ul>
      </div>
    </nav>
  </header>