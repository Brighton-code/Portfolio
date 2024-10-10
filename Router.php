<?php

class Router {

	public static array $routes = [];

	public static function getURI() {
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}

	public static function add($method, $route, $controller, $function = 'index') {
		self::$routes[$route] = ['method' => strtoupper($method), 'controller' => $controller, 'function' => $function];
	}

	private static function route($route) {
		if (self::$routes[$route]['method'] == $_SERVER['REQUEST_METHOD']) {
			$controllerName = self::$routes[$route]['controller'];
			$functionName = self::$routes[$route]['function'];

			require_once './controllers/' . $controllerName . '.php';
			$controller = new $controllerName();
			$controller->$functionName();
		}
	}

	public static function run() {
		$route = self::getURI();

		if (array_key_exists($route, self::$routes)) {
			self::route($route);
			return 1;
		}

		include './views/404.view.php';
		return 0;
	}
}
