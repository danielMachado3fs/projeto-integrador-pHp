<?php

namespace App\Controllers;

use App\Views\login\Logger;
use App\Views\login\Login;
use MF\Controller\Action;
use MF\Model\Container;

class LoginController extends Action
{
    private $usuarioModel;

    public function __construct()
    {
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

            $login = new Login();
            $login->userid = $usuario->id;
            $login->email = $usuario->email;
            $login->attach(new Logger());
            $login->handle();

            header('location: /funcionarios');
        } else {
            header('location: /?login=erro');
        }
    }

    public function logoff()
    {
        session_destroy();
        $this->index();
    }
}