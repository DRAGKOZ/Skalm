<?php
	
	namespace App\Controllers;
	use App\Controllers\BaseController;
	
	class Numericos extends BaseController
	
	
	class Numericos extends CI_Controller {
		public function index () {
//			for ( $i = 0; $i <= 250; $i++ ) {
//				$b32 = $this->decimal_a_base32 ( $i );
//				$b10 = $this->base32_a_decimal (strval( $b32) );
//				echo $b10 . ' - ' . $b32 . "\r\n<br>";
//			}
			$data = [ 15, 1, 1997, 17, 2, 1996, 21, 6, 1997 ];
			$newArr = [];
			for ( $j = 0; $j < count ( $data ); $j++ ) {
				$delimiter = 'WXYZ';
				$b32 = $this->decimal_a_base32 ( $data[ $j ] );
				$b10 = $this->base32_a_decimal ( strval ( $b32 ) );
				echo $b10 . ' - ' . $b32 . "\r\n<br>";
			}
			$folio = 'FW1W1UDXHZ2X1UCYLX6X1UD';
			$folio = strtoupper ( $folio );
			echo $folio . "<br>";
			$slided = $this->slide32 ( $folio );
			print_r ( $slided );
			echo "<br>";
			for ( $i = 0; $i < count ( $slided ); $i++ ) {
				$b10 = $this->base32_a_decimal ( strval ( $slided[ $i ] ) );
				echo $slided[ $i ] . ' - ' . $b10 . "\r\n<br>";
			}
			var_dump ( $this->base32_a_decimal ( 'VVVVVVV' ) );
		}
		function decimal_a_base32 ( $numero ): int|string {
			$base32 = '';
			$base = 32;
			$caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUV';
			if ( $numero === 0 ) {
				return 0;
			}
			while ( $numero > 0 ) {
				$residuo = $numero % $base;
				$base32 = $caracteres[ $residuo ] . $base32;
				$numero = floor ( $numero / $base );
			}
			return $base32;
		}
		function base32_a_decimal ( $base32 ): float|int {
			$decimal = 0;
			$base = 32;
			$caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUV';
			$longitud = strlen ( $base32 );
			for ( $i = 0; $i < $longitud; $i++ ) {
				$position = strpos ( $caracteres, $base32[ $i ] );
				$decimal += $position * pow ( $base, $longitud - $i - 1 );
			}
			return $decimal;
		}
		function slide32 ( $base32 ): array {
			$delimiter = 'WXYZ';
			$cadena = str_replace ( str_split ( $delimiter ), ',', $base32 );
			return explode ( ',', $cadena );
		}
	}
	}