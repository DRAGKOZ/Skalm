<?php
	
	namespace App\Controllers;
	
	use App\Controllers\BaseController;
	
	class CardQR extends BaseController {
		public function index () {
			return view ( 'header' ) . view ( 'vCard' ) . view ( 'footer' );
		}
	}