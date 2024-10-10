<?php

class Router {

	public array $routes = [];

	public function getURI() {
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}

	public function add($method, $route, $controller, $function = 'index') {
		$this->routes[$route] = ['method' => strtoupper($method), 'controller' => $controller, 'function' => $function];
	}

	private function route($route) {
		if ($this->routes[$route]['method'] == $_SERVER['REQUEST_METHOD']) {
			$controllerName = $this->routes[$route]['controller'];
			$functionName = $this->routes[$route]['function'];

			require_once './controllers/' . $controllerName . '.php';
			$controller = new $controllerName();
			$controller->$functionName();
		}
	}

	public function run() {
		$route = self::getURI();

		if (array_key_exists($route, $this->routes)) {
			$this->route($route);
			return 1;
		}

		include './views/404.view.php';
		return 0;
	}
}
