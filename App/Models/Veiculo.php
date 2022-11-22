<?php

namespace App\Models;

use MF\Model\Model;

class Veiculo extends Model
{

  private $marca;
  private $modelo;
  private $tipo;
  private $placa;
  private $anoFabricacao;
  private $anoRequisicao;
  private $valor;
  private $id;


  public function _set($atributo, $valor)
  {
    $this->{$atributo} = $valor;
    return $this;
  }

  public function _get($atributo)
  {
    return $this->{$atributo};
  }

  public function getVehicles()
  {
    $query = "SELECT * FROM veiculo";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
      $veiculos[] = $row;
    }

    return $veiculos;
  }

  public function getVeiculosByTypeAndBrand()
  {
    if ($this->marca == "all") {
      $query = "SELECT * FROM veiculo WHERE tipo = :tipo";
      $params = array('tipo' => $this->tipo);
    } elseif ($this->tipo == "all") {
      $query = "SELECT * FROM veiculo WHERE marca = :marca";
      $params = array('marca' => $this->marca);
    } else {
      $query = "SELECT * FROM veiculo WHERE marca = :marca AND tipo = :tipo";
      $params = array('marca' => $this->marca, 'tipo' => $this->tipo);
    }
    $stmt = $this->db->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll();
  }

  public function getBrands()
  {
    $query = "select marca from veiculo";
    return $this->db->query($query)->fetchAll();
  }

  public function getTypes()
  {
    $query = "select tipo from veiculo";
    return $this->db->query($query)->fetchAll();
  }

  public function deleteVehicle($vehicleId)
  {
    $query = "UPDATE veiculo SET deleted=:deleted WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->execute(array('id' => $vehicleId, 'deleted' => 1));
  }

  public function viewVehicle($vehicleId)
  {
    $query = "SELECT * FROM veiculo WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->execute(array('id' => $vehicleId));
    $veiculos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // echo json_encode($veiculos);
    return ($veiculos);
  }
}