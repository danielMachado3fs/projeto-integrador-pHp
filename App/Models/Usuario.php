<?php

namespace App\Models;

use MF\Model\Model;
use SQLite3Stmt;

class Usuario extends Model
{

    private $id;
    private $nome;
    private $email;
    private $senha;

    public function _get($atributo)
    {
        return $this->$atributo;
    }

    public function _set($atributo, $valor)
    {
        return $this->$atributo = $valor;
    }

    public function salvar()
    {
        $query = "INSERT INTO usuarios(nome, email,senha) VALUES(:nome,:email,:senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->_get('name'));
        $stmt->bindValue(':email', $this->_get('email'));
        $stmt->bindValue(':senha', $this->_get('senha'));
        $stmt->execute();
        if($stmt->execute()){
            return $this;
        }else{
            return null;
        }
    }

    public function autenticar()
    {
        $query = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_OBJ);

        if ($usuario && $usuario->id) {
            return $usuario;
        }
        return null;
    }
}