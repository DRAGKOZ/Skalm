<?php
	
	namespace App\Controllers;
	
	use App\Controllers\BaseController;
	use CodeIgniter\HTTP\ResponseInterface;
	use mysql_xdevapi\Session;
	
	class SessionController extends BaseController {
		public function index () {
			$session = session ();
			return "Hola: " . $session->get ( 'name' );
		}
		
	}
