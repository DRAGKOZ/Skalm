<?php
	
	namespace CodeIgniter\Commands\Utilities\Routes;
	
	use CodeIgniter\Router\RouteCollection;
	
	/**
	 * @var RouteCollection $routes
	 */
	$routes->setDefaultNamespace ( 'App\Controllers' );
	$routes->setTranslateURIDashes ( FALSE );
	$routes->setDefaultController ( 'Home' );
	$routes->setDefaultMethod ( 'index' );
	$routes->setAutoRoute ( FALSE );
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
	$routes->get ( '646576656c6f706572', 'EspecialController::developerDay' /**@uses \App\Controllers\EspecialController::developerDay * */ );
	$routes->add ( 'tournament', 'TournamentController::index' /**@uses \App\Controllers\TournamentController::index* */ );
	//====================================||   POST  ||====================================
	$routes->post ( 'signup', 'SignupController::signup' /**@uses \App\Controllers\SignupController::signup * */ );
	$routes->post ( 'signin', 'SigninController::signIn' /**@uses \App\Controllers\SigninController::signIn * */ );
	$routes->post ( 'generateQR', 'CardQR::generateVCard' /**@uses \App\Controllers\CardQR::generateVCard* */ );
	$routes->post ( 'validateNickname', 'ProfileController::validateNickname' /**@uses \App\Controllers\ProfileController::validateNickname* */ );
	$routes->post ( 'encryptPassword', 'SignupController::encryptPassword' /**@uses \App\Controllers\SignupController::encryptPassword* */ );
	//====================================||   PUT   ||====================================
	//====================================||  PATCH  ||====================================
	//====================================|| DELETE  ||====================================
	//====================================||   END   ||====================================
	$routes->add ( 'Prueba', 'Prueba::index' /**@uses \App\Controllers\Prueba::index* */ );