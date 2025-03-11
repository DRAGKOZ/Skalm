<?php
	
	namespace App\Controllers;
	use App\Controllers\BaseController;
	use CodeIgniter\HTTP\RedirectResponse;
	
	class TournamentController extends BaseController {
		public function index (): string|RedirectResponse {
//			if ($this->validateSession ()){
//				return redirect ('/');
//			}
			$data = [ 'main' => view ('tournament',['session'=>FALSE]) ];
			return view ( 'base', $data );
		}
	}