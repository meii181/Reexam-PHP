<?php
session_start();

$to_email = $_SESSION['email'];
$verification = $_SESSION['verification_key'];
$subject = 'Verify your account';
$message = str_replace("%verification_key", $verification, $message);



require_once("../send_email.php");
exit();