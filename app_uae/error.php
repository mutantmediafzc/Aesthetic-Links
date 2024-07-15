<?php include 'session.php'; ?>

<?php require_once 'server.blade.php';?>

<?php
	
$accountId = isset($_GET['id']) ? intval($_GET['id']) : null;
// Connect to database
// Define your SQL query to select all projects
	$stmt = "SELECT * FROM accounts WHERE userunique = '$accountId'";
	// In this case we can use the account ID to get the account info.
	
	
	$result = $con->query($stmt);


	
?>	

<?php
	
	if ($result->num_rows > 0) {					
	while ($row = $result->fetch_assoc()) {
		 
?>

<?php
	
	echo 'username: ' . $row['username'] . ' here
	
	'; }
				} else { echo '<p>No account to display at the moment.</p>'; }?>