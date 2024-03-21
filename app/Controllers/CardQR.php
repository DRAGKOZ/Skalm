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
			$result = Builder::create()
				->writer(new PngWriter())
				->writerOptions([])
				->data('Custom QR code contents')
				->encoding(new Encoding('UTF-8'))
				->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
				->size(300)
				->margin(10)
				->roundBlockSizeMode(new RoundBlockSizeModeMargin())
				->logoPath(realpath ('./assets/emergency.png'))
				->logoResizeToWidth(50)
				->logoPunchoutBackground(true)
				->labelText('This is the label')
				->labelFont(new NotoSans(20))
				->labelAlignment(new LabelAlignmentCenter())
				->validateResult(false)
				->build();

			echo $result->getString();

// Save it to a file
			$result->saveToFile('C:\web\apps\Skalm\public\qr.png');
// Generate a data URI to include image data inline (i.e. inside an <img> tag)
			$dataUri = $result->getDataUri();
			"Fr3Sk4lmHOstig_24
m5dHkNe43Bazgl
IF0_36211036"
		}
	}