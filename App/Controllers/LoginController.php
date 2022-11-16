<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;


class LoginController extends Action
{

	public function index()
	{
		@$this->view->dados = '';
		$this->render('index', [], 'layoutLogin');
	}

	public function autenticar()
	{
		$usuario = Container::getModel('Usuario');

		$usuario->_set('email', $_POST['email']);
		$usuario->_set('senha', $_POST['senha']);

		echo '<pre>';
		print_r($usuario);
		echo '</pre>';

		$retorno = $usuario->autenticar();

		echo '<pre>';
		print_r($usuario);
		echo '</pre>';
	}
}
