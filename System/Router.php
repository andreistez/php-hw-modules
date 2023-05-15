<?php

namespace System;

use System\Contracts\IRouter;
use System\Exceptions\Exc404;

class Router implements IRouter
{
	protected string $baseUrl;
	protected int $baseShift;
	protected array $routes = [];

	public function __construct( string $baseUrl = '' )
	{
		$this->baseUrl = $baseUrl;
		$this->baseShift = strlen($this->baseUrl);
	}

	public function addRoute( string $url, string $controllerName, string $controllerMethod = 'index' ): void
	{
		$this->routes[] = [
			'path' => $url,
			'c' => $controllerName,
			'm' => $controllerMethod
		];
	}

	public function resolvePath( string $url ): array
	{
		$relativeUrl = substr($url, $this->baseShift);
		$route = $this->findPath($relativeUrl);
		$params = explode('/', $relativeUrl);
		$controller = new $route['c']();
		$controller->setEnvironment($params);
		// var_dump($controller instanceof IController); // hmmmm

		return [
			'controller'	=> $controller,
			'method'		=> $route['m']
		];
	}

	/**
	 * @throws Exc404
	 */
	protected function findPath( string $url) : array{
		$activeRoute = null;

		foreach($this->routes as $route){
			if($url === $route['path']){
				$activeRoute = $route;
				break;
			}
		}

		if( $activeRoute === null ) throw new Exc404( 'Route not found.' );

		return $activeRoute;
	}
}