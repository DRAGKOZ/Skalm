<?php
	
	namespace App\Controllers;
	
	use App\Controllers\BaseController;
	use CodeIgniter\HTTP\RedirectResponse;
	use CodeIgniter\HTTP\ResponseInterface;
	
	class SignupController extends BaseController {
		public function index (): string|RedirectResponse {
			if ( $this->validateSession () ) {
				return redirect ( '/' );
			}
			$header = [ 'session' => FALSE ];
			$data = [];
			return view ( 'header', $header ) . view ( 'signup', $data ) . view ( 'footer' );
		}
		public function signup () {
			if ( $data = $this->verifyRules ( 'POST', $this->request, NULL ) ) {
				return ( $data );
			}
			$input = $this->getRequestInput ( $this->request );
			$validation = service ( 'validation' );
			$validation->setRules ( [
				'name' => 'required|max_length[30]',
				'lastname' => 'required|max_length[30]',
				'sureName' => 'max_length[30]',
				'birthday' => 'required|max_length[30]',
				'gender' => 'required|max_length[30]',
				'nickname' => 'required|max_length[30]',
				'email' => 'required|max_length[254]|valid_email',
				'phone' => 'required|max_length[30]',
				'password' => 'required|min_length[6]|max_length[7]',
				'passwordConfirm' => 'required|min_length[8]|max_length[255]|matches[password]',
			], [
				'password' => [ 'required' => 'Toda cuenta necesita una contraseña para poder iniciar sesión',
					'max_length' => 'La contraseña no debe tener mas de {param} caracteres',
					'min_length' => 'La contraseña deber tener un mínimo de {param}caracteres' ],
				'passwordConfirm' => [ 'required' => 'Toda cuenta necesita una contraseña para poder iniciar sesión',
					'max_length' => 'La contraseña no debe tener mas de 255 caracteres',
					'min_length' => 'La contraseña deber tener un mínimo de 8 caracteres',
					'matches' => 'Las contraseñas no son iguales',],
				
			] );
			if ( $validation->run ( $input ) ) {
				$validatedData = $validation->getValidated ();
				var_dump ( 'Es valido' );
				var_dump ( $validatedData );
			} else {
				$errors = $validation->getErrors ();
				var_dump ( 'No es valido' );
				var_dump ( $errors );
			}
			die();
		}
	}
