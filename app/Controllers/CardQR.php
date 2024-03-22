<?php
	
	namespace App\Controllers;
	
	use App\Controllers\BaseController;
	use Endroid\QrCode\Builder\Builder;
	use Endroid\QrCode\Encoding\Encoding;
	use Endroid\QrCode\ErrorCorrectionLevel;
	use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
	use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
	use Endroid\QrCode\Label\Alignment\LabelAlignmentInterface;
	use Endroid\QrCode\Label\Font\NotoSans;
	use Endroid\QrCode\RoundBlockSizeMode;
	use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
	use Endroid\QrCode\Writer\PngWriter;
	
	class CardQR extends BaseController {
		public function index (): string {
			return view ( 'header' ) . view ( 'vCard' ) . view ( 'footer' );
		}
		public function generateVCard () {
			extract ( $_POST );
//			$vcard = "BEGIN:VCARD
//VERSION:2.1
//N:Contacto;Drakoz Prueba;De;;
//FN:Drakoz Prueba De Contacto
//X-ANDROID-CUSTOM:vnd.android.cursor.item/nickname;DRAKOZ;1;;;;;;;;;;;;;
//TEL;:772-118-5658
//TEL;CELL:771-262-5355
//TEL;:772-727-0852
//TEL;:557-474-7474
//URL:https://www.facebook.com/Ocelotlcdmxmg
//NOTE;ENCODING=QUOTED-PRINTABLE:=54=69=70=6F=20=64=65=20=73=61=6E=67=72=65=3A=20=61=2B=0A=4D=6F=74=6F=
//=3A=20=64=6F=6D=69=6E=61=72=20=34=30=30
//BDAY:1997-06-21
//X-ANDROID-CUSTOM:vnd.android.cursor.item/relation;Atzimba;0;Emergencia 1;;;;;;;;;;;;
//X-ANDROID-CUSTOM:vnd.android.cursor.item/relation;Lilia;0;Emergencia 2;;;;;;;;;;;;
//END:VCARD
//";
			$notes = "";
			$vcard = "BEGIN:VCARD\r\n";
			$vcard .= "VERSION:2.1\r\n";
			if ( !empty( $name ) ) {
				$vcard .= "N:$name\r\n";
			}
			if ( !empty( $lastName ) ) {
				$vcard .= "FN:$lastName $name\r\n";
			}
			if ( !empty( $alias ) ) {
				$vcard .= "X-ANDROID-CUSTOM:vnd.android.cursor.item/nickname;$alias;1;;;;;;;;;;;;;\r\n";
			}
			if ( !empty( $birth ) ) {
				$birth = date ( 'Y-m-d', strtotime ( $birth ) );
				$vcard .= "BDAY:$birth\r\n";
			}
			if ( !empty( $blood ) ) {
				$notes .= "Tipo de sangre: $blood\r";
			}
			if ( !empty( $allergies ) ) {
				$notes .= "Alergias: $allergies\r";
			}
			if ( !empty( $nss ) ) {
				$notes .= "NSS: $nss\r";
			}
			if ( !empty( $nameE1 & $phone1 ) ) {
				$notes .= "Contacto de emergencia: $nameE1 Teléfono:$phone1\r";
				$vcard .= "X-ANDROID-CUSTOM:vnd.android.cursor.item/relation;$nameE1;0;Emergencia 1;;;;;;;;;;;;";
				$vcard .= "TEL;:$phone1\r\n";
			}
			if ( !empty( $nameE2 & $phone2 ) ) {
				$notes .= "Contacto de emergencia 2: $nameE2 Teléfono:$phone2\r";
				$vcard .= "X-ANDROID-CUSTOM:vnd.android.cursor.item/relation;$nameE2;0;Emergencia 1;;;;;;;;;;;;";
				$vcard .= "TEL;:$phone2\r\n";
			}
			if ( !empty( $moto ) ) {
				$notes .= "Moto: $moto\r";
			}
			if ( !empty( $plate ) ) {
				$notes .= "Placas: $plate\r";
			}
			if ( !empty( $color ) ) {
				$notes .= "Color: $color\r";
			}
			if ( !empty( $group ) ) {
				$notes .= "Asociación: $group\r";
			}
			if ( !empty( $groupPresident ) ) {
				$notes .= "Presidente: $groupPresident\r";
				$vcard .= "X-ANDROID-CUSTOM:vnd.android.cursor.item/relation;$groupPresident;0;Presidente 1;;;;;;;;;;;;";
			}
			if ( !empty( $groupPhone ) ) {
				$notes .= "Contacto con asociación: $groupPhone\r";
				$vcard .= "TEL;:$groupPhone\r\n";
			}
			if ( !empty( $groupWeb ) ) {
				$vcard .= "URL:$groupWeb\r\n";
			}
			if ( !empty( $notes ) ) {
				$notes = quoted_printable_encode ( $notes );
//				$vcard .= "NOTE;ENCODING=QUOTED-PRINTABLE:$notes";
			}
			$vcard .= "END:VCARD";
			$result = Builder::create ()
				->writer ( new PngWriter() )
				->writerOptions ( [] )
				->data ( $vcard )
				->encoding ( new Encoding( 'UTF-8' ) )
				->errorCorrectionLevel ( new ErrorCorrectionLevelHigh() )
				->size ( 800 )
				->margin ( 25 )
				->roundBlockSizeMode ( new RoundBlockSizeModeMargin() )
				->logoPath ( realpath ( './assets/emergency.png' ) )
				->logoResizeToWidth ( 200 )
				->logoPunchoutBackground ( FALSE )
				->labelText ( 'QR de emergencia' )
				->labelFont ( new NotoSans( 40 ) )
				->labelAlignment ( new LabelAlignmentCenter() )
				->validateResult ( FALSE )
				->build ();
			$nameQr = "qr_" . strtotime ( 'now' ) . ".png";
			$path = $_SERVER[ 'CONTEXT_DOCUMENT_ROOT' ] . '/tmp/' . $nameQr;
			$url = base_url ('/tmp/'.$nameQr);
			$result->saveToFile ( $path );
			sleep ( 2 );
			return json_encode ([
				'fileName' => $nameQr,
				'url'  => $url,
			]);
			/*"Fr3Sk4lmHOstig_24
	m5dHkNe43Bazgl
	IF0_36211036"*/
		}
	}