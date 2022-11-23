<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
// importando classes

//os models
// use App\Models\Produto;
// use App\Models\Info;
// use App\Models\Veiculo;


class PostoController extends Action
{

	public function __construct(){
		$this->postoModel = Container::getModel('Posto');
	}

	public function index() {
		if (isset($_GET['search'])) {
			if (isset($_GET['nome']) && isset($_GET['cidade'])) {
				if ($_GET['nome'] === 'all' && $_GET['cidade'] === 'all') {
					$viewData['postos'] = $this->postoModel->getAll();
				} else {
					$options = [
						"nome" => $_GET['nome'],
						"cidade" => $_GET['cidade']
					];
					$viewData['postos'] = $this->postoModel->getAllWhere($options);
				}
				$viewData['selectedNome'] = $_GET['nome'];
				$viewData['selectedCidade'] = $_GET['cidade'];
			}
		} else {
			$viewData['postos'] = $this->postoModel->getAll();
		}
		
		@$this->view->topBarTitle = "Postos de Combustível";
		@$this->view->menuSelected = "postoMenu";
		$this->render('index', $viewData);
    }
	
	public function add()
	{
		
		$this->view->topBarTitle = "Postos de Combustível";
		$this->view->menuSelected = "postoMenu";
		$this->render('add');
	}

	public function add_store(){
		$this->postoModel->_set('cnpj', $_POST['cnpj'])
		->_set('email', $_POST['txtEmail'])
		->_set('cep', $_POST['numberCep'])
		->_set('estado', $_POST['txtEstate'])
		->_set('bairro', $_POST['txtDistrict'])
		->_set('numero', $_POST['numberEnd'])
		->_set('nomeFantasia', $_POST['txtFantasia'])
		->_set('telefone', $_POST['numberTelephone'])
		->_set('cidade', $_POST['txtCity'])
		->_set('logradouro', $_POST['txtPatio'])
		->_set('complemento', $_POST['txtComplement']);

		$save_id = $this->postoModel->salvar();
		if($save_id){
			$this->index();
		}


	}

	public function edit(){
		$viewData['modelInfo'] = $this->postoModel->getOne($_GET['id']);
		@$this->view->topBarTitle = "Postos de Combustível";
		@$this->view->menuSelected = "postoMenu";
		$this->render('edit', $viewData);
	}

	public function edit_store(){
		$this->postoModel->_set('cnpj', $_POST['cnpj'])
		->_set('email', $_POST['txtEmail'])
		->_set('cep', $_POST['numberCep'])
		->_set('estado', $_POST['txtEstate'])
		->_set('bairro', $_POST['txtDistrict'])
		->_set('numero', $_POST['numberEnd'])
		->_set('nomeFantasia', $_POST['txtFantasia'])
		->_set('telefone', $_POST['numberTelephone'])
		->_set('cidade', $_POST['txtCity'])
		->_set('logradouro', $_POST['txtPatio'])
		->_set('complemento', $_POST['txtComplement']);

		$save_id = $this->postoModel->salvar($_POST['id']);
		if($save_id){
			$this->index();
		}
	}

	public function delete(){
		$posto = $this->postoModel->getOne($_GET['id']);
		if($posto && $posto->id){
			if($this->postoModel->delete($posto->id) === true){
				echo json_encode(array('success' => true));
			}else{
				echo json_encode(array('success' => false, 'message' => 'Erro ao excluir funcionário'));
			}
		}else{
			echo json_encode(array('success' => false, 'message' => 'Registro não encontrado'));
		}
	}
}