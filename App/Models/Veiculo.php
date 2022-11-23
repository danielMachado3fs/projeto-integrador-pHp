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
  private $dataAquisicao;
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
    $query = "SELECT marca FROM veiculo WHERE deletado=0";
    return $this->db->query($query)->fetchAll();
  }

  public function getTypes()
  {
    $query = "SELECT tipo FROM veiculo WHERE deletado=0";
    return $this->db->query($query)->fetchAll();
  }

  public function deleteVehicle($vehicleId)
  {
    $query = "UPDATE veiculo SET deletado=:deletado WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->execute(array('id' => $vehicleId, 'deletado' => 1));
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

  public function updateVehicle()
  {
    $query = "UPDATE veiculo SET placa = :placa, modelo = :modelo, marca = :marca, anoFabricacao =:anoFabricacao, tipo= :tipo, dataAquisicao=:dataAquisicao, valor=:valor WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->execute(array('id' => $this->id, 'placa' => $this->placa, 'marca' => $this->marca, 'anoFabricacao' => $this->anoFabricacao, 'tipo' => $this->tipo, 'dataAquisicao' => $this->dataAquisicao, 'valor' => $this->valor, "modelo" => $this->modelo));
    return $stmt->rowCount();
  }

  public function addVehicle()
  {
    $query = "INSERT INTO veiculo ( placa, modelo, marca, anoFabricacao, tipo, dataAquisicao, valor) VALUES (:placa,  :modelo,  :marca, :anoFabricacao,  :tipo, :dataAquisicao,:valor)";
    $stmt = $this->db->prepare($query);
    $stmt->execute(array('placa' => $this->placa, 'marca' => $this->marca, 'anoFabricacao' => $this->anoFabricacao, 'tipo' => $this->tipo, 'dataAquisicao' => $this->dataAquisicao, 'valor' => $this->valor, "modelo" => $this->modelo));
    return $stmt->errorInfo();
  }
}