<?php

namespace MF\Controller;

abstract class Action {

	protected $view;

	public function __construct() {
		$this->view = new \stdClass();
	}

	protected function render($view, $view_data = []) {
		$this->view->page = $view;

		if(file_exists("../App/Views/layoutDefault.php")) {
			require_once "../App/Views/layoutDefault.php";
		} else {
			$this->content($view_data);
		}
	}

	 protected function load_head()
    {
        require_once "../App/Views/includes/head.php";
    }

    protected function load_topbar()
    {
        require_once "../App/Views/includes/topbar.php";
    }

    protected function load_sidebar()
    {
        require_once "../App/Views/includes/sidebar_menu.php";
    }

	protected function content() {
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));

		require_once "../App/Views/".$classAtual."/".$this->view->page.".php";
	}
}

?>