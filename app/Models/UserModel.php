<?php
	
	namespace App\Models;
	
	use CodeIgniter\Model;
	use Config\Database;
	
	class UserModel extends Model {
		protected $db;
		private string $environment = '';
		private string $dbsandbox = '';
		private string $dbprod = '';
		private string $base;
		public function __construct () {
			parent::__construct ();
			require 'conf.php';
			$this->base = $this->environment === 'SANDBOX' ? $this->dbsandbox : $this->dbprod;
			$this->db = Database::connect ( 'default' );
		}
		/**
		 * Inserta un nuevo usuario y persona
		 *
		 * @param array       $args Datos de la persona y de usuario
		 * @param string|NULL $env  Ambiente en el que se va a trabajar
		 *
		 * @return array
		 */
		public function signUp ( array $args, string $env = NULL ): array {
			//Se declara el ambiente a utilizar
			$this->environment = $env === NULL ? $this->environment : $env;
			$this->base = strtoupper ( $this->environment ) === 'SANDBOX' ? $this->dbsandbox : $this->dbprod;
			$query = "INSERT INTO if0_36211036_skalm.users (nickname, email, password, active)
VALUES ('{$args['nickname']}', '{$args['email']}', '{$args['password']}', 1)";
			$this->db->query ( $query );
			if ( $this->db->affectedRows () === 0 ) {
				return [ FALSE, 0 ];
			}
			$inserted = $this->db->insertID ();
			$birthdate = date ( 'Y-m-d', strtotime ( $args[ 'birthday' ] ) );
			$query2 = "INSERT INTO $this->base.person (user_id, name, last_name, sure_name, gender, birthday, address, phone, active)
VALUES ($inserted, '{$args['name']}', '{$args['lastName']}', ";
			$query2 .= isset( $args[ 'sureName' ] ) ? "'{$args['sureName']}'" : NULL;
			$query2 .= ", '{$args['gender']}', '$birthdate', null, ";
			$query2 .= isset( $args[ 'phone' ] ) ? "'{$args['phone']}'" : NULL;
			$query2 .= ", 1)";
			$this->db->query ( $query2 );
			if ( $this->db->affectedRows () === 0 ) {
				return [ FALSE, 1 ];
			}
			return [ TRUE, $this->db->insertID () ];
		}
	}