<?php

require_once("globals.php");
session_start();

if(isset($_POST["submit_phone"])){
    if (!isset($_POST["phone"])){
        header("Location: ../phone.php?error=requiredphonenumber");
        exit();
    }

    else if (!isset($_POST["confirm-phone"])){
        header("Location: ../phone.php?error=confirmphonenumber");
        exit();
    }

    else if (strlen($_POST["phone"]) !== 8 ){
        header("Location: ../phone.php?error=mustbedanishnumber");
        exit();
    }

    else if ($_POST["phone"] !== $_POST["confirm-phone"]){
        header("Location: ../phone.php?error=phonenumberdoesnotmatch");
        exit();
    }
}

try{

    $db = _db();

    $phone_id = bin2hex(random_bytes(5));
    $phone_verification_key = bin2hex(random_bytes(16));

    $q = $db->prepare("SELECT * FROM mobile_phone WHERE phone_number = :phone_number");
    $q->bindValue(":user_phone", $_POST["phone"]);
    $q->execute();
    $row = $q->fetch();

    if($row > 0){
        header("Location:../phone.php?error=phonetaken");
        exit();

    } else {
        
    $q = $db->prepare("INSERT INTO mobile_phone VALUES (:phone_id, :phone_number, :phone_verification_key, :verified_phone");
    $q->bindValue(":phone_id", $phone_id);
    $q->bindValue(":phone_number", $_POST["phone"]);
    $q->bindValue(":phone_verification_key", $phone_verification_key);
    $q->bindValue(":verified_phone", false);
    $q->execute();

    $to_phone = $_POST["phone"];
    $sms_message = "Welcome, here you can verify your phone number: <a href='http://localhost/reexam/apis/api-validate-phone.php?verification_key=$phone_verification_key>Tap here!</a>";

    require_once("email_verify/send_sms.php");

    //success
    header("Location: ../phone-verification-sms.php");
    exit();

}

} catch (Exception $ex){
    http_response_code(500);
    echo "System not working";
    exit();  
}