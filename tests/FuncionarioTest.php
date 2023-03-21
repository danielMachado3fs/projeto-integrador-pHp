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
}
