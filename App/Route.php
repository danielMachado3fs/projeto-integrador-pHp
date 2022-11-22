<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['sobre_nos'] = array(
			'route' => '/sobre_nos',
			'controller' => 'indexController',
			'action' => 'sobreNos'
		);

		$routes['veiculos_index'] = array(
			'route' => '/veiculos',
			'controller' => 'veiculosController',
			'action' => 'index'
		);

		/**rotas funcionários */

		$routes['funcionario_index'] = array(
			'route' => '/funcionarios',
			'controller' => 'funcionariosController',
			'action' => 'index'
		);

		$routes['funcionario_add'] = array(
			'route' => '/funcionario_add',
			'controller' => 'funcionariosController',
			'action' => 'add'
		);

		$routes['funcionario_add_store'] = array(
			'route' => '/add_store',
			'controller' => 'funcionariosController',
			'action' => 'add_store'
		);

		$routes['funcionario_edit'] = array(
			'route' => '/funcionario_edit',
			'controller' => 'funcionariosController',
			'action' => 'edit'
		);

		$routes['funcionario_edit_store'] = array(
			'route' => '/edit_store',
			'controller' => 'funcionariosController',
			'action' => 'edit_store'
		);


		$routes['posto_add'] = array(
			'route' => '/adicionar_posto',
			'controller' => 'postoController',
			'action' => 'add'
		);

		$routes['posto_add_store'] = array(
			'route' => '/adicionar_posto_store',
			'controller' => 'postoController',
			'action' => 'add_store'
		);


		/**fim */

		$this->setRoutes($routes);
	}

}

?>