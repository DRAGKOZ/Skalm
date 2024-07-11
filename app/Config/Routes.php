<?php
	
	namespace Config;
	
	use CodeIgniter\Router\RouteCollection;
	
	/**
	 * @var RouteCollection $routes
	 */
	$routes->setDefaultNamespace ( 'App\Controllers' );
	$routes->setDefaultController ( 'CardQR' );
	$routes->setTranslateURIDashes ( FALSE );
	$routes->setDefaultMethod ( 'index' );
	$routes->setAutoRoute ( FALSE );
	$routes->set404Override ();
	//====================================||  Rutas  ||====================================
	//====================================|| Webhook ||====================================
	//====================================|| Session ||====================================
	$routes->get ( 'forgot', 'ProfileController::forgot' /**@uses \App\Controllers\ProfileController::forgot * */ );
	$routes->get ( 'signout', 'SignoutController::index' /**@uses \App\Controllers\SignoutController::index * */ );
	$routes->get ( 'signin', 'SigninController::index' /**@uses \App\Controllers\SigninController::index * */ );
	$routes->get ( 'signup', 'SignupController::index' /**@uses \App\Controllers\SignupController::index * */ );
	//====================================||   GET   ||====================================
	$routes->get ( '/', 'Home::index' /**@uses \App\Controllers\Home::index * */ );
	$routes->get ( 'bikersQR', 'CardQR::index' /**@uses \App\Controllers\CardQR::index * */ );
	//====================================||   POST  ||====================================
	$routes->post ( 'generateQR', 'CardQR::generateVCard' /**@uses \App\Controllers\CardQR::generateVCard* */ );
	//====================================||   PUT   ||====================================
	//====================================||  PATCH  ||====================================
	//====================================|| DELETE  ||====================================
	//====================================||   END   ||====================================
	$routes->add ( 'Prueba', 'Prueba::index' /**@uses \App\Controllers\Prueba::index* */ );