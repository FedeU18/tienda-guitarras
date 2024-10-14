<?php
class AbmGuitarra
{
  private function cargarObjeto($param)
  {
    $obj = null;
    if (
      array_key_exists('id', $param) and array_key_exists('marca', $param) and array_key_exists('modelo', $param)
      and array_key_exists('tipo', $param) and array_key_exists('precio', $param)
      and array_key_exists('stock', $param) and array_key_exists('fecha_ingreso', $param)
    ) {
      $obj = new Guitarra();
      $obj->setear(
        $param['id'],
        $param['marca'],
        $param['modelo'],
        $param['tipo'],
        $param['precio'],
        $param['stock'],
        $param['fecha_ingreso']
      );
    }
    return $obj;
  }

  private function cargarObjetoConClave($param)
  {
    $obj = null;
    if (isset($param['id'])) {
      $obj = new Guitarra();
      $obj->setId($param['id']);
    }
    return $obj;
  }

  private function seteadosCamposClaves($param)
  {
    return isset($param['id']);
  }

  public function alta($param)
  {
    $resp = false;
    $param['id'] = null;
    $elObjtGuitarra = $this->cargarObjeto($param);
    if ($elObjtGuitarra != null and $elObjtGuitarra->insertar()) {
      $resp = true;
    }
    return $resp;
  }

  public function baja($param)
  {
    $resp = false;
    if ($this->seteadosCamposClaves($param)) {
      $elObjtGuitarra = $this->cargarObjetoConClave($param);
      if ($elObjtGuitarra != null and $elObjtGuitarra->eliminar()) {
        $resp = true;
      }
    }
    return $resp;
  }

  public function modificacion($param)
  {
    $resp = false;
    if ($this->seteadosCamposClaves($param)) {
      $elObjtGuitarra = $this->cargarObjeto($param);
      if ($elObjtGuitarra != null and $elObjtGuitarra->modificar()) {
        $resp = true;
      }
    }
    return $resp;
  }

  public function buscar($param)
  {
    $where = " true ";
    if ($param <> NULL) {
      if (isset($param['id'])) $where .= " and id =" . $param['id'];
      if (isset($param['marca'])) $where .= " and marca ='" . $param['marca'] . "'";
      if (isset($param['modelo'])) $where .= " and modelo ='" . $param['modelo'] . "'";
      if (isset($param['tipo'])) $where .= " and tipo ='" . $param['tipo'] . "'";
      if (isset($param['precio'])) $where .= " and precio =" . $param['precio'];
      if (isset($param['stock'])) $where .= " and stock =" . $param['stock'];
      if (isset($param['fecha_ingreso'])) $where .= " and fecha_ingreso ='" . $param['fecha_ingreso'] . "'";
    }
    $guitarra = new Guitarra();
    $arreglo = $guitarra->listar($where);
    return $arreglo;
  }
}
