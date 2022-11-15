<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;


class FuncionariosController extends Action {

	public function index() {

		// $produto = Container::getModel('Produto');

		// $produtos = $produto->getProdutos();

		// @$this->view->dados = $produtos;

		// $this->render('index');
    }

	public function add() {

		$this->render('add');
    }

}


?>