<?php

 include 'session.php';

require 'vendor/autoload.php';
require_once 'server-connect.php';

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
      $_POST['keyfinal_price']!=null
  ){
    $price=$_POST['keyfinal_price'];
  }


if( $_POST['keydiscount']==1 ) {
  $price = $price - ($price*0.05);
}

if (! isset($_POST['voucher'])) {
    $_POST['voucher'] = '';
}

$servicename=$_POST['keysname'];
  $clinic_id=$_POST['keyclinic_id'];

// $stripe = new \Stripe\StripeClient('sk_test_51OBA6SE0SeKvmf0DuwVgv8URbCDJn9zR0Gw14h4qSvLkXy9PokhrS0lynRmxJ4jQL7iRV58MSqIa4uFvy7zYQLe800ILb3IrBp');
$stripe = new \Stripe\StripeClient('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');

$checkout_session = $stripe->checkout->sessions->create([
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'product_data' => [
        'name' => $servicename,
      ],
      'unit_amount' => round($price, 2) * 100,
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'https://aestheticlinks.com/app_x/views/booking-success.blade.php?keyuser='.$_POST['keyuser'].'&keytime='.$_POST['keytime'].'&keyprice='.$price.'&keydate='.$_POST['keydate'].'&keysname='.$_POST['keysname'].'&keyusername='.$_POST['keyusername'].'&keycname='.$_POST['keycname'].'&keyexpert='.$_POST['keyexpert'].'&keyscity='.$_POST['keyscity'].'&keyscountry='.$_POST['keyscountry'].'&transaction='.$_POST['keytransaction'].'&clinic_id='.$clinic_id.'&note='.$_POST['keynote'].'&service_id='.$_POST['keyservice_id'].'&duration='.$_POST['keyduration'].'&discount='.$_POST['keydiscount'].'&voucher='.$_POST['voucher'],


  'cancel_url' => 'https://aestheticlinks.com/app_x/views/booking-failed.blade.php?keyuser='.$_POST['keyuser'].'&keytime='.$_POST['keytime'].'&keyprice='.$price.'&keydate='.$_POST['keydate'].'&keysname='.$_POST['keysname'].'&keyusername='.$_POST['keyusername'].'&keycname='.$_POST['keycname'].'&keyexpert='.$_POST['keyexpert'].'&keyscity='.$_POST['keyscity'].'&keyscountry='.$_POST['keyscountry'].'&transaction='.$_POST['keytransaction'].'&clinic_id='.$clinic_id,
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
?>

