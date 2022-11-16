<?php

namespace App\Models;

use MF\Model\Model;

class Veiculo extends Model
{

  public function getVeiculos()
  {
    $query = "select * from veiculo";
    return $this->db->query($query)->fetchAll();
  }

  public function getTipos()
  {
    $query = "select marca from veiculo";
    return $this->db->query($query)->fetchAll();
  }
}