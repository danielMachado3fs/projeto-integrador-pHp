<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;
use App\Models\Veiculo;


class VeiculosController extends Action
{
	private $vehicleModel;

	public function __construct()
	{
		$this->vehicleModel = Container::getModel('Veiculo');
	}

	public function index()
	{
		if (isset($_GET['search'])) {
			$this->vehicleModel->_set('tipo', $_GET['types']);
			$this->vehicleModel->_set('marca', $_GET['brands']);

			if (isset($_GET['types']) && isset($_GET['brands'])) {
				if ($_GET['types'] === 'all' && $_GET['brands'] === 'all') {
					$viewData = $this->vehicleModel->getVehicles();
				} else {
					$viewData = $this->vehicleModel->getVeiculosByTypeAndBrand();
				}
			}
		} else {
			$viewData = $this->vehicleModel->getVehicles();
		}

		if (!empty($_GET['brands']) && !empty($_GET['types'])) {
			$viewFilter['selectedBrand'] = $_GET['brands'];
			$viewFilter['selectedType'] = $_GET['types'];
		}

		$viewFilter['tipo'] = $this->vehicleModel->getTypes();
		$viewFilter['marca'] = $this->vehicleModel->getBrands();

		@$this->view->dados = $viewData;
		@$this->view->dataFilters = $viewFilter;

		// @$this->view->filterdatas = $viewDataFilter;
		$this->render('index');
	}

	public function delete()
	{
		$vehicleId = $_POST["vehicle_id"];
		$this->vehicleModel->deleteVehicle($vehicleId);
	}

	public function view()
	{
		$vehicleId = $_GET["vehicle_id"];
		$dataVehicle1 = $this->vehicleModel->viewVehicle($vehicleId);
		echo json_encode($dataVehicle1);
	}

	public function update_view()
	{
		$vehicleId = $_GET["vehicle_id"];
		@$this->view->dataVehicle  = $this->vehicleModel->viewVehicle($vehicleId);

		$this->render('edit_veiculo');
	}

	public function update_view_store()
	{
		$this->vehicleModel->_set('marca', $_POST['marca'])
			->_set('modelo', $_POST['modelo'])
			->_set('tipo', $_POST['tipo'])
			->_set('placa', $_POST['placa'])
			->_set('anoFabricacao', $_POST['anoFabricacao'])
			->_set('dataAquisicao', $_POST['dataAquisicao'])
			->_set('valor', $_POST['valor'])
			->_set('id', $_POST['id']);
		echo $_POST['placa'];
		$update = $this->vehicleModel->updateVehicle();
		$this->index();
	}

	public function add()
	{
		$this->render('add_veiculo');
	}

	public function add_store()
	{
		$this->vehicleModel->_set('marca', $_POST['marca'])
			->_set('modelo', $_POST['modelo'])
			->_set('tipo', $_POST['tipo'])
			->_set('placa', $_POST['placa'])
			->_set('anoFabricacao', $_POST['anoFabricacao'])
			->_set('dataAquisicao', $_POST['dataAquisicao'])
			->_set('valor', $_POST['valor']);

		$update = $this->vehicleModel->addVehicle();
		$this->index();
	}
}