<?php
class Guitarra
{
  private $id;
  private $marca;
  private $modelo;
  private $tipo;
  private $precio;
  private $stock;
  private $fecha_ingreso;
  private $mensajeoperacion;

  public function __construct()
  {
    $this->id = "";
    $this->marca = "";
    $this->modelo = "";
    $this->tipo = "";
    $this->precio = 0.00;
    $this->stock = 0;
    $this->fecha_ingreso = "";
    $this->mensajeoperacion = "";
  }

  public function setear($id, $marca, $modelo, $tipo, $precio, $stock, $fecha_ingreso)
  {
    $this->setId($id);
    $this->setMarca($marca);
    $this->setModelo($modelo);
    $this->setTipo($tipo);
    $this->setPrecio($precio);
    $this->setStock($stock);
    $this->setFechaIngreso($fecha_ingreso);
  }

  public function getId()
  {
    return $this->id;
  }
  public function setId($valor)
  {
    $this->id = $valor;
  }

  public function getMarca()
  {
    return $this->marca;
  }
  public function setMarca($valor)
  {
    $this->marca = $valor;
  }

  public function getModelo()
  {
    return $this->modelo;
  }
  public function setModelo($valor)
  {
    $this->modelo = $valor;
  }

  public function getTipo()
  {
    return $this->tipo;
  }
  public function setTipo($valor)
  {
    $this->tipo = $valor;
  }

  public function getPrecio()
  {
    return $this->precio;
  }
  public function setPrecio($valor)
  {
    $this->precio = $valor;
  }

  public function getStock()
  {
    return $this->stock;
  }
  public function setStock($valor)
  {
    $this->stock = $valor;
  }

  public function getFechaIngreso()
  {
    return $this->fecha_ingreso;
  }
  public function setFechaIngreso($valor)
  {
    $this->fecha_ingreso = $valor;
  }

  public function getMensajeOperacion()
  {
    return $this->mensajeoperacion;
  }
  public function setMensajeOperacion($valor)
  {
    $this->mensajeoperacion = $valor;
  }

  public function cargar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "SELECT * FROM guitarras WHERE id = " . $this->getId();
    if ($base->Iniciar()) {
      $res = $base->Ejecutar($sql);
      if ($res > -1) {
        if ($res > 0) {
          $row = $base->Registro();
          $this->setear($row['id'], $row['marca'], $row['modelo'], $row['tipo'], $row['precio'], $row['stock'], $row['fecha_ingreso']);
        }
      }
    } else {
      $this->setMensajeOperacion("Guitarra->cargar: " . $base->getError());
    }
    return $resp;
  }

  public function insertar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "INSERT INTO guitarras(marca, modelo, tipo, precio, stock, fecha_ingreso) 
                VALUES('" . $this->getMarca() . "', '" . $this->getModelo() . "', '" . $this->getTipo() . "', 
                       " . $this->getPrecio() . ", " . $this->getStock() . ", '" . $this->getFechaIngreso() . "');";
    if ($base->Iniciar()) {
      if ($elid = $base->Ejecutar($sql)) {
        $this->setId($elid);
        $resp = true;
      } else {
        $this->setMensajeOperacion("Guitarra->insertar: " . $base->getError());
      }
    } else {
      $this->setMensajeOperacion("Guitarra->insertar: " . $base->getError());
    }
    return $resp;
  }

  public function modificar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "UPDATE guitarras SET marca='" . $this->getMarca() . "', modelo='" . $this->getModelo() . "', tipo='" . $this->getTipo() . "', 
                precio=" . $this->getPrecio() . ", stock=" . $this->getStock() . ", fecha_ingreso='" . $this->getFechaIngreso() . "' 
                WHERE id=" . $this->getId();
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setMensajeOperacion("Guitarra->modificar: " . $base->getError());
      }
    } else {
      $this->setMensajeOperacion("Guitarra->modificar: " . $base->getError());
    }
    return $resp;
  }

  public function eliminar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "DELETE FROM guitarras WHERE id=" . $this->getId();
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setMensajeOperacion("Guitarra->eliminar: " . $base->getError());
      }
    } else {
      $this->setMensajeOperacion("Guitarra->eliminar: " . $base->getError());
    }
    return $resp;
  }

  public function listar($parametro = "")
  {
    $arreglo = array();
    $base = new BaseDatos();
    $sql = "SELECT * FROM guitarras";
    if ($parametro != "") {
      $sql .= " WHERE " . $parametro;
    }
    $res = $base->Ejecutar($sql);
    if ($res > -1) {
      if ($res > 0) {
        while ($row = $base->Registro()) {
          $obj = new Guitarra();
          $obj->setear($row['id'], $row['marca'], $row['modelo'], $row['tipo'], $row['precio'], $row['stock'], $row['fecha_ingreso']);
          array_push($arreglo, $obj);
        }
      }
    } else {
      $this->setMensajeOperacion("Guitarra->listar: " . $base->getError());
    }
    return $arreglo;
  }
}
