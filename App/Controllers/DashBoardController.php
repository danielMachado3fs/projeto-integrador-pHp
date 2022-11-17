<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


class DashBoardController extends Action
{

    public function dashboard()
    {

        session_start();


        if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {


            $this->render('dashboard');
        } else {
            header('location: /?login=erro');
        }
    }

    public function sair()
    {
        session_start();
        session_destroy();
        header('Location: /');
    }
}
