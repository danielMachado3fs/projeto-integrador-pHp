<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;
use App\Models\Tickets;


class ticketsController extends Action {

	public function tickets() {

		$this->render('gerarTickets');
	}

	public function gerartickets() {

		$info = Container::getModel('gerarTickets');

		$informacoes = $info->getInfo();

		@$this->view->dados = $informacoes;

		$this->render('gerarTickets');
	}


	 
	
}


?>