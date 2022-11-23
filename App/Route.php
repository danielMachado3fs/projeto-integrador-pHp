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

		$routes['logoff'] = array(
			'route' => '/logoff',
			'controller' => 'loginController',
			'action' => 'logoff'
		);

		$routes['dashboard'] = array(
			'route' => '/dashboard',
			'controller' => 'loginController',
			'action' => 'dash'
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
			'action' => 'view',
		);

		$routes['veiculos_update'] = array(
			'route' => '/veiculo_edit',
			'controller' => 'veiculosController',
			'action' => 'update_view'
		);

		$routes['veiculos_update_store'] = array(
			'route' => '/veiculo_edit_store',
			'controller' => 'veiculosController',
			'action' => 'update_view_store'
		);

		$routes['veiculos_add'] = array(
			'route' => '/veiculo_add',
			'controller' => 'veiculosController',
			'action' => 'add'
		);

		$routes['veiculos_add_store'] = array(
			'route' => '/veiculo_add_store',
			'controller' => 'veiculosController',
			'action' => 'add_store'
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

		$routes['posto_index'] = array(
			'route' => '/postos_combustivel',
			'controller' => 'postoController',
			'action' => 'index'
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

		$routes['posto_edit'] = array(
			'route' => '/posto_edit',
			'controller' => 'postoController',
			'action' => 'edit'
		);

		$routes['posto_edit_store'] = array(
			'route' => '/editar_posto_store',
			'controller' => 'postoController',
			'action' => 'edit_store'
		);

		$routes['posto_delete'] = array(
			'route' => '/posto_delete',
			'controller' => 'postoController',
			'action' => 'delete'
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