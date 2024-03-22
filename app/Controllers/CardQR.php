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

class CardQR extends BaseController
{
    public function index(): string
    {
        return view('header') . view('vCard') . view('footer');
    }

    public function generateVCard()
    {
        extract($_POST);
        $vcard = "BEGIN:VCARD\r\n";
        $vcard .= "VERSION:2.1\r\n";
        if (!empty($name)) {
            $vcard .= "N:$name;$lastName\r\n";
        }
        if (!empty($lastName)) {
            $vcard .= "FN:$lastName $name\r\n";
        }
        if (!empty($alias)) {
            $vcard .= "NICKNAME:$alias\r\n";
        }
        if (!empty($birth)) {
            $birth = date('Y-m-d', strtotime($birth));
            $vcard .= "BDAY:$birth\r\n";
        }
        if (!empty($blood)) {
            $vcard .= "X-TIPO-DE-SANGRE:$blood\r\n";
        }
        if (!empty($allergies)) {
            $vcard .= "X-ALLERGIES:$allergies\r\n";
        }
        if (!empty($nss)) {
            $vcard .= "X-NSS:$nss\r\n";
        }
        if (!empty($nameE1)) {
            $vcard .= "X-ANDROID-CUSTOM:vnd.android.cursor.item/relation;$nameE1;0;Emergencia 1;;;;;;;;;;;;\r\n";
        }
        if (!empty($phone1)) {
            $vcard .= "TEL;emergencia1:+521$phone1\r\n";
        }
        if (!empty($name2)) {
            $vcard .= "X-ANDROID-CUSTOM:vnd.android.cursor.item/relation;$name2;0;Emergencia 2;;;;;;;;;;;;\r\n";
        }
        if (!empty($phone2)) {
            $vcard .= "TEL;emergencia2:+521$phone2\r\n";
        }
        if (!empty($moto)) {
            $vcard .= "X-MOTO:$moto\n";
        }
        if (!empty($plate)) {
            $vcard .= "X-PLACAS:$plate\n";
        }
        if (!empty($color)) {
            $vcard .= "X-COLOR:$color\n";
        }
        if (!empty($group)) {
            $vcard .= "X-AGRUPACION:$group\n";
        }
        if (!empty($groupPresident)) {
            $vcard .= "X-PRESIDENTE:$groupPresident\n";
        }
        if (!empty($groupPhone)) {
            $vcard .= "TEL;TYPE=presidente,voice:+521$groupPhone\n";
        }
        if (!empty($groupWeb)) {
            $vcard .= "URL:$groupWeb\n";
        }

        $vcard .= "END:VCARD";
        var_dump($vcard);
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($vcard)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(600)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->logoPath(realpath('./assets/emergency.png'))
            ->logoResizeToWidth(100)
            ->logoPunchoutBackground(true)
            ->labelText('QR de emergencia')
            ->labelFont(new NotoSans(40))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();

        $path = 'C:\web\apps\Skalm\public\qr' . rand(1, 100) . '.png';
        $result->saveToFile($path);
// Generate a data URI to include image data inline (i.e. inside an <img> tag)
        $dataUri = $result->getDataUri();
        var_dump($dataUri);
        echo "<img src='$path' alt='codigo qr'/>";
        /*"Fr3Sk4lmHOstig_24
m5dHkNe43Bazgl
IF0_36211036"*/
    }
}