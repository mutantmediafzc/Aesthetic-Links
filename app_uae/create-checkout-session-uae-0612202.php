<?php
include 'session.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require_once 'server-connect.php';


if (isset($_POST['keyservice_id'])) {
    $keyservice_id = $_POST['keyservice_id'];

    $stmt1 = $con->prepare("SELECT * FROM services WHERE id = ?");
    $stmt1->bind_param("i", $keyservice_id);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = $result->fetch_assoc();

    $counter = $row['checkout_number'] + 1;

    $stmt2 = $con->prepare("UPDATE services SET checkout_number = ? WHERE id = ?");
    $stmt2->bind_param("ii", $counter, $keyservice_id);

    $stmt2->execute();
    $stmt2->close();
    $stmt1->close();
}

if ( isset($_POST['keydate'], $_POST['keytime'], $_POST['keyscprice'], $_POST['keysprice'], $_POST['keyuser'], ) ) {
    $_POST['keydate'];
}
if(isset($_POST['type'])&&$_POST['type']=='max'){
    $price=$_POST['keysprice'];

}else{
    $price=$_POST['keyscprice'];
}

if( isset($_POST['keydiscountprice']) &&
    isset($_POST['keyfinal_price']) &&
    $_POST['keydiscountprice']!=null &&
    $_POST['keyfinal_price']!=null &&
    $_POST['keydiscountprice']!='null' &&
    $_POST['keyfinal_price']!='null'
){
    $price=$_POST['keyfinal_price'];
}


if( $_POST['keydiscount']==1 ) {
    if (isset($_POST['voucher'])) {
        $stmt = $con->prepare('SELECT discount FROM vouchers WHERE voucher_code = ?');
        $stmt->bind_param('s', $_POST['voucher']);
        $stmt->execute();
        $stmt->bind_result($discount);
        $stmt->fetch();
        $stmt->close();

        if (is_null($discount)) {
            $discount = 5;
        }

        $price = $price - ($price * $discount / 100);
    }
}

if (! isset($_POST['voucher'])) {
    $_POST['voucher'] = '';
}

$servicename=$_POST['keysname'];
$clinic_id=$_POST['keyclinic_id'];

$stripe = new \Stripe\StripeClient('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');
//$stripe = new \Stripe\StripeClient('sk_test_51OBA6SE0SeKvmf0DuwVgv8URbCDJn9zR0Gw14h4qSvLkXy9PokhrS0lynRmxJ4jQL7iRV58MSqIa4uFvy7zYQLe800ILb3IrBp');


$checkout_session = $stripe->checkout->sessions->create([
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => $servicename,
            ],
            'unit_amount' => round((int) $price, 2) * 100,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://aestheticlinks.com/app/uae/booking-success-uae.blade.php?keyuser='.$_POST['keyuser'].'&keytime='.$_POST['keytime'].'&keyprice='.$price.'&keydate='.$_POST['keydate'].'&keysname='.$_POST['keysname'].'&keyusername='.$_POST['keyusername'].'&keycname='.$_POST['keycname'].'&keyexpert='.$_POST['keyexpert'].'&keyscity='.$_POST['keyscity'].'&keyscountry='.$_POST['keyscountry'].'&transaction='.$_POST['keytransaction'].'&clinic_id='.$clinic_id.'&note='.$_POST['keynote'].'&service_id='.$_POST['keyservice_id'].'&duration='.$_POST['keyduration'].'&discount='.$_POST['keydiscount'].'&voucher='.$_POST['voucher'],


    'cancel_url' => 'https://aestheticlinks.com/app/uae/booking-failed-uae.blade.php?keyuser='.$_POST['keyuser'].'&keytime='.$_POST['keytime'].'&keyprice='.$price.'&keydate='.$_POST['keydate'].'&keysname='.$_POST['keysname'].'&keyusername='.$_POST['keyusername'].'&keycname='.$_POST['keycname'].'&keyexpert='.$_POST['keyexpert'].'&keyscity='.$_POST['keyscity'].'&keyscountry='.$_POST['keyscountry'].'&transaction='.$_POST['keytransaction'].'&clinic_id='.$clinic_id,
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
?>

