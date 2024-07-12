<?php
	
	namespace App\Controllers;
	
	use App\Controllers\BaseController;
	use App\Models\UserModel;
	use CodeIgniter\HTTP\RedirectResponse;
	use CodeIgniter\HTTP\ResponseInterface;
	
	class SigninController extends BaseController {
		public function index (): string|RedirectResponse {
			if ($this->validateSession ()){
				return redirect ('/');
			}
			$data = [ 'session' => FALSE ];
			return view ( 'header', $data ) . view ( 'signin' ) . view ( 'footer' );
		}
		public function signIn (): ResponseInterface|bool {
			$session = session ();
			$userModel = new UserModel();
			if ( $data = $this->verifyRules ( 'POST', $this->request, NULL ) ) {
				return ( $data );
			}
			$input = $this->getRequestInput ( $this->request );
			return $this->getResponse ( $input );
//			$email = $this->request->getVar ( 'email' );
//			$password = $this->request->getVar ( 'password' );
//
//
//
//			$data = $userModel->where ( 'email', $email )->first ();
//			if ( $data ) {
//				$pass = $data[ 'password' ];
//				$authenticatePassword = password_verify ( $password, $pass );
//				if ( $authenticatePassword ) {
//					$ses_data = [
//						'id' => $data[ 'id' ],
//						'name' => $data[ 'name' ],
//						'email' => $data[ 'email' ],
//						'isLoggedIn' => TRUE,
//					];
//					$session->set ( $ses_data );
//					return redirect ()->to ( '/profile' );
//
//				} else {
//					$session->setFlashdata ( 'msg', 'Password is incorrect.' );
//					return redirect ()->to ( '/signin' );
//				}
//			} else {
//				$session->setFlashdata ( 'msg', 'Email does not exist.' );
//				return redirect ()->to ( '/signin' );
//			}
		}
	}
