<?php

/**
 * https://inspector.dev/why-use-declarestrict_types1-in-php-fast-tips/
 * https://zerotomastery.io/blog/php-router/
 * https://en.wikipedia.org/wiki/Regular_expression
 * https://tech.jotform.com/what-is-router-and-how-to-create-your-own-router-with-php-fad811cf2873
 * https://www.w3schools.com/php/php_namespaces.asp
 * 
 * ChatGPT uses when not knowing something
 * (in regular expression what does the # do)
 */

declare(strict_types=1);

class Router {
	protected array $routes = [];
	private function parseUri(string $uri): array {
		$uri = parse_url($uri, PHP_URL_PATH); // parse url to strip params and unused charters
		$uri = trim($uri, '/'); // removes '/' from beginning and end
		$uri = '/' . $uri; // adds '/' to beginning
		match ($uri) {
			'', '/' => $uri = ['/'], // if uri == '' or '/'
			default => $uri = explode('/', $uri), // else split uri into sections
		};
		return $uri;
	}

	/**
	 * Change $method to use enum?
	 */
	public function addRoute(string $method, string $uri, array $controller): void {
		$uri = $this->parseUri($uri);
		/**
		 * uri => array of uri sections
		 * uriLength => length of uri array
		 * controller => array of [controller and function to call]
		 */
		$this->routes[$method]['uriData'][] = [
			'uri' => $uri,
			'uriLength' => count($uri),
			'controller' => $controller,
		];
	}

	public function matchRoute(): void {
		$uri = $this->parseUri($_SERVER['REQUEST_URI']); // array of uri sections of current uri
		$uriLength = count($uri); // length of uri sections
		$method = $_SERVER['REQUEST_METHOD']; // current method 'GET', 'POST'
		$params = []; // array of params "which are started with ':' in the add route"

		// Loop through all routes
		foreach ($this->routes[$method]['uriData'] as $routeData) {
			// If the length of the array does not equel eachother skip route
			if ($routeData['uriLength'] != $uriLength) {
				continue;
			}

			// Loop trough uri sections
			foreach ($routeData['uri'] as $index => $uriSection) {
				$firstChar = substr($uriSection, 0, 1); // get first character of section
				// If the sections aren't totally equel between uri and data check
				// If firstcharacter != ':' if then skip route
				if ($uriSection != $uri[$index]) {
					if ($firstChar != ':') {
						continue 2;
					}
				}

				// If firstcharacter == ':' it means it is a param
				// Insert into params array as key => value
				if ($firstChar == ':') {
					$key = substr($uriSection, 1);
					$params[$key] = $uri[$index];
				}

				// If index of current section equels length of given uri section array - 1
				if ($uriLength - 1 == $index) {
					session_start();
					[$controller, $function] = $routeData['controller'];
					require_once "./Controllers/$controller.php";
					(new $controller)->$function($params);
					return;
				}
			}
		}
		include './Views/404.view.php';
		// throw new RouteException('Route not found!');
	}
}
