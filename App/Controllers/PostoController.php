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

	public function add()
	{
		$this->render('add');
	}

	public function addStore(){
		
	}
}