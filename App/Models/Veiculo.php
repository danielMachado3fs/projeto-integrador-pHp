<?php

namespace App\Models;

use MF\Model\Model;

class Veiculo extends Model
{
  protected $table = 'veiculo';
  private $marca;
  private $modelo;
  private $tipo;
  private $placa;
  private $anoFabricacao;
  private $dataAquisicao;
  private $valor;



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
    $query = "SELECT * FROM $this->table";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
      $veiculos[] = $row;
    }

    return $veiculos;
  }

  public function getVeiculosByTypeAndMake()
  {
    if ($this->marca == "all") {
      $query = "SELECT * FROM $this->table WHERE tipo = :tipo";
      $params = array('tipo' => $this->tipo);
    } elseif ($this->tipo == "all") {
      $query = "SELECT * FROM $this->table WHERE marca = :marca";
      $params = array('marca' => $this->marca);
    } else {
      $query = "SELECT * FROM $this->table WHERE marca = :marca AND tipo = :tipo";
      $params = array('marca' => $this->marca, 'tipo' => $this->tipo);
    }
    $stmt = $this->db->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll();
  }

  public function getMakes()
  {
    $query = "SELECT marca FROM $this->table WHERE deleted=0";
    return $this->db->query($query)->fetchAll();
  }

  public function getTypes()
  {
    $query = "SELECT tipo FROM $this->table WHERE deleted=0";
    return $this->db->query($query)->fetchAll();
  }

  public function deleteVehicle($vehicleId)
  {
    $query = "UPDATE veiculo SET deleted=:deleted WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $result=$stmt->execute(array('id' => $vehicleId, 'deleted' => 1));
    if($result){
      return $stmt->rowCount();
    }
    return $stmt->errorInfo();
  
  }

  public function viewVehicle($vehicleId)
  {
    $query = "SELECT * FROM $this->table WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->execute(array('id' => $vehicleId));
    $veiculos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // echo json_encode($veiculos);
    return ($veiculos);
  }

  public function updateVehicle($vehicleId)
  {
    $query = "UPDATE veiculo SET placa = :placa, modelo = :modelo, marca = :marca, anoFabricacao =:anoFabricacao, tipo= :tipo, dataAquisicao=:dataAquisicao, valor=:valor WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $result =  $stmt->execute(array('id' => $vehicleId, 'placa' => $this->placa, 'marca' => $this->marca, 'anoFabricacao' => $this->anoFabricacao, 'tipo' => $this->tipo, 'dataAquisicao' => $this->dataAquisicao, 'valor' => $this->valor, "modelo" => $this->modelo));
    
    if($result){
      return $stmt->rowCount();
    }
    return $stmt->errorInfo();
  }

  public function addVehicle()
  {
    $query = "INSERT INTO veiculo ( placa, modelo, marca, anoFabricacao, tipo, dataAquisicao, valor) VALUES (:placa,  :modelo,  :marca, :anoFabricacao,  :tipo, :dataAquisicao,:valor)";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':placa', $this->placa);
    $stmt->bindValue(':modelo', $this->modelo);
    $stmt->bindValue(':marca', $this->marca);
    $stmt->bindValue(':anoFabricacao', $this->anoFabricacao);
    $stmt->bindValue(':tipo', $this->tipo);
    $stmt->bindValue(':dataAquisicao', $this->dataAquisicao);
    $stmt->bindValue(':valor', $this->valor);

    if($stmt->execute()){
      return $this->db->lastInsertId();
    }
    return $stmt->errorInfo();
}

  
}