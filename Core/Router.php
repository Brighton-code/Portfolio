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
require_once './Core/CustomExceptions.php';

class Router {
	private array $routes = [];

	private function normalizePath(string $path): string {
		$path = trim($path, '/'); // Removes '/' from beginning and end.
		$path = "/$path"; // add '/' to beginning and end.
		$path = preg_replace('#[/]{2,}#', '/', $path); // Removes regular expression to remove consecutive '/'. 
		return $path;
	}

	public function addRoute(string $method, string $url, array $controller) {
		$this->routes[$method][$url] = $controller;
	}

	public function matchRoute() {
		$method = $_SERVER['REQUEST_METHOD'];
		$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$url = $this->normalizePath($uri);
		if (isset($this->routes[$method])) {
			foreach ($this->routes[$method] as $routeUrl => $target) {
				// Use named subpatterns in the regular expression pattern to capture each parameter value separately
				$pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
				if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
					// Pass the captured parameter values as named arguments to the target function
					$params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY); // Only keep named subpattern matches

					session_start();
					[$class, $function] = $target;
					require_once "./Controllers/$class.php";
					(new $class)->{$function}($params);
					return;
				}
			}
		}
		throw new RouteException('Route not found');
	}
}
