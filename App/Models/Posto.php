<?php
namespace App\Models;
use MF\Model\Model;

class Posto extends Model{
    protected $table = 'postos';
    private $values = 'cnpj, email, cep, estado, bairro, numero, nomeFantasia, telefone, cidade, logradouro, complemento';
    private $cnpj;
    private $email;
    private $telefone;
    private $cep;
    private $cidade;
    private $estado;
    private $logradouro;
    private $bairro;
    private $numero;
    private $complemento;
    private $nomeFantasia;

    public function _set($atributo, $valor){
        $this->{$atributo} = $valor;
        return $this;
    }

    public function _get($atributo){
        return $this->{$atributo};
    }

    public function salvar($id = null){
        $sql = "INSERT INTO $this->table ($this->values) VALUES (:cnpj, :email, :cep, :estado, :bairro, :numero, :nomeFantasia, :telefone, :cidade, :logradouro, :complemento)";
        if($id){
            $sql = "UPDATE $this->table SET cnpj = :cnpj, email = :email, cep= :cep, estado = :estado, bairro = :bairro, numero = :numero, nomeFantasia= :nomeFantasia, telefone =  :telefone, cidade = :cidade, logradouro = :logradouro, complemento = :complemento WHERE id = $id";
        }
       
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cnpj', $this->cnpj);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':cep', $this->cep);
        $stmt->bindValue(':estado', $this->estado);
        $stmt->bindValue(':bairro', $this->bairro);
        $stmt->bindValue(':numero', $this->numero);
        $stmt->bindValue(':nomeFantasia', $this->nomeFantasia);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':cidade', $this->cidade);
        $stmt->bindValue(':logradouro', $this->logradouro);
        $stmt->bindValue(':complemento', $this->complemento);

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
            $where .= " AND id = {$options['id']}";
        }
        
        if($options['cnpj']){
            $where .= " AND cnpj = {$options['cnpj']}";
        }

        if($options['nome']){
            $where .= " AND nomeFantasia LIKE '%{$options['nome']}%'";
        }

        if($options['cidade']){
            $where .= " AND cidade LIKE '%{$options['cidade']}%'";
        }
        
        $sql = "SELECT * FROM $this->table WHERE deleted = 0 $where";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}