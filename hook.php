
<?php

$json = file_get_contents('php://input');
// Converts it into a PHP object

$logFile = fopen("log.txt", 'a') or die("Error creando archivo");
fwrite($logFile, print_r($json, true));
fclose($logFile);

require_once './vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");


if ($_GET["topic"] == "payment") {
        
    $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
    $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
     
    $logFile = fopen("log.txt", 'a') or die("Error creando archivo");
    fwrite($logFile, print_r($payment, true));
    fclose($logFile);

    $logFile = fopen("log2.txt", 'a') or die("Error creando archivo");
    fwrite($logFile, print_r($merchant_order, true));
    fclose($logFile);
}

file_put_contents("log3.txt",json_encode($_POST));

ob_clean();
header("HTTP/1.1 200 OK");

?>