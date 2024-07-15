<?php

require_once 'connection.php';

$clinicId = $_POST['id'];

$query = "SELECT r.user_id as user, r.rating as rating, r.content as content FROM reviews r WHERE r.cunique = " . $clinicId;

$result = $con->query($query);
$results = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($results);
