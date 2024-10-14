<?php
class Carrito
{
  private $items;

  public function __construct()
  {
    $this->items = array();
  }

  public function agregar($idGuitarra)
  {
    if (isset($this->items[$idGuitarra])) {
      $this->items[$idGuitarra]++;
    } else {
      $this->items[$idGuitarra] = 1;
    }
  }

  public function getItems()
  {
    return $this->items;
  }
}
