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
        $query = "insert into usuarios(nome, email,senha)values(:nome,:email,:senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->_get('name'));
        $stmt->bindValue(':email', $this->_get('email'));
        $stmt->bindValue(':senha', $this->_get('senha'));
        $stmt->execute();

        return $this;
    }

    public function autenticar()
    {
        $query = "select id, nome, email from usuarios where email = :email and senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->_get('email'));
        $stmt->bindValue(':senha', $this->_get('senha'));
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($usuario['id'] != '' && $usuario['nome'] != '') {
            $this->_set('id', $usuario['id']);
            $this->_set('nome', $usuario['nome']);
        }


        return $this;
    }
}
