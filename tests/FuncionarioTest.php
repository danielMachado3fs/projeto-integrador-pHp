<?php
namespace tests;

use PHPUnit\Framework\TestCase;
use MF\Model\Container;

class FuncionarioTest extends TestCase
{
    public function test_get_values(){
        $profissional = Container::getModel('Funcionario');
        $this->assertNotEmpty($profissional->_get("values"));
    }

    public function test_set_values(){
        $profissional = Container::getModel('Funcionario');
        //seta um valor no atributo cpf
        $profissional->_set('cpf', 123456789);
        //pega o valor do atributo cpf
        $atributo = $profissional->_get('cpf');
        
        $this->assertEquals(123456789, $atributo);
    }

    public function test_should_register_a_new_employee(){
        $employee = Container::getModel('Funcionario');
        $employee->_set('nome', 'Joao')
		->_set('dataNascimento','1991-10-20')
		->_set('cpf', '123456789')
		->_set('email', 'joao@gmail.com')
		->_set('telefone', '999999999')
		->_set('cep', '99999999')
		->_set('cidade', 'timoteo')
		->_set('estado', 'minas gerais')
		->_set('logradouro', 'rua 1')
		->_set('bairro', 'centro')
		->_set('numero', 10)
		->_set('complemento', 'Casa')
		->_set('setor', 'logistica')
		->_set('cargo', 'Motorista');
     
        $id = $employee->salvar();
      
        $this->assertNotEmpty($id);
    }

    public function test_should_update_a_employee(){
        $employee = Container::getModel('Funcionario');
        $employee->_set('nome', 'Joao')
		->_set('dataNascimento','1991-10-20')
		->_set('cpf', '123456789')
		->_set('email', 'joao@gmail.com')
		->_set('telefone', '999999999')
		->_set('cep', '99999999')
		->_set('cidade', 'timoteo')
		->_set('estado', 'minas gerais')
		->_set('logradouro', 'rua 1')
		->_set('bairro', 'centro')
		->_set('numero', 10)
		->_set('complemento', 'Casa')
		->_set('setor', 'logistica')
		->_set('cargo', 'Motorista');
     
        $id = $employee->salvar();

        $employee->_set('nome', 'Jose');
        $employee->salvar($id);
        var_dump($employee);
        $this->assertEquals($employee->_get('nome'), 'Jose');
    }

    public function test_should_read_a_employee(){
        $employee = Container::getModel('Funcionario');
        $employee->_set('nome', 'Joao')
		->_set('dataNascimento','1991-10-20')
		->_set('cpf', '123456789')
		->_set('email', 'joao@gmail.com')
		->_set('telefone', '999999999')
		->_set('cep', '99999999')
		->_set('cidade', 'timoteo')
		->_set('estado', 'minas gerais')
		->_set('logradouro', 'rua 1')
		->_set('bairro', 'centro')
		->_set('numero', 10)
		->_set('complemento', 'Casa')
		->_set('setor', 'logistica')
		->_set('cargo', 'Motorista');
     
        $id = $employee->salvar();

        $result = $employee->getOne($id);
        
        $this->assertNotNull($result);
    }

    // public function test_should_delete_a_employee(){
    //     $employee = Container::getModel('Funcionario');
    //     $employee->_set('nome', 'Joao')
	// 	->_set('dataNascimento','1991-10-20')
	// 	->_set('cpf', '123456789')
	// 	->_set('email', 'joao@gmail.com')
	// 	->_set('telefone', '999999999')
	// 	->_set('cep', '99999999')
	// 	->_set('cidade', 'timoteo')
	// 	->_set('estado', 'minas gerais')
	// 	->_set('logradouro', 'rua 1')
	// 	->_set('bairro', 'centro')
	// 	->_set('numero', 10)
	// 	->_set('complemento', 'Casa')
	// 	->_set('setor', 'logistica')
	// 	->_set('cargo', 'Motorista');
     
    //     $id = $employee->salvar();

    //     $employee->_set('nome', 'Jose');
    //     $employee->salvar($id);
    //     var_dump($employee);
    //     $this->assertEquals($employee->_get('nome'), 'Jose');
    // }





    // public function test_should_find_existing_employee_by_name_and_sector(){
    //     $employee = Container::getModel('Funcionario');
    //     $employee->_set('nome', 'Joao')
	// 	->_set('dataNascimento','1991-10-20')
	// 	->_set('cpf', '123456789')
	// 	->_set('email', 'joao@gmail.com')
	// 	->_set('telefone', '999999999')
	// 	->_set('cep', '99999999')
	// 	->_set('cidade', 'timoteo')
	// 	->_set('estado', 'minas gerais')
	// 	->_set('logradouro', 'rua 1')
	// 	->_set('bairro', 'centro')
	// 	->_set('numero', 10)
	// 	->_set('complemento', 'Casa')
	// 	->_set('setor', 'logistica')
	// 	->_set('cargo', 'Motorista');
     
    //     $id = $employee->salvar();

    //     $func = $employee-> getAllWhere(['nome'=> 'Fabricio', 'setor'=>'financeiro']);
    //     $this->assertNotEmpty($func);

        
    // }
}
