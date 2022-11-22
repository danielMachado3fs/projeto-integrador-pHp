<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class LoginController extends Action
{
    private $usuarioModel;

	public function __construct(){
		$this->usuarioModel = Container::getModel('Usuario');
	}

	public function index()
	{
		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('index', [], 'layoutLogin');
	}

	public function autenticar()
	{
		$this->usuarioModel->_set('email', $_POST['usuario']);
		$this->usuarioModel->_set('senha', $_POST['senha']);

		$usuario = $this->usuarioModel->autenticar();

		if ($usuario && $usuario->id) {

			session_start();

			$_SESSION['id'] = $usuario->id;
			$_SESSION['nome'] = $usuario->nome;

			header('location: /dashboard');
		} else {
			header('location: /?login=erro');
		}
	}
}