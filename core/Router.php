<?php

class Router
{
	private $routes = [
		'GET' => [],
		'POST' => []
	];

	public function registerRoute($method, $uri, $controller)
	{
		$this->routes[$method][$uri] = $controller;
	}

	public function getController($method, $uri, $config)
	{
		$routes = $this->routes;
		if (array_key_exists($uri, $routes[$method])) {
			$controller = $routes[$method][$uri];

			// Class controllers
			if (is_array($controller)) {
				$class = $controller[0];
				$instance = new $class($config);
				return call_user_func_array([$instance, $controller[1]], []);
			}

			// Single controller
			include 'controllers/' . $routes[$method][$uri];
		} else {

			// Not found
			$class = 'NotFoundController';
			$instance = new $class($config);
			return call_user_func_array([$instance, 'index'], []);
		}
	}

}