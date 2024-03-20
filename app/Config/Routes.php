<?php
	
	namespace Config;
	
	use CodeIgniter\Router\RouteCollection;
	
	/**
	 * @var RouteCollection $routes
	 */
	$routes->setDefaultNamespace ( 'App\Controllers' );
	$routes->setDefaultController ( 'CardQR' );
	$routes->setDefaultMethod ( 'index' );
	$routes->setTranslateURIDashes ( FALSE );
	$routes->set404Override ();
	$routes->setAutoRoute ( false );
	$routes->get ( '/', 'CardQR::index' );
	$routes->get ( 'bikersQR', 'CardQR::index' );