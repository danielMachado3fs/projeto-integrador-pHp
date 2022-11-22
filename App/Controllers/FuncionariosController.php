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

		if (isset($_GET['search'])) {
			if (isset($_GET['nome']) && isset($_GET['setor'])) {
				if ($_GET['nome'] === 'all' && $_GET['setor'] === 'all') {
					$viewData['funcionarios'] = $this->funcionarioModel->getAll();
				} else {
					$options = [
						"nome" => $_GET['nome'],
						"setor" => $_GET['setor']
					];
					$viewData['funcionarios'] = $this->funcionarioModel->getAllWhere($options);
				}
			}
		} else {
			$viewData['funcionarios'] = $this->funcionarioModel->getAll();
		}

		$viewData['selectedNome'] = $_GET['nome'];
		$viewData['selectedSetor'] = $_GET['setor'];
		$this->view->topBarTitle = "Funcionários";
		$this->view->menuSelected = "funcionariosMenu";
		$this->render('index', $viewData);
    }

	public function add() {

		$this->view->topBarTitle = "Funcionários";
		$this->view->menuSelected = "funcionariosMenu";
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

	public function edit(){
		@$this->view->data = $this->funcionarioModel->getOne($_GET['id']);
		$this->view->topBarTitle = "Funcionários";
		$this->view->menuSelected = "funcionariosMenu";
		$this->render('edit');
	}

	public function edit_store(){
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

		$save_id = $this->funcionarioModel->salvar($_POST['id']);
		if($save_id){
			$this->index();
		}
	}

	public function delete(){
		$funcionario = $this->funcionarioModel->getOne($_GET['id']);
		if($funcionario && $funcionario->id){
			if($this->funcionarioModel->delete($funcionario->id) === true){
				echo json_encode(array('success' => true));
			}else{
				echo json_encode(array('success' => false, 'message' => 'Erro ao excluir funcionário'));
			}
		}else{
			echo json_encode(array('success' => false, 'message' => 'Registro não encontrado'));
		}
	}

}

?>