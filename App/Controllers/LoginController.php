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
		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('index', [], 'layoutLogin');
	}

	public function autenticar()
	{
		$usuario = Container::getModel('Usuario');

		$usuario->_set('email', $_POST['email']);
		$usuario->_set('senha', $_POST['senha']);

		$usuario->autenticar();

		if ($usuario->_get('id') != '' && $usuario->_get('nome')) {

			session_start();

			$_SESSION['id'] = $usuario->_get('id');
			$_SESSION['nome'] = $usuario->_get('nome');

			header('location: / timeline');
		} else {
			header('location: /?login=erro');
		}
	}
}
