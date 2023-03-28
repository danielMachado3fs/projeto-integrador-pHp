<?php
namespace tests;

use PHPUnit\Framework\TestCase;
use MF\Model\Container;

class VeiculoTest extends TestCase
{
    public function test_shoud_get_vehicles(){
        $vehicle = Container::getModel('Veiculo');
        $this->assertNotEmpty($vehicle->getVehicles());
    } 

    public function test_shoud_register_a_vehicle_without_error(){
        $vehicle = Container::getModel('Veiculo');

        $vehicle->_set('marca', 'CHEVROLET');
        $vehicle->_set('modelo', 'S10');
        $vehicle->_set('tipo', 'Carro');
        $vehicle->_set('placa', 'ABC144');
        $vehicle->_set('anoFabricacao', '2010');
        $vehicle->_set('dataAquisicao', date('Y-m-d'));
        $vehicle->_set('valor', 1000.00);
        $result = $vehicle->addVehicle();
        $this->assertNotEmpty($result);
        $this->assertIsString($result);
    } 

    public function test_shoud_update_a_vehicle(){
        $vehicle = Container::getModel('Veiculo');

        $vehicle->_set('marca', 'CHEVROLET');
        $vehicle->_set('modelo', 'S10');
        $vehicle->_set('tipo', 'Carro');
        $vehicle->_set('placa', 'ABC16');
        $vehicle->_set('anoFabricacao', '2011');
        $vehicle->_set('dataAquisicao', date('Y-m-d'));
        $vehicle->_set('valor', 1000.00);
        $id = $vehicle->addVehicle();
        
        $vehicle->_set('anoFabricacao', '2004');
        $result= $vehicle->updateVehicle($id);

        $this->assertGreaterThan(0, $result);
    } 


    public function test_shoud_delete_a_vehicle(){
        $vehicle = Container::getModel('Veiculo');

        $vehicle->_set('marca', 'CHEVROLET');
        $vehicle->_set('modelo', 'S10');
        $vehicle->_set('tipo', 'carro');
        $vehicle->_set('placa', 'AxC1444');
        $vehicle->_set('anoFabricacao', '2010');
        $vehicle->_set('dataAquisicao', date('Y-m-d'));
        $vehicle->_set('valor', 1000.00);

        $id = $vehicle->addVehicle();
        $result = $vehicle->deleteVehicle($id);

        $this->assertGreaterThan(0, $result);
    } 


    public function test_shoud_read_a_vehicle(){
        $vehicle = Container::getModel('Veiculo');

        $vehicle->_set('marca', 'CHEVROLET');
        $vehicle->_set('modelo', 'S10');
        $vehicle->_set('tipo', 'Carro');
        $vehicle->_set('placa', 'AFC196');
        $vehicle->_set('anoFabricacao', '2011');
        $vehicle->_set('dataAquisicao', date('Y-m-d'));
        $vehicle->_set('valor', 1000.00);
        $id = $vehicle->addVehicle();

        $result = $vehicle->viewVehicle($id);
        var_dump($result);  
        $this->assertNotEmpty($result);
    } 
   
}
