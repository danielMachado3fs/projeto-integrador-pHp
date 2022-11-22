<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{
		/**rotas login */

		$routes['login'] = array(
			'route' => '/',
			'controller' => 'loginController',
			'action' => 'index'
		);

		$routes['login_autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'loginController',
			'action' => 'autenticar'
		);

		/**fim */
		/**rotas veiculos */

		$routes['veiculos_index'] = array(
			'route' => '/veiculos',
			'controller' => 'veiculosController',
			'action' => 'index'
		);

		$routes['veiculos_delete'] = array(
			'route' => '/veiculos_delete',
			'controller' => 'veiculosController',
			'action' => 'delete'
		);

		$routes['veiculos_view'] = array(
			'route' => '/veiculos_view',
			'controller' => 'veiculosController',
			'action' => 'view'
		);

		/**fim */

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
		$routes['funcionario_delete'] = array(
			'route' => '/funcionario_delete',
			'controller' => 'funcionariosController',
			'action' => 'delete'
		);

		/**fim */

		/**rotas posto */

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

		/**rotas tickets */

		$routes['tickets'] = array(
			'route' => '/tickets',
			'controller' => 'ticketsController',
			'action' => 'tickets'
		);

		/**fim */

		$this->setRoutes($routes);
	}
}