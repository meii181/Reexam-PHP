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

    $id = $_SESSION["user_id"];

    $q = $db->prepare("SELECT * FROM customers WHERE user_phone = :user_phone");
    $q->bindValue(":user_phone", $_POST["phone"]);
    $q->execute();
    $row = $q->fetch();

    if($row > 0){
        header("Location:../phone.php?error=phonetaken");
        exit();

    } else {
        
    $q = $db->prepare("SELECT * FROM customers WHERE user_id = :user_id");
    $q->bindValue(":user_id", $id);
    $q->execute();
    $row = $q->fetch();
    
    $authentication_key = $row["authentication_key"];

    
    $to_phone = $_POST["phone"];
    $sms_message = "Welcome, here is your OTP: " . $authentication_key;

    require_once("email_verify/send_sms.php");

    $_SESSION["user_phone"] = $row["user_phone"];

    //success
    header("Location: ../authentication_insert_code.php");
    exit();

}

} catch (Exception $ex){
    http_response_code(500);
    echo "System not working";
    exit();  
}