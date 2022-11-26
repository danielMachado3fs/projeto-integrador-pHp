<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


class TicketsController extends Action {
	private $ticketsModel;

	public function __construct(){
		$this->ticketsModel = Container::getModel('Ticket');
		$this->funcionarioModel = Container::getModel('Funcionario');
		$this->veiculoModel = Container::getModel('Veiculo');
		$this->postoModel = Container::getModel('Posto');
	}

	public function index() {
		if (isset($_GET['search'])) {
			if (isset($_GET['postoCombustivelId']) || isset($_GET['veiculoId']) || isset($_GET['motoristaId'])) {
				if ($_GET['postoCombustivelId'] === 'all' && $_GET['veiculoId'] === 'all' && $_GET['motoristaId'] === 'all') {
					$tickets = $this->ticketsModel->getAllWhere();
				} else {
					$options = [
						"postoCombustivelId" => $_GET['postoCombustivelId'],
						"veiculoId" => $_GET['veiculoId'],
						"motoristaId" => $_GET['motoristaId'],
					];
					$tickets = $this->ticketsModel->getAllWhere($options);
				}
				$viewData['postoCombustivelSelected'] = $_GET['postoCombustivelId'];
				$viewData['veiculoSelected'] = $_GET['veiculoId'];
				$viewData['motoristaSelected'] = $_GET['motoristaId'];
			}
		} else {
			$tickets = $this->ticketsModel->getAllWhere();
		}

		$viewData['tickets'] = [];
		foreach($tickets as $data){
			$viewData['tickets'][] = $this->getStatus($data);
		}

		$viewData['motoristas'] = $this->funcionarioModel->getAllWhere(array("cargo" => 'MOTORISTA'));
		$viewData['postos'] = $this->postoModel->getAll();
		$viewData['veiculos'] = $this->veiculoModel->getAll();

		$this->view->topBarTitle = "Tickets de Combustível";
		$this->view->menuSelected = "ticketsMenu";
		$this->render('index', $viewData);
    }

	public function gerar_ticket() {
		$viewData['motoristas'] = $this->funcionarioModel->getAllWhere(array("cargo" => 'MOTORISTA'));
		$viewData['postos'] = $this->postoModel->getAll();
		$viewData['veiculos'] = $this->veiculoModel->getAll();
		$this->view->topBarTitle = "Tickets de Combustível";
		$this->view->menuSelected = "ticketsMenu";
		$this->render('gerarTickets', $viewData);
    }

	public function gerar_ticket_store(){
		$this->ticketsModel->_set('motoristaId', $_POST['motoristaId'])
		->_set('postoCombustivelId', $_POST['postoCombustivelId'])
		->_set('veiculoId', $_POST['veiculoId'])
		->_set('tipoCombustivel', $_POST['tipoCombustivel'])
		->_set('valor', $_POST['valor'])
		->_set('dataEmissao', $_POST['dataEmissao'])
		->_set('dataValidade', $_POST['dataValidade']);

		// var_dump($this->ticketsModel);
		$save_id = $this->ticketsModel->salvar();
		if($save_id){
			$this->index();
		}
	}

	public function edit(){
		@$this->view->data = $this->ticketsModel->getOne($_GET['id']);
		$this->view->topBarTitle = "Tickets de Combustível";
		$this->view->menuSelected = "ticketsMenu";
		$this->render('edit');
	}

	public function edit_store(){
		$this->ticketsModel->_set('nome', $_POST['nome'])
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
		->_set('setor', $_POST['setor'])
		->_set('cargo', $_POST['cargo']);

		$save_id = $this->ticketsModel->salvar($_POST['id']);
		if($save_id){
			$this->index();
		}
	}

	public function delete(){
		$funcionario = $this->ticketsModel->getOne($_GET['id']);
		if($funcionario && $funcionario->id){
			if($this->ticketsModel->delete($funcionario->id) === true){
				echo json_encode(array('success' => true));
			}else{
				echo json_encode(array('success' => false, 'message' => 'Erro ao excluir funcionário'));
			}
		}else{
			echo json_encode(array('success' => false, 'message' => 'Registro não encontrado'));
		}
	}

	public function getStatus($data){
		if((strtotime(date("Y-m-d")) > strtotime($data->dataValidade)) && $data->status == 'LIBERADO'){
			$data->status = "<span style='color:red; font-weigth: bold;'>VENCIDO</span>";
			$data->actions .= "<a onclick='alertDeleteticket(<?= $data->id ?>)'><i class='bx bxs-trash'></i></a>";
			$data->actions .= "<a href='/ticket_view?id=<?= $data->id ?>'><i class='bx bxs-show'></i></a>";
		}else if($data->status == 'LIBERADO'){
			$data->status = "<span style='color:blue; font-weigth: bold;'>LIBERADO</span>";
			$data->actions = "<a href='/ticket_edit?id=<?= $data->id ?>'><i class='bx bxs-edit'></i></a>";
			$data->actions .= "<a onclick='alertDeleteticket(<?= $data->id ?>)'><i class='bx bxs-trash'></i></a>";
			$data->actions .= "<a href='/baixar_view?id=<?= $data->id ?>'><i class='bx bxs-show'></i></a>";
			$data->actions .= "<a href='#'><i class='bx bxs-show'></i></a>";
		}else{
			$data->status = "<span style='color:green; font-weigth: bold;'>BAIXADO</span>";
			$data->actions .= "<a href='/ticket_view?id=<?= $data->id ?>'><i class='bx bxs-show'></i></a>";
		}

		return $data;
	}
}

?>