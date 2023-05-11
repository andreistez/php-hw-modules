<?php

include_once('init.php');

use System\Router;
use Modules\Articles\Controllers\Index as ArticlesC;
use System\Exceptions\Exc404;

const BASE_URL = '/hw4/';

try {
	$router = new Router( BASE_URL );
	$router->addRoute( '', ArticlesC::class );
	$router->addRoute( 'article/1', ArticlesC::class, 'item' );
	$router->addRoute( 'article/2', ArticlesC::class, 'item' ); // e t.c post/99, post/100 lol :))

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
?>
<hr>
Menu
<a href="<?=BASE_URL?>">Home</a>
<a href="<?=BASE_URL?>article/1">Art 1</a>
<a href="<?=BASE_URL?>article/2">Art 2</a>