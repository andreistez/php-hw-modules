<?php

include_once('init.php');

use System\ModulesDispatcher;
use System\Router;
use Modules\Articles\Module as Articles;
use System\Exceptions\Exc404;

const BASE_URL = '/hw4/';

try {
	$modules	= new ModulesDispatcher();
	$router		= new Router( BASE_URL );

	$modules->add( new Articles() );
	$modules->registerRoutes( $router );

	$uri			= $_SERVER['REQUEST_URI'];
	$activeRoute	= $router->resolvePath( $uri );
	$c				= $activeRoute['controller'];
	$m				= $activeRoute['method'];

	$c->$m();
	$html = $c->render();
	echo $html;
}	catch( Exc404 $error ){
	echo '404 - not found.';
}	catch( Throwable $error ){
	echo 'error: ' . $error->getMessage();
}

