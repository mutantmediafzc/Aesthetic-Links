<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: landing-page.blade.php');
?>