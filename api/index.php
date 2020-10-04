<?php
// SDK de Mercado Pago
require __DIR__ .  '/../vendor/autoload.php';

//ales0sa-mp-commerce-php.herokuapp.com
//$urlweb = "http://localhost/ales0sa-mp-commerce-php/mp-ecommerce-php/";
$urlweb = "https://ales0sa-mp-commerce-php.herokuapp.com/";
// Agrega credenciales
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();


$preference->payment_methods = array(
	"excluded_payment_methods" => array(
		array("id" => "atm")
	),
	"excluded_payment_types" => array(
		array("id" => "amex")
	),
	"installments" => 6
);


$item = new MercadoPago\Item();
$item->title = $_POST['title'];
$item->quantity = $_POST['unit'];
$item->unit_price = $_POST['price'];
$item->description = "Dispositivo móvil de Tienda e-commerce";
$item->picture_url = $_POST['img'];///$urlweb.'/'.$_POST['img'];

//var_dump($item->picture_url);


$payer = new MercadoPago\Payer();

$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_63274575@testuser.com";

$payer->phone = array(
	"area_code" => "11",
	"number" => "22223333"
);

$payer->identification = array(
	"type" => "DNI",
	"number" => "12345678"
);

$payer->address = array(
	"street_name" => "False",
	"street_number" => 123,
	"zip_code" => "1111"
);

$preference->payer = $payer;


$preference->back_urls = array(
	"success" => $urlweb.'success.php',
	"failure" => $urlweb.'fail.php',
	"pending" => $urlweb.'pend.php',
);

$preference->external_reference = "alesosa@gmail.com";
$preference->auto_return = "approved";
$preference->notification_url = $urlweb."hook.php";
$preference->items = array($item);
$preference->save();

//return $preference->id;
?>

<?php //var_dump($preference); ?>

