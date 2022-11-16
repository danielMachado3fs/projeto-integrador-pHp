<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;


//os models


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