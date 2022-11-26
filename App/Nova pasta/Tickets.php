<?php

namespace App\Models;

use MF\Model\Model;

class Tickets extends Model
{

  public function getTickets()
  {  $query ="SELECT motorista, postos,tiposCombustiveis,valor,dateEmissao,dateValidade FROM registration";
    return $this->db->query($query)->fetchAll();
  }
  
}