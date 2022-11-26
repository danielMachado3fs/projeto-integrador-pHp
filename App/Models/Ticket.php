<?php
namespace App\Models;
use MF\Model\Model;

class Ticket extends Model{
    protected $table = 'tickets';
    private $values = 'motoristaId, postoCombustivelId, veiculoId, tipoCombustivel, valor, dataEmissao, dataValidade';
    private $motoristaId;
    private $postoCombustivelId;
    private $tipoCombustivel;
    private $veiculoId;
    private $valor;
    private $dataEmissao;
    private $dataValidade;

    public function _set($atributo, $valor){
        $this->{$atributo} = $valor;
        return $this;
    }

    public function _get($atributo){
        return $this->{$atributo};
    }

    public function salvar($id = null){
        $sql = "INSERT INTO $this->table ($this->values) VALUES (:motoristaId, :postoCombustivelId, :veiculoId, :tipoCombustivel, :valor, :dataEmissao, :dataValidade)";
        if($id){
            $sql = "UPDATE $this->table SET motoristaId = :motoristaId, postoCombustivelId = :postoCombustivelId, veiculoId = :veiculoId, tipoCombustivel = :tipoCombustivel, valor = :valor, dataEmissao = :dataEmissao, dataValidade, = :dataValidade, status = :status WHERE id = $id";
        }
       
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':motoristaId', intval($this->motoristaId));
        $stmt->bindValue(':postoCombustivelId', intval($this->postoCombustivelId));
        $stmt->bindValue(':veiculoId', intval($this->veiculoId));
        $stmt->bindValue(':tipoCombustivel', $this->tipoCombustivel);
        $stmt->bindValue(':valor', $this->valor);
        $stmt->bindValue(':dataEmissao', $this->dataEmissao);
        $stmt->bindValue(':dataValidade', $this->dataValidade);
        if($id){
            $stmt->bindValue(':status', $this->status);
        }

        if($stmt->execute() && !$id){
            return $this->db->lastInsertId();
        }else if($stmt->execute() && $id){
            return $id;
        }
        return $stmt->errorInfo();
    }

    public function getAllWhere($options = array()){
        $where = '';
        if($options['id']){
            $where .= " AND id = '{$options['id']}'";
        }
        
        if($options['motoristaId']){
            $where .= " AND motoristaId = {$options['motoristaId']}";
        }

        if($options['postoId']){
            $where .= " AND postoId = {$options['postoId']}";
        }

        if($options['veiculoId']){
            $where .= " AND veiculoId = {$options['veiculoId']}";
        }

        if($options['tipoCombustivel']){
            $where .= " AND tipoCombustivel LIKE '%{$options['tipoCombustivel']}%'";
        }
        
        $sql = "SELECT `$this->table`.*,
                `funcionarios`.nome as nomeMotorista,
                `postos`.nomeFantasia as nomePosto,
                `veiculos`.modelo as veiculo,
                `veiculos`.placa as veiculoPlaca
                FROM `$this->table` 
                LEFT JOIN `funcionarios` ON `funcionarios`.id = `$this->table`.motoristaId
                LEFT JOIN `postos` ON `postos`.id = `$this->table`.postoCombustivelId
                LEFT JOIN `veiculos` ON `veiculos`.id = `$this->table`.veiculoId
                WHERE `$this->table`.deleted = 0 $where";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

}