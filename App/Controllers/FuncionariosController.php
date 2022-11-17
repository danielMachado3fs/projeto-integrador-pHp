<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

//os models


class FuncionariosController extends Action {
	private $funcionarioModel;

	public function __construct(){
		$this->funcionarioModel = Container::getModel('Funcionario');
	}

	public function index() {

		// $produto = Container::getModel('Produto');

		// $produtos = $produto->getProdutos();

		// @$this->view->dados = $produtos;

		// $this->render('index');
    }

	public function add() {

		$this->render('add');
    }

	public function add_store(){
		$this->funcionarioModel->_set('nome', $_POST['nome'])
		->_set('dataNascimento', $_POST['dataNascimento'])
		->_set('cpf', $_POST['cpf'])
		->_set('email', $_POST['email'])
		->_set('telefone', $_POST['telefone'])
		->_set('cep', $_POST['cep'])
		->_set('cidade', $_POST['cidade'])
		->_set('estado', $_POST['estado'])
		->_set('logradouro', $_POST['logradouro'])
		->_set('bairro', $_POST['bairro'])
		->_set('numero', $_POST['numero'])
		->_set('complemento', $_POST['complemento'])
		->_set('setor', $_POST['setor']);

		$save_id = $this->funcionarioModel->salvar();
		if($save_id){
			$this->index();
		}

	}

	public function update(){
		$profissional = 
		$this->render('update');
	}

	public function update_store(){
		$funcionarioModel = Container::getModel('Funcionario');
		$funcionarioModel->_set('nome', $_POST['nome'])
		->_set('dataNascimento', $_POST['dataNascimento'])
		->_set('cpf', $_POST['cpf'])
		->_set('email', $_POST['email'])
		->_set('telefone', $_POST['telefone'])
		->_set('cep', $_POST['cep'])
		->_set('cidade', $_POST['cidade'])
		->_set('estado', $_POST['estado'])
		->_set('logradouro', $_POST['logradouro'])
		->_set('bairro', $_POST['bairro'])
		->_set('numero', $_POST['numero'])
		->_set('complemento', $_POST['complemento'])
		->_set('setor', $_POST['setor']);

		$save_id = $funcionarioModel->salvar();
		var_dump($save_id);
	}

}


?>