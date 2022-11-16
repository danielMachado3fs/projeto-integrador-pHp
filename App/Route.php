<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{

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

		$routes['funcionario_add'] = array(
			'route' => '/funcionario_add',
			'controller' => 'funcionariosController',
			'action' => 'add'
		);

		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'LoginController',
			'action' => 'index'
		);

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'LoginController',
			'action' => 'autenticar'
		);

		$this->setRoutes($routes);
	}
}
