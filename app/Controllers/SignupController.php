<?php
	
	namespace App\Controllers;
	
	use App\Models\UserModel;
	use CodeIgniter\HTTP\RedirectResponse;
	use CodeIgniter\HTTP\ResponseInterface;
	
	class SignupController extends BaseController {
		public function index (): string|RedirectResponse {
			if ( $this->validateSession () ) {
				return redirect ( '/' );
			}
			$data = [ 'main' => view ('signup',['session'=>FALSE]) ];
			return view ( 'base', $data );
		}
		public function signup (): ResponseInterface|bool {
			if ( $data = $this->verifyRules ( 'POST', $this->request, NULL ) ) {
				return ( $data );
			}
			$input = $this->getRequestInput ( $this->request );
			$validation = service ( 'validation' );
			$validation->setRules ( [
				'name' => 'required|max_length[30]|alpha_space',
				'lastName' => 'required|max_length[30]|alpha_space',
				'sureName' => 'max_length[30]',
				'birthday' => 'required|max_length[30]',
				'gender' => 'required|max_length[30]|alpha_space',
				'nickname' => 'required|max_length[15]',
				'email' => 'required|max_length[254]|valid_email',
				'phone' => 'min_length[10]|max_length[10]|integer',
				'password' => 'required|min_length[8]|max_length[128]',
				'passwordConfirm' => 'required|min_length[8]|max_length[128]|matches[password]',
			], [
				'name' => [ 'max_length' => 'El campo de nombre no debe tener mas de {param} caracteres' ],
				'lastname' => [ 'max_length' => 'El campo de primer apellido no debe tener mas de {param} caracteres' ],
				'sureName' => [ 'max_length' => 'El campo de segundo apellido no debe tener mas de {param} caracteres' ],
				'nickname' => [ 'max_length' => 'El nickName no debe tener mas de {param} caracteres' ],
				'phone' => [ 'max_length' => 'No es un numero de teléfono valido',
					'min_length' => 'No es un numero de teléfono valido', ],
				'password' => [ 'required' => 'Toda cuenta necesita una contraseña para poder iniciar sesión',
					'max_length' => 'La contraseña no debe tener mas de {param} caracteres',
					'min_length' => 'La contraseña deber tener un mínimo de {param} caracteres' ],
				'passwordConfirm' => [ 'required' => 'Toda cuenta necesita una contraseña para poder iniciar sesión',
					'max_length' => 'La contraseña no debe tener mas de {param} caracteres',
					'min_length' => 'La contraseña deber tener un mínimo de {param} caracteres',
					'matches' => 'Las contraseñas no son iguales', ],
			] );
			if ( !$validation->run ( $input ) ) {
				$errors = $validation->getErrors ();
				return $this->errDataSuplied ( $errors );
			}
			$validatedData = $validation->getValidated ();
			$user = new UserModel();
			$res = $user->signUp ( $validatedData, $this->env );
			if ( !$res[ 0 ] ) {
				if ( $res[ 1 ] === 0 ) {
					return $this->serverError ( 'No se logro registrar al usuario', 'El correo ya ha sido registrado' );
				}
				return $this->serverError ( 'No se logro registrar el usuario', 'Los datos ingresados contienen errores' );
			}
			return $this->getResponse ( [ 'error' => 200, 'description' => 'correcto', 'reason' => 'Usuario creado exitosamente' ] );
		}
		public function encryptPassword (){
			if ( $data = $this->verifyRules ( 'POST', $this->request, NULL ) ) {
				return ( $data );
			}
			$input = $this->getRequestInput ( $this->request );
			helper ( 'crypt_helper' );
			return $this->getResponse ([ 'password' => passwordEncrypt ($input['password'])]);
		}
	}
