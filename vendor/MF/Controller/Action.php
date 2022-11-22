<?php

namespace MF\Controller;

abstract class Action {

	protected $view;

	public function __construct() {
		$this->view = new \stdClass();
	}

	protected function render($view, $viewData = [], $layout = null) {
		$this->view->page = $view;
		$template = 'layoutDefault';
		if($layout){
			$template = $layout;
		}
		if (file_exists("../App/Views/" . $template . ".php")) {
			require_once "../App/Views/" . $template . ".php";
		} else {
			$this->content($viewData);
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

    protected function load_footer()
    {
        require_once "../App/Views/includes/footer.php";
    }

	protected function content($viewData = null) {
		if($viewData){
			foreach($viewData as $key => $data){
				$this->view->{$key} = $data;
				${$key} = $data;
			}
		}
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));

		require_once "../App/Views/".$classAtual."/".$this->view->page.".php";
	}
}

?>