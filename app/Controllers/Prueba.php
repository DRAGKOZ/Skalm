<?php
	
	namespace App\Controllers;
	use App\Controllers\BaseController;
	
	class Prueba extends BaseController {
		public function index (): string {
			return view ( 'header' ) . view ( 'Prueba' ) . view ( 'footer' );
		}
	}