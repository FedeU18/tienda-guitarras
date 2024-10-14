<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <title>Ejemplo</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
  <h3>Guitarra</h3>
  <form method="post" action="accion/abmGuitarra.php">
    <label>Marca</label><br />
    <input id="marca" name="marca" type="text"><br />
    <label>Modelo</label><br />
    <input id="modelo" name="modelo" type="text"><br />
    <label>Tipo</label><br />
    <input id="tipo" name="tipo" type="text"><br />
    <label>Precio</label><br />
    <input id="precio" name="precio" type="text"><br />
    <label>Stock</label><br />
    <input id="stock" name="stock" type="text"><br />
    <label>Fecha de Ingreso</label><br />
    <input id="fecha_ingreso" name="fecha_ingreso" type="date"><br />
    <input id="accion" name="accion" value="nuevo" type="hidden">
    <input type="submit">
  </form>
  <br><br>
  <a href="fguitarra.php">Volver</a>
</body>

</html>