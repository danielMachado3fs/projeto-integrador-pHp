<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class VeiculosController extends Action {

	public function index() {

		// $produto = Container::getModel('Produto');

		// $produtos = $produto->getProdutos();

		// @$this->view->dados = $produtos;

		$this->render('index');
	}

	public function sobreNos() {

		$info = Container::getModel('Info');

		$informacoes = $info->getInfo();

		@$this->view->dados = $informacoes;

		$this->render('sobreNos');
	}

}


?>