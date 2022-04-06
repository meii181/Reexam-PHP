<?php

require_once(__DIR__."../globals.php");
session_start();

if(isset($_POST["send-email"])){

//validate email first
if(!isset($_POST['email'])){
    header("Location: ../pass.php?error=requiredemail");
    exit();
}

else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    header("Location: ../pass.php?error=invalidemail");
    exit();
}
}


$db = _db();

try{

//check for email first 
$q=$db->prepare('SELECT * FROM customers WHERE user_email = :user_email');
$q->bindValue(':user_email', $_POST['email']);
$q->execute();

$row = $q->fetch();

echo 'Number of accounts found:' . $q->rowCount();
$verification_key_pass = $row["forgotten_password"];

//validate the forgotten pass verification key
if(!isset($row['forgotten_password'])){
    header("Location: ../pass.php?error=keynotfound");
    exit();
}

//check for the length
if(strlen($row['forgotten_password']) !== 32){
    header("Location: ../pass.php?error=keyisnot32");
    exit();
}

//send an email to the user to reset pass
$to_email = $_POST['email'];
$subject = 'Reset your password';
$message = "Click the link below to reset your password.
<a href='localhost/reexam/reset-pass.php?verification_key=$verification_key_pass'>Click here!</a>";

require_once(__DIR__."../email_verify/send_email.php");

//success 
header("Location: ../email-sent.php");
exit();

}catch(Exception $ex){
 http_response_code(500);
 echo "System not working";
 exit();
}
