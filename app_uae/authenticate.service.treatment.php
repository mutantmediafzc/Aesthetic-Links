<?php
session_start();

if (!isset($_SESSION['login_errors'])) {
	$_SESSION['login_errors'] = [];
}

$cunique = $_GET['cunique'];
$cid = $_GET['id'];

$keydate = htmlspecialchars($_POST['keydate'] ?? null);
$keytime = htmlspecialchars($_POST['keytime'] ?? null);
$keyexpert = htmlspecialchars($_POST['keyexpert'] ?? null);
$keynote = htmlspecialchars($_POST['keynote'] ?? null);

require_once 'server-connect.php';

if (!isset($_POST['email'], $_POST['password'])) {
	$_SESSION['login_errors'][] = 'Please fill both the email and password fields!';
	header('Location: login.blade.treatment.php?cunique=' . $cunique . '&id=' . $cid . '&date=' . $keydate . '&time=' . $keytime . '&expert=' . $keyexpert . '&note=' . $keynote);
	exit();
}

if ($stmt = $con->prepare('SELECT id, password, userlevel FROM accounts WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password, $userlevel);
		$stmt->fetch();

		if (password_verify($_POST['password'], $password)) {
			setcookie('remember_token', $session_token, time() + (86400 * 30));
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['email'];
			$_SESSION['id'] = $id;
			$_SESSION['userlevel'] = $userlevel;

			header('Location: book-now-max-discount.php?cunique=' . $cunique . '&id=' . $cid . '&keydate=' . $keydate . '&keytime=' . $keytime . '&keyexpert=' . $keyexpert . '&keynote=' . $keynote);
			exit();
		} else {
			$_SESSION['login_errors'][] = 'Incorrect password.';
		}
	} else {
		$_SESSION['login_errors'][] = 'Incorrect username.';
	}

	$stmt->close();
	header('Location: login.blade.treatment.php?cunique=' . $cunique . '&id=' . $cid . '&date=' . $keydate . '&time=' . $keytime . '&expert=' . $keyexpert . '&note=' . $keynote);
	exit();
} else {
	$_SESSION['login_errors'][] = 'Failed to prepare the SQL statement.';
	header('Location: login.blade.treatment.php?cunique=' . $cunique . '&id=' . $cid . '&date=' . $keydate . '&time=' . $keytime . '&expert=' . $keyexpert . '&note=' . $keynote);
	exit();
}
