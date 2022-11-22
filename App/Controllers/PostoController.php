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

	public function __construct(){
		$this->postoModel = Container::getModel('Posto');
	}
	
	public function add()
	{
		$this->render('add');
	}

	public function add_store(){
		$this->postoModel->_set('cnpj', $_POST['cnpj'])
		->_set('email', $_POST['txtEmail'])
		->_set('cep', $_POST['numberCep'])
		->_set('estado', $_POST['txtEstate'])
		->_set('bairro', $_POST['txtDistrict'])
		->_set('numero', $_POST['numberEnd'])
		->_set('nomeFantasia', $_POST['txtFantasia'])
		->_set('telefone', $_POST['numberTelephone'])
		->_set('cidade', $_POST['txtCity'])
		->_set('logradouro', $_POST['txtPatio'])
		->_set('complemento', $_POST['txtComplement']);
	
		$save_id = $this->postoModel->salvar();
		if($save_id){
			$this->add();
		}


	}
}