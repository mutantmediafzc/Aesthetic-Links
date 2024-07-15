<?php include 'session.php';?>

<?php require_once 'server-connect.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once "Mail.php";

    $stmt = $con->prepare('SELECT email, mobile, userlevel FROM accounts WHERE id = ?');
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($email, $mobile, $userlevel);
	$stmt->fetch();
	$stmt->close();
	
	    $keyprice = isset($_GET['keyprice']) ? $_GET['keyprice'] : null;
    $newuserlevel=$keyprice+$userlevel;

    $updateStmt = $con->prepare("UPDATE accounts SET userlevel = ? WHERE id = ?");
    $updateStmt->bind_param('ss', $newuserlevel, $_SESSION['id']);
    $updateStmt->execute();

    $updateStmt->close();


$userunique = 3;
$stmt = $con->prepare('SELECT email FROM accounts WHERE userunique = ?');
	$stmt->bind_param('i', $userunique);
	$stmt->execute();
	$stmt->bind_result($adminemail);
	$stmt->fetch();
	$stmt->close();

$keyuser = isset($_GET['keyuser']) ? $_GET['keyuser'] : null;
$keytime = isset($_GET['keytime']) ? $_GET['keytime'] : null;
// $keyscprice = isset($_GET['keyscprice']) ? $_GET['keyscprice'] : null;
// $keysprice = isset($_GET['keysprice']) ? $_GET['keysprice'] : null;
$keydate = isset($_GET['keydate']) ? $_GET['keydate'] : null;
$keysname = isset($_GET['keysname']) ? $_GET['keysname'] : null;
$keyusername = isset($_GET['keyusername']) ? $_GET['keyusername'] : null;
$keycname = isset($_GET['keycname']) ? $_GET['keycname'] : null;
$keyexpert = isset($_GET['keyexpert']) ? $_GET['keyexpert'] : null;
$keyscity = isset($_GET['keyscity']) ? $_GET['keyscity'] : null;
$keyscountry = isset($_GET['keyscountry']) ? $_GET['keyscountry'] : null;
$transaction = isset($_GET['transaction']) ? $_GET['transaction'] : null;
$clinic = isset($_GET['clinic_id']) ? $_GET['clinic_id'] : null;
$note = isset($_GET['note']) ? $_GET['note'] : null;
$service_id = isset($_GET['service_id']) ? $_GET['service_id'] : null;
$duration = isset($_GET['duration']) ? $_GET['duration'] : null;
$voucher = isset($_GET['voucher']) ? $_GET['voucher'] : null;

// $keydate = date('Y-m-d', strtotime($keydate)); // Convert date to MySQL format if it's not already
// $keytime = date('H:i:s', strtotime($keytime)); 
$expert=$keyexpert;
$location=$keyscity.' ,'.$keyscountry;
// $stmt = "SELECT * FROM experts WHERE id = '$expert'";
//     $result = $con->query($stmt);

//     $expert_name=$row['expname'];

// 	$result = $con->query($stmt);
if (! is_null($voucher)) {
    $stmt = $con->prepare('SELECT v.* FROM vouchers v WHERE v.voucher_code = ? LIMIT 1');
    $stmt->bind_param('s', $voucher);
    $stmt->execute();
    $result = $stmt->get_result();
    $vouchers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (count($vouchers) > 0) {
        $row = $vouchers[0];

        if ($row['is_global'] == 1) {
            $counter = $row['claim_counter'] + 1;

            $stmt = $con->prepare("UPDATE vouchers SET claim_counter = {$counter} WHERE voucher_id = ?");
            $stmt->bind_param('i', $row['voucher_id']);
            $stmt->execute();
        } else {
            $stmt = $con->prepare("UPDATE vouchers SET is_claimed = 1 WHERE voucher_code = ?");
            $stmt->bind_param("s", $voucher);
            $stmt->execute();
        }
    }
}


if($keyexpert!='any'){
 $sql = "SELECT * FROM experts WHERE id = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("i", $expert);
  $stmt->execute();
  $result = $stmt->get_result();

	
	  if ($result->num_rows>0) {
    $row = $result->fetch_assoc();
      }
     $expert_name=$row['expname'];
   
}else{
    $expert_name="any";
}
$sql2 = "SELECT * FROM clinics WHERE cunique =  ?";
  $stmt2 = $con->prepare($sql2);
  $stmt2->bind_param("i", $clinic);
  $stmt2->execute();
  $result = $stmt2->get_result();

	  if ($result->num_rows>0) {
    $row = $result->fetch_assoc();
      }
     $calendar_id=$row['calendar_id'];

$cliniemail=$row['cemail'];
$clinicAddress = "{$row['ccity']}, {$row['ccountry']}";
$clocation=$row['clocation'];

    $price=$keyprice;
    $type=$transaction;

$status='pending';

$stmt = $con->prepare("INSERT INTO appointments (cname, location, sname, profilelevel	, date , time , username , expert , expert_name, amount , type , status, cunique, sunique, note) VALUES (?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssssss", $keycname, $location, $keysname, $keyuser, $keydate, $keytime, $keyusername, $expert,$expert_name,$price,$type,$status,$clinic,$service_id,$note);
$stmt->execute();
$stmt->close();

// Add success no
$service = "SELECT success_no FROM services WHERE id =  ?";
$serviceStmt = $con->prepare($service);
$serviceStmt->bind_param("s", $service_id);
$serviceStmt->execute();
$serviceResult = $serviceStmt->get_result();

$clinicQry = "SELECT success_no FROM clinics WHERE cunique =  ?";
$clinicStmt = $con->prepare($clinicQry);
$clinicStmt->bind_param("s", $clinic);
$clinicStmt->execute();
$clinicResult = $clinicStmt->get_result();

if ($serviceResult->num_rows>0) {
    $row = $serviceResult->fetch_assoc();
    $successCount = $row['success_no'] + 1;

    $stmt = $con->prepare("UPDATE services SET success_no = $successCount WHERE id = '$service_id'");
    $stmt->execute();
    $stmt->close();
}

if ($clinicResult->num_rows>0) {
    $row = $clinicResult->fetch_assoc();
    $successCount = $row['success_no'] + 1;

    $stmt = $con->prepare("UPDATE clinics SET success_no = $successCount WHERE cunique = '$clinic'");
    $stmt->execute();
    $stmt->close();
}

$con->close();

// Initialize Google Client
$client = new Google_Client();
$client->setApplicationName('Your App Name');
$client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
$credentials = __DIR__ . '/credentials.json';
$client->setAuthConfig($credentials); // Path to your Google API credentials JSON file
$client->setAccessType('offline'); // Access token will be valid indefinitely

// Initialize Google Calendar Service
$calendarService = new Google_Service_Calendar($client);

// Function to add appointment to clinic's calendar
function addAppointmentToCalendar($eventDetails, $clinicCalendarId, $calendarService) {
    try {
        // Create event object
        $event = new Google_Service_Calendar_Event(array(
            'summary' => $eventDetails['summary'],
            'description' => $eventDetails['description'],
            'start' => array(
                'dateTime' => $eventDetails['startDateTime'],
                'timeZone' => 'Europe/Zurich', // Example time zone, replace with appropriate time zone
            ),
            'end' => array(
                'dateTime' => $eventDetails['endDateTime'],
                'timeZone' => 'Europe/Zurich', // Example time zone, replace with appropriate time zone
            ),
        ));

        // Insert event into the clinic's calendar
        $calendarService->events->insert($clinicCalendarId, $event);
        return true;
    } catch (Exception $e) {
        // Handle error
        return $e;
    }
}

$summary='Appointment with client:'.$keyusername.', Expert:'.$expert_name;
if($note!=null){
    $description = 'Service name:'.$keysname.', Service Type: '.$type.', Preference:'.$note;
}else{
    $description = 'Service name:'.$keysname.'Service Type: '.$type;
}
$dateTime = DateTime::createFromFormat('Y-m-d', $keydate);
$formattedDate = $dateTime->format('Y-m-d');

$startDate=$formattedDate.'T'.$keytime;

$dateTimenew = DateTime::createFromFormat('H:i:s', $keytime);

// Add one hour
$dateTimenew->modify('+1 hour');

// Format the modified time as desired (HH:MM:SS)
$modifiedTime = $dateTimenew->format('H:i:s');

$endDate=$formattedDate.'T'.$modifiedTime;
// Example appointment details (you should fetch these from your database)
$appointmentDetails = array(
    'summary' => $summary,
    'description' => $description,
    'startDateTime' => $startDate, // Start date and time in ISO 8601 format
    'endDateTime' => $endDate, // End date and time in ISO 8601 format
);

// Example clinic calendar ID (replace with actual ID)
$clinicCalendarId = $calendar_id;

// Add appointment to clinic's calendar
$result = addAppointmentToCalendar($appointmentDetails, $clinicCalendarId, $calendarService);
if ($result) {

} else {
    echo 'Error adding appointment to google calendar.';
}

// mail

$smtpHost = 'smtp.hostinger.com';
$smtpPort = "993"; // Adjust port if necessary
$smtpUsername = "hello@aestheticlinks.com";
$smtpPassword = "AnL123@@";


// Sender and recipient details
$from = 'hello@aestheticlinks.com';
$to = $cliniemail.', '.$email.', '.$adminemail;
$subject = 'Aesthetic Links Booking';

// HTML content for the email body
$body = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <title>Aesthetic Links Booking</title>
  <style>
    html {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
  

</head>
<body style="
    text-align: center;
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: \'Poppins\', sans-serif;
    font-weight: 500;
    font-style: normal;
    line-break: anywhere;
">


  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; height: 100%;">
    <tr>
      <td style="background-color: #0D2748;">
        <table role="presentation" cellspacing="0" cellpadding="0" width="100%" style="height: 100%;">
          <tr>
            <td>
              <center>       
              <img style="width:40%; margin-top: 20%;" src="https://aestheticlinks.com/app-adas/views/assets/images/logo-anl-w.png" alt="Aesthetic Links Logo"/>
              </center> 
            </td>
          </tr>
          <tr>
            <td style="padding: 0 24px;">
              <h2 style="
                color: #fff;
                font-size: 28px;
                margin: 0;
                margin-bottom: 24px;"
              >
                <center>
                Thanks for your booking!
                </center>  
              </h2>
              <div style="background-color: #fff; border-radius: 20px; max-width: 600px; margin: 0 auto;">
                <table role="presentation" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;">
                  <tr>
                    <td>
                      <p style="
                        text-align: left;
                        padding-left: 1rem;
                        font-size: 20px;
                        font-weight: 700;
                        color: #0D2748;"
                      >
                        Booking details
                      </p>
                    </td>
                  </tr>
                </table>
                <table role="presentation" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;">
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Service name:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$keysname.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Clinic name:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$keycname.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Clinic Address:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$clinicAddress.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Client name:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$keyusername.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Client Phone:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$mobile.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Expert name:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$expert_name.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Preference:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$note.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Time:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$keytime.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Date:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$keydate.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">duration:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$duration.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Paid amount:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$price.' USD</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Service type:</td>
                    <td style="padding-right: 24px; color: #98C3BC; font-size: 16px; text-align: right;">'.$type.'</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 24px; padding-bottom: 24px; font-weight: 600; color: #0D2748; font-size: 18px; margin: 0; text-align: left;">Clinic Location:</td>
                <a style="padding-right: 24px; padding-bottom: 24px; font-weight: 600; color: #46AFB4; font-size: 18px; margin: 0; text-align: right;color: #46AFB4; text-decoration: none;" href="'.$clocation.'">ClickHere</a>
                    
                   
                    
                  </tr>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td>
                <center>
              <p style="
                font-style: italic;
                color: #fff;
                font-size: 14px;
                white-space: pre-line;
                opacity: 0.7;
                margin: 1rem 0;"
              >Please reach out to support on our app if you 
                require assistance.
              </p>
              </center>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
';

// SMTP configuration array
$smtpConfig = array(
    'host' => $smtpHost,
    'port' => $smtpPort,
    'auth' => true,
    'username' => $smtpUsername,
    'password' => $smtpPassword
);

// Email headers
$headers = array(
    'From' => $from,
    'Content-Type' => 'text/html; charset=UTF-8'
);

// Create the SMTP connection
$smtp = mail($to, $subject, $body, $headers);

// Send the email
if ($smtp) {
} else {
    echo 'Email sending failed!';
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic Links | Booking</title>
    
        <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.min.css">
  <script src="https://cdn.jsdelivr.net/gh/mohamadadithya/calendarify@latest/dist/calendarify.iife.js"></script>

    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N7QLJTK5');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11265900324"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-11265900324');
    </script>

</head>

<script src="https://kit.fontawesome.com/a49b3edde3.js" crossorigin="anonymous"></script>
<style>

    /* --------------------------------menu------------------------------------- */

    .modal {
        display: none;
        position: fixed;
        z-index: 5;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.6);
    }
    
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        width: 100%;
        height: 25vh;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .closeMenu {
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 1px solid #444444;
        float: right;
        font-size: 28px;
        font-weight: bold;
        right: 5%;
        margin-top: -150px;
    }

    .closeMenu:hover,
    .closeMenu:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    /* ------------------------------------------------------------------------- */
    
    .line-divider-box {
        margin-bottom: 50px; 
        margin-top: 50px;
    }
    
    hr.solid-thin-line {
        width: 85%;
        border-bottom: 1px solid #ccc;
        margin: auto;
    }


    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        padding-bottom: 15%;
        background-color: #F1F1F1;
        
    }

    nav {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        padding-top: 5%;
        padding-bottom: 5%;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        z-index: 2;
        background-color: #fff;
    }

    .location-dropdown-container {
        display: flex;
        justify-content: flex-end;
        width: 90%;
        height: auto;
    }

    .menu-btn {
        position: absolute;
        width: 85px;
        height: 85px;
        border-radius: 25px;
        background-color: #0C1E36;
        
    }

    .location-dropdown {
        width: 100%;
        height: 85px;
        font-size: 38px;
        font-weight: 600;
        background-color: transparent;
        border-style: none;
    }

    .filter-arrow-down {
        font-size: 24pt;
    }
    
    #hamburger-icon {
        color: #fff; 
        font-size: 48px;
    }
    
    .modal-logo {
        width: 375px;
        height: auto;
    }
    
    .modal-item-box {
        width: 100%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(4, 1fr); 
        column-gap: 60px;
    }
    
    
    .modal-item {
        display: flex; 
        justify-content: center; 
        align-items: center; 
        width: 110px; 
        height: 110px; 
        border: 1px solid #444444; 
        border-radius: 50%;
    }
    
    .modal-item-icon {
        width: 45px; 
        height: auto;
    }
    
    .modal-name-box {
        width: 100%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(4, 1fr); 
        column-gap: 60px;
    }
    
    .modal-name {
        width: 110px; 
        height: auto;
    }
    
    .modal-p {
        width: 100%; 
        text-align: center; 
        font-size: 24px;
    }
    
    .modal-p-1 {
        width: 100%; 
        text-align: center; 
        font-size: 24px;
        margin-left: -35px;
    }
    
    .modal-content-box {
        margin: auto; 
        width: 65%; 
        height: auto; 
        display: grid; 
        grid-template-columns: repeat(1, 1fr); 
        margin-top: 12%;
    }
    
    .back-btn {
        position: absolute;
        left: 5%;
        margin-top: 7vw;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border-style: none;
        box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
        background-color: #fff;
        
    }
    
    #back-arrow {
        color: #a1a1a1; 
        font-size: 28px;
    }
    
    /*---------------------------------------------------*/
    
    .spacer {
        width: 100%;
        height: 19vw;
    }
    
    .success-box {
        margin: auto;
        width: 90%;
        height: max-content;
        background-color: #fff;
        border-radius: 20px;
        margin-top: 15vw;
        padding-top: 5%;
        padding-bottom: 5%;
    }
    
    .first-box {
        margin: auto;
        width: 90%;
        height: max-content;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
    }
    
    .second-box {
        margin: auto;
        width: 85%;
        height: max-content;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 5px;
    }
    
    .img-box {
        margin: auto;
        width: 200px;
        height: 200px;
    }
    
    .img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .header-text-box {
        width: 100%;
        height: auto;
    }
    
    .header-text-box h1 {
        width: 100%;
        text-align: center;
        font-size: 38px;
        margin: 0;
        color: #212121;
    }
    
    .paragraph-text-box p {
        width: 100%;
        text-align: center;
        font-size: 28px;
        margin: 0;
        color: #212121;
    }
    
    .info-box {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: space-between;
    }
    
    .header-details {
        width: max-content;
        margin: 0;
        font-size: 34px;
        color: #212121;
    }
    
    .paragraph-details {
        width: max-content;
        margin: 0;
        font-size: 34px;
        color: #212121;
    }
    
    .booking-btn-container {
        width: 90%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        row-gap: 20px;
        margin-bottom: 10%;
    }

    .book-now {
        width: 100%;
        height: 100px;
        font-size: 34px;
        font-weight: 600;
        color: #fff;
        background-color: #0C1E36;
        border-radius: 20px;
        margin-top: 0;
    }
    
    .explore-btn {
        width: 100%; 
        height:auto; 
        margin: 0; 
        padding: 0; 
        font-size: 28px; 
        color: #0C1E36;
    }
    
    .btn-box {
        position:fixed; 
        left:0px; 
        bottom:0px; 
        height: auto; 
        width:100%; 
        display: grid; 
        grid-template-columns: repeat(1, 1fr);
        row-gap: 10px;
    }
    
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
        .success-box {
            margin: auto;
            width: 90%;
            height: max-content;
            background-color: #fff;
            border-radius: 20px;
            margin-top: 15vw;
            padding-top: 10%;
            padding-bottom: 10%;
        }
        
        .first-box {
            margin: auto;
            width: 90%;
            height: max-content;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
        }
        
        .img-box {
            margin: auto;
            width: 100px;
            height: 100px;
        }
        
        .explore-btn {
            width: 100%; 
            height:auto; 
            margin: 0; 
            padding: 0; 
            font-size: 14px; 
            color: #0C1E36;
        }
        
        .book-now {
            width: 100%;
            height: 50px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }
        
        .paragraph-details {
            width: max-content;
            margin: 0;
            font-size: 14px;
            color: #212121;
        }
        
        .header-details {
            width: max-content;
            margin: 0;
            font-size: 14px;
            color: #212121;
        }
        
        .paragraph-text-box p {
            width: 100%;
            text-align: center;
            font-size: 14px;
            margin: 0;
            color: #212121;
        }
        
        .header-text-box h1 {
            width: 100%;
            text-align: center;
            font-size: 18px;
            margin: 0;
            color: #212121;
        }
        
        .line-divider-box {
            margin-bottom: 10px; 
            margin-top: 10px;
        }

        
        .closeMenu {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20pt;
            height: 20pt;
            border-radius: 50%;
            border: 1px solid #444444;
            float: right;
            font-size: 10pt;
            font-weight: bold;
            right: 7%;
            margin-top: 18pt;
        }
        
        .back-btn {
            position: absolute;
            left: 5%;
            margin-top: 7vw;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            
        }
        
        #back-arrow {
            color: #a1a1a1; 
            font-size: 12pt;
        }
        
        .view-all-clinics {
            width: 90%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 5%;
        }
        
        
        nav {
            padding-top: 10pt;
            padding-bottom: 10pt;
        }
        
        .menu-btn {
            position: absolute;
            width: 35pt;
            height: 35pt;
            border-radius: 10pt;
            background-color: #0C1E36;
            
        }
        
        #filter-arrow-down {
            font-size: 10pt;
        }
        
        #hamburger-icon {
            color: #fff; 
            font-size: 16pt;
        }
        
        .location-dropdown {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #212121;
            background-color: transparent;
            border-style: none;
        }
        
        .location-dropdown img {
            margin: auto; 
            width: 12pt; 
            height: auto;
        }
        
        .modal-logo {
            width: 125pt;
            height: auto;
        }
        
        .modal-item {
            display: flex; 
            justify-content: center; 
            align-items: center; 
            width: 35pt; 
            height: 35pt; 
            border: 1px solid #444444; 
            border-radius: 50%;
        }
        
        .modal-item-icon {
            width: 15pt; 
            height: auto;
        }
        
        .modal-item-box {
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            column-gap: 15pt;
        }
        
        
        .modal-name-box {
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            column-gap: 15pt;
        }
        
        .modal-name {
            width: 35pt; 
            height: auto;
        }
        
        .modal-p {
            width: 100%; 
            text-align: center; 
            font-size: 8pt;
        }
        
        .modal-p-1 {
            width: 100%; 
            text-align: center; 
            font-size: 8pt;
            margin-left: -7pt;
        }
        
        .modal-content-box {
            margin: auto; 
            width: auto; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(1, 1fr); 
            margin-top: 3%;
        }
        
    }
    
    @media only screen and (max-device-width: 767px) {
        
        .success-box {
            margin: auto;
            width: 90%;
            height: max-content;
            background-color: #fff;
            border-radius: 20px;
            margin-top: 15vw;
            padding-top: 10%;
            padding-bottom: 10%;
        }
        
        .first-box {
            margin: auto;
            width: 90%;
            height: max-content;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            row-gap: 10px;
        }
        
        .img-box {
            margin: auto;
            width: 100px;
            height: 100px;
        }
        
        .explore-btn {
            width: 100%; 
            height:auto; 
            margin: 0; 
            padding: 0; 
            font-size: 14px; 
            color: #0C1E36;
        }
        
        .book-now {
            width: 100%;
            height: 50px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 10px;
            margin-top: 0;
        }
        
        .paragraph-details {
            width: max-content;
            margin: 0;
            font-size: 14px;
            color: #212121;
        }
        
        .header-details {
            width: max-content;
            margin: 0;
            font-size: 14px;
            color: #212121;
        }
        
        .paragraph-text-box p {
            width: 100%;
            text-align: center;
            font-size: 14px;
            margin: 0;
            color: #212121;
        }
        
        .header-text-box h1 {
            width: 100%;
            text-align: center;
            font-size: 18px;
            margin: 0;
            color: #212121;
        }
        
        .line-divider-box {
            margin-bottom: 10px; 
            margin-top: 10px;
        }

        
        .closeMenu {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20pt;
            height: 20pt;
            border-radius: 50%;
            border: 1px solid #444444;
            float: right;
            font-size: 10pt;
            font-weight: bold;
            right: 7%;
            margin-top: 18pt;
        }
        
        .back-btn {
            position: absolute;
            left: 5%;
            margin-top: 7vw;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border-style: none;
            box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.1);
            background-color: #fff;
            
        }
        
        #back-arrow {
            color: #a1a1a1; 
            font-size: 12pt;
        }
        
        .view-all-clinics {
            width: 90%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 500;
            color: #fff;
            background-color: #0C1E36;
            border-radius: 5pt;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 5%;
        }
        
        
        nav {
            padding-top: 5%;
            padding-bottom: 5%;
        }
        
        .menu-btn {
            position: absolute;
            width: 35pt;
            height: 35pt;
            border-radius: 10pt;
            background-color: #0C1E36;
            
        }
        
        #filter-arrow-down {
            font-size: 10pt;
        }
        
        #hamburger-icon {
            color: #fff; 
            font-size: 16pt;
        }
        
        .location-dropdown {
            width: 100%;
            height: 35pt;
            font-size: 12pt;
            font-weight: 550;
            color: #212121;
            background-color: transparent;
            border-style: none;
        }
        
        .location-dropdown img {
            margin: auto; 
            width: 12pt; 
            height: auto;
        }
        
        .modal-logo {
            width: 125pt;
            height: auto;
        }
        
        .modal-item {
            display: flex; 
            justify-content: center; 
            align-items: center; 
            width: 35pt; 
            height: 35pt; 
            border: 1px solid #444444; 
            border-radius: 50%;
        }
        
        .modal-item-icon {
            width: 15pt; 
            height: auto;
        }
        
        .modal-item-box {
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            column-gap: 15pt;
        }
        
        
        .modal-name-box {
            width: 100%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            column-gap: 15pt;
        }
        
        .modal-name {
            width: 35pt; 
            height: auto;
        }
        
        .modal-p {
            width: 100%; 
            text-align: center; 
            font-size: 8pt;
        }
        
        .modal-p-1 {
            width: 100%; 
            text-align: center; 
            font-size: 8pt;
            margin-left: -7pt;
        }
        
        .modal-content-box {
            margin: auto; 
            width: 65%; 
            height: auto; 
            display: grid; 
            grid-template-columns: repeat(1, 1fr); 
            margin-top: 3%;
        }
        
    }

</style>

<body>

    <?php include 'nav.php'; ?>	
	
    <!---- Menu Start --->
	
	<?php include 'menu.php'; ?>
	<!---- Menu End ----->
    
    <!-- ----------------------------menu modal end-------------------------->
    
    <div class="spacer"></div>
    
    <div class="success-box">
        <div class="first-box">
            <div class="img-box">
                <img src="assets/images/success.svg">
            </div>
            <div class="header-text-box">
                <h1>Booking Successful!</h1>
            </div>
            <div class="paragraph-text-box">
                <p></p>
            </div>
        </div>
        
        <div class="line-divider-box">
            <hr class="solid-thin-line">
        </div>
        
        <div class="second-box">
            <div class="info-box">
                <h1 class="header-details">Name</h1>
                <p class="paragraph-details"><?=$keyusername?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Service name</h1>
                <p class="paragraph-details"><?=$keysname?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Clinic name</h1>
                <p class="paragraph-details"><?=$keycname?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Expert name</h1>
                <p class="paragraph-details"><?=$expert_name?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Clinic location</h1>
                <p class="paragraph-details"><?=$location?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Date</h1>
                <p class="paragraph-details"><?=$keydate?></p>
            </div>
            <div class="info-box">
                <h1 class="header-details">Time</h1>
                <p class="paragraph-details"><?=$keytime?></p>
            </div>
        </div>
        
        <div class="line-divider-box">
            <hr class="solid-thin-line">
        </div>
        

        <!---->
    </div>
    
    <section style="position:fixed; left:0px; bottom:0px; height:auto; width:100%; display: flex; justify-content: center;">
        <div class="booking-btn-container">
            <a href="myappointments.php?profilelevel=<?=$profilelevel?>"><div><button class="book-now">View Appointments</button></div></a>

            <div>
                <button style="width: 100%; height: auto; margin: 0; padding: 0; border-style: none; background-color: transparent;">
                    <p class="explore-btn"><u>Explore more services</u></p>
                </button>
            </div>
        </div>
    </section>



    <!-- -------------------------------------------------------------------->

    <script>
        // Get the modal
        var modal = document.getElementById("menuModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("menuBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("closeMenu")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
    
</body>
</html>