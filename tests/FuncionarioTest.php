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
}
