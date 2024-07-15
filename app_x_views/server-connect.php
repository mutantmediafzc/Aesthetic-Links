<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'u670635350_anl';
$DATABASE_PASS = '1ivanYaroslav#';
$DATABASE_NAME = 'u670635350_anlapp';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


function getAndConvertCurrency()
{
	$cookiePrefix = 'currency_rate_';

	// Check if the currency conversion rates cookies exist and are still valid
	if (isset ($_COOKIE[$cookiePrefix . 'USD_TO_CHF'], $_COOKIE[$cookiePrefix . 'USD_TO_AED'], $_COOKIE[$cookiePrefix . 'USD_TO_EUR'], $_COOKIE[$cookiePrefix . 'creation_time'])) {
		$cookieAge = time() - $_COOKIE[$cookiePrefix . 'creation_time'];
		if ($cookieAge < 3600) {
			// Cookies are still valid, no need to fetch new rates
			return false;
		}
	}

	// Cookies are not set or expired, fetch new rates
	$apiUrl = 'https://api.exchangeratesapi.io/v1/latest?access_key=3b59ee7b5cd4122d39352c1e7fbbe147&base=USD&symbols=CHF,AED,EUR';
	$response = file_get_contents($apiUrl);
	if ($response === false) {
		return false; // Error handling if API request fails
	}

	$data = json_decode($response, true);
	$usdToChf = $data['rates']['CHF'];
	$usdToAed = $data['rates']['AED'];
	$usdToEur = $data['rates']['EUR'];

	setcookie($cookiePrefix . 'USD_TO_CHF', $usdToChf, time() + 3600, "/");
	setcookie($cookiePrefix . 'USD_TO_AED', $usdToAed, time() + 3600, "/");
	setcookie($cookiePrefix . 'USD_TO_EUR', $usdToEur, time() + 3600, "/");
	setcookie($cookiePrefix . 'creation_time', time(), time() + 3600, "/");

	return true;
}

$currencyUpdated = getAndConvertCurrency();
if ($currencyUpdated) {
	echo "<script> 
        window.location.reload(); // Refresh the page
    </script>";
}

function UserCountry()
{
	if (isset ($_COOKIE['user_country']) && !empty ($_COOKIE['user_country'])) {
		return $_COOKIE['user_country'];
	}

	$userIp = $_SERVER['REMOTE_ADDR'];
// 	$userIp = "128.14.190.0";
	$apiUrl = "https://tools.keycdn.com/geo.json?host=$userIp";

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $apiUrl);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, [
		'User-Agent: keycdn-tools:https://yourwebsite.com'
	]);

	$response = curl_exec($curl);

	curl_close($curl);

	$data = json_decode($response, true);

	if (isset ($data['data']['geo']['country_name']) && !empty ($data['data']['geo']['country_name'])) {
		$countryName = $data['data']['geo']['country_name'];
		setcookie('user_country', $countryName, time() + 86400);
		if ($countryName == "Switzerland") {
			setcookie('activeCurrency', "CHF", time() + 86400); // Sets the cookie for 1 day
		}
		return $countryName;
	} else {
		return false;
	}
}

function isFirstVisitAndRedirect() {
     if (!isset($_SESSION['redirected']) || $_SESSION['redirected'] == false) {
         $_SESSION['redirected'] = true;

         $userCountry = UserCountry();

        // Redirect based on the user's country
        if ($userCountry != "Switzerland") {
            header('Location: https://aestheticlinks.com/app/uae/landing-page.blade.php');
            exit;
        }
     }
}

 if (!isset($_SESSION['redirected']) || $_SESSION['redirected'] == false) {
     
    isFirstVisitAndRedirect();
}

function currencyConvertor($amount, $currency)
{
	$targetCurrency =  $currency;
	$cookiePrefix = 'currency_rate_';


	if (isset ($_COOKIE[$cookiePrefix . 'creation_time'])) {
		$cookieAge = time() - $_COOKIE[$cookiePrefix . 'creation_time'];

		if ($cookieAge < 3600 && isset ($_COOKIE[$cookiePrefix . 'USD_TO_' . $targetCurrency])) {
			$rate = $_COOKIE[$cookiePrefix
				. 'USD_TO_' . $targetCurrency];
			if ($amount > 0) {
				$convertedAmount = $amount * $rate;
				$roundedAmount = ceil($convertedAmount);
			} else {
				$convertedAmount = 0;
				$roundedAmount = 0;
			}

					return number_format($roundedAmount, 0) . " " . $targetCurrency;

		} else {
			return 'Rates expired, please try again';
		}
	} else {

		return 'Rates not found, please try again';
	}
}

$userCountry = UserCountry();
function convertCurrency($amount)
{


	global $userCountry;
	$amount = (int) $amount;
	if (is_numeric($amount)) {
		if (isset ($amount) && $amount >= 0) {
			 
				return currencyConvertor($amount, "CHF");
		}
			 
	} else {
		return "Invalid format";
	}
}
?>

