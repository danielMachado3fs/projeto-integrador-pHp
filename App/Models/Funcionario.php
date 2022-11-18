<?php
namespace App\Models;
use MF\Model\Model;

class Funcionario extends Model{
    private $table = 'Funcionarios';
    private $values = 'nome, dataNascimento, cpf, email, telefone, cep, cidade,estado, logradouro, bairro, numero, complemento, setor';
    private $nome;
    private $dataNascimento;
    private $cpf;
    private $email;
    private $telefone;
    private $cep;
    private $cidade;
    private $estado;
    private $logradouro;
    private $bairro;
    private $numero;
    private $complemento;
    private $setor;

    public function _set($atributo, $valor){
        $this->{$atributo} = $valor;
        return $this;
    }

    public function _get($atributo){
        return $this->{$atributo};
    }

    public function salvar($id = null){
        $sql = "INSERT INTO $this->table ($this->values) VALUES (:nome, :dataNascimento, :cpf, :email, :telefone, :cep, :cidade, :estado, :logradouro, :bairro, :numero, :complemento, :setor)";
        if($id){
            $sql = "UPDATE $this->table SET nome = :nome, dataNascimento = :dataNascimento, cpf = :cpf, email = :email, telefone = :telefone, cep = :cep, cidade = :cidade, estado = :estado, logradouro = :logradouro, bairro = :bairro, numero = :numero, complemento = :complemento, setor = :setor WHERE id = $id";
        }
       
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':dataNascimento', $this->dataNascimento);
        $stmt->bindValue(':cpf', $this->cpf);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':cep', $this->cep);
        $stmt->bindValue(':cidade', $this->cidade);
        $stmt->bindValue(':estado', $this->estado);
        $stmt->bindValue(':logradouro', $this->logradouro);
        $stmt->bindValue(':bairro', $this->bairro);
        $stmt->bindValue(':numero', $this->numero);
        $stmt->bindValue(':complemento', $this->complemento);
        $stmt->bindValue(':setor', $this->setor);

        if($stmt->execute() && !$id){
            return $this->db->lastInsertId();
        }else if($stmt->execute() && $id){
            return $id;
        }
        return $stmt->errorInfo();
    }

    public function add($funcionario){

    }

    public function getOne($id){
        $sql = "SELECT * FROM $this->table WHERE deleted = 0 AND id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getAllWhere($options = array()){
        $where = '';
        if($options['id']){
            $where .= " AND id = {$options['id']}";
        }
        
        if($options['setor']){
            $where .= " AND setor = {$options['setor']}";
        }

        if($options['estado']){
            $where .= " AND estado = {$options['estado']}";
        }
        
        $sql = "SELECT * FROM $this->table WHERE deleted = 0 $where";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

}