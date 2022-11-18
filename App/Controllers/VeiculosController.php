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

	public function index()
	{
		$veiculo = Container::getModel('Veiculo');

		$informacoes = $veiculo->getVeiculos();

		@$this->view->dados = $informacoes;

		$this->render('index');
	}
}