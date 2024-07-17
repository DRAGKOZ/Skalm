<?php /** @noinspection PhpMultipleClassDeclarationsInspection */
	
	namespace App\Controllers;
	
	use CodeIgniter\Controller;
	use CodeIgniter\HTTP\CLIRequest;
	use CodeIgniter\HTTP\IncomingRequest;
	use CodeIgniter\HTTP\RequestInterface;
	use CodeIgniter\HTTP\ResponseInterface;
	use CodeIgniter\Validation\Exceptions\ValidationException;
	use Config\Services;
	use DateTime;
	use Psr\Log\LoggerInterface;
	
	abstract class BaseController extends Controller {
		public string $env = 'SANDBOX';
		/**
		 * Instance of the main Request object.
		 *
		 * @var CLIRequest|IncomingRequest
		 */
		protected $request;
		/**
		 * An array of helpers to be loaded automatically upon
		 * class instantiation. These helpers will be available
		 * to all other controllers that extend BaseController.
		 *
		 * @var array
		 */
		protected $helpers = [];
		public function __construct () {
		}
		/**
		 * @param RequestInterface  $request
		 * @param ResponseInterface $response
		 * @param LoggerInterface   $logger
		 *
		 * @return void
		 * @noinspection PhpMultipleClassDeclarationsInspection
		 */
		public function initController ( RequestInterface $request, ResponseInterface $response, LoggerInterface $logger ): void {
			// Do Not Edit This Line
			parent::initController ( $request, $response, $logger );
			// Preload any models, libraries, etc, here.
			// E.g.: $this->session = \Config\Services::session();
		}
		public function getResponse ( array $responseBody, int $code = ResponseInterface::HTTP_OK ): ResponseInterface {
			//			echo json_encode ( $responseBody );
			return $this->response->setStatusCode ( $code )->setJSON ( $responseBody )
				->setHeader ( 'Access-Control-Allow-Origin', '*' )
				->setHeader ( 'Content-Type', 'application/json' )->setContentType ( 'application/json' );
		}
		/**
		 * Obtiene los datos que se reciben en la petición
		 *
		 * @param IncomingRequest $request
		 *
		 * @return array|bool|float|int|mixed|object|string|null
		 */
		public function getRequestInput ( IncomingRequest $request ): mixed {
			$input = $request->getPost ();
			if ( empty( $input ) ) {
				$input = json_decode ( $request->getBody (), TRUE );
			}
			return $input;
		}
		/**
		 * Obtiene los datos que se reciben por GET
		 *
		 * @param IncomingRequest $request
		 *
		 * @return mixed
		 */
		public function getGetRequestInput ( IncomingRequest $request ): mixed {
			$input = $request->getPostGet ();
			//			$input = $request->getPost ();
			if ( empty( $input ) ) {
				$input = json_decode ( $request->getBody (), TRUE );
			}
			return $input;
		}
		/**
		 * Decide el ambiente en el que trabajaran las funciones, por defecto SANDBOX
		 *
		 * @param mixed $env Variable con el ambiente a trabajar
		 *
		 * @return void Asigna el valor a la variable global
		 */
		public function environment ( mixed $env ): void {
			$this->env = isset( $env[ 'environment' ] ) ? strtoupper ( $env[ 'environment' ] ) : 'SANDBOX';
		}
		//====================================|| Errores HTTP ||====================================
		public function serverError ( $description, $reason ): ResponseInterface {
			return $this->getResponse ( [ 'error' => 500, 'description' => $description, 'reason' => $reason ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR );
		}
		public function dataTypeNotAllowed ( $dataType ): ResponseInterface {
			return $this->getResponse ( [ 'error' => 400, 'description' => 'Tipo de dato invalido', 'reason' => 'Se esperaba contenido en formato [' . $dataType . ']' ], ResponseInterface::HTTP_BAD_REQUEST );
		}
		public function methodNotAllowed ( $endpoint ): ResponseInterface {
			return $this->getResponse ( [ 'error' => 405, 'description' => 'Método no implementado', 'reason' => 'El método utilizado no coincide con el que solicita [' . $endpoint . ']' ], ResponseInterface::HTTP_METHOD_NOT_ALLOWED );
		}
		public function errDataSuplied ( $reason ): ResponseInterface {
			return $this->getResponse ( [ 'error' => 400, 'description' => 'Datos de petición incorrectos', 'reason' => $reason ], ResponseInterface::HTTP_BAD_REQUEST );
		}
		public function pageNotFound (): ResponseInterface {
			return $this->getResponse ( [ 'error' => 404, 'description' => 'Recurso no encontrada', 'reason' => 'Verifique que el endpoint sea correcto' ], ResponseInterface::HTTP_NOT_FOUND );
		}
		public function dataNotFound (): ResponseInterface {
			return $this->getResponse ( [ 'error' => 404, 'description' => 'Recurso no encontrada', 'reason' => 'No se encontró información con los datos ingresados' ], ResponseInterface::HTTP_NOT_FOUND );
		}
		//==========================================================================================
		//====================================|| Validaciones y filtros ||====================================
		/**
		 * Permite validar que el método y tipo de dato sean correctos al que solícita el recurso
		 *
		 * @param string      $method   Verbo requerido
		 * @param mixed       $request  Petición completa
		 * @param string|null $dataType Tipo de dato que se requiere
		 *
		 * @return ResponseInterface|bool
		 */
		public function verifyRules ( string $method, mixed $request, ?string $dataType ): ResponseInterface|bool {
			if ( !$request->is ( $method ) ) {
				return $this->methodNotAllowed ( $request->getPath () );
			}
			if ( !is_null ( $dataType ) ) {
				if ( !$request->is ( $dataType ) ) {
					return $this->dataTypeNotAllowed ( $dataType );
				}
			}
			return FALSE;
		}
		/**
		 * Válida que los datos de una petición cumpla con unas reglas específicas
		 *
		 * @param mixed $input    Petición de entrada
		 * @param mixed $rules    Reglas para la validación
		 * @param array $messages Mensaje de errores
		 *
		 * @return bool
		 */
		public function validateRequest ( mixed $input, mixed $rules, array $messages = [] ): bool {
			$this->validator = Services::validation ()->setRules ( $rules );
			if ( is_string ( $rules ) ) {
				$validation = config ( 'Validation' );
				if ( !isset( $validation->$rules ) ) {
					throw ValidationException::forRuleNotFound ( $rules );
				}
				if ( !$messages ) {
					$errorName = $rules . '_errors';
					$messages = $validation->$errorName ?? [];
				}
				$rules = $validation->$rules;
			}
			return $this->validator->setRules ( $rules, $messages )->run ( $input );
		}
		/**
		 * Preparar las fechas para los filtros
		 *
		 * @param mixed  $input fecha de inicio y término
		 * @param string $from
		 * @param string $to
		 *
		 * @return array
		 */
		public function dateFilter ( mixed $input, string $from, string $to ): array {
			$from = DateTime::createFromFormat ( 'Y-m-d', $input[ $from ] );
			$to = DateTime::createFromFormat ( 'Y-m-d', $input[ $to ] );
			$from = strtotime ( $from->format ( 'm/d/y' ) . ' -1day' );
			$to = strtotime ( $to->format ( 'm/d/y' ) . ' +1day' );
			return [ $from, $to ];
		}
		/**
		 * Valida si existe una session activa
		 * @return bool regresa true o false si esta una session activa
		 */
		public function validateSession (): bool {
			$session = session ();
			$login = $session->get ( 'logged_in' ) !== NULL ? $session->get ( 'logged_in' ) : FALSE;
			$session->set ( 'logged_in', $login );
			return $login;
		}
	}
