<?php


require __DIR__ .'/vendor/autoload.php';

use \App\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

$obPayload = (new Payload)->setPixKey('1390419')
            ->setDescription('Pagamento do pedido 2')
            ->setMerchantName('Leonardo andre ferreira')
            ->setMerchantCity('Joinville SC')
            ->setAmount('100.00')
            ->setTxid('MAGITEC');


$payloadQrCode = $obPayload->getPayload();

$obQrCode = new QrCode($payloadQrCode);

$image=(new Output\Png)->output($obQrCode,400);

header('Content-Type: image/png');
echo $image;
