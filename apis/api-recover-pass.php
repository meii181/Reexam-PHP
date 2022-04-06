<?php

//connect to database
require_once(__DIR__."../globals.php");
session_start();

//validate key
if(isset($_POST["reset_password"])){

if(!isset($_GET["verification_key"])){
    header("Location: ../reset-pass.php?error=missingkey");
    exit();
}

else if(strlen($_GET["verification_key"]) !== 32){
    header("Location: ../reset-pass.php?error=keyisnot32");
    exit();
}

//validate the password reset
else if(!isset($_POST["reset"])){
    header("Location: ../reset-pass.php?error=passwordrequired");
    exit();
}

else if(!isset($_POST["confirm"])){
    header("../reset-pass.php?error=confirmpassword");
    exit();
}

else if(strlen($_POST["reset"]) > _PASSWORD_MAX_LEN){
    header("Location:../reset-pass.php?error=maxcharacters_15");
    exit();
}

else if(strlen($_POST["confirm"]) < _PASSWORD_MIN_LEN){
    header("Location:../reset-pass.php?error=mincharacters_7");
    exit();

}
}

$db = _db();

try{
    $password_key = $_GET["verification_key"];
    $new_pass = $_POST["reset"];
    $hash_new_password = password_hash($_POST["reset"], PASSWORD_DEFAULT);
    $confirmation = $_POST["confirm"];

    if($new_pass == $confirmation){

    $q=$db->prepare("UPDATE customers SET user_password = :new_password WHERE forgotten_password = :key_password");
    $q->bindValue(":key_password", $password_key);
    $q->bindValue(":new_password", $hash_new_password);
    $q->execute();

    echo "Number of users has been updated: " . $q->rowCount();

    if ($q->rowcount() > 0){
        $new_key = bin2hex(random_bytes(16));

    $q2=$db->prepare("UPDATE customers SET forgotten_password = :new_verification_key WHERE forgotten_password = :key_password");
    $q2->bindValue(":key_password", $password_key);    
    $q2->bindValue(":new_verification_key", $new_key);
    $q2->execute();

    header("Location: ../password-change.php");
    exit();


    } else {
        header("Location: ../reset-pass.php?error=verifykeyfail");
        exit();
    }

    } else {
        header("Location: ../reset-pass.php?error=passworddoesnotmatch");
        exit();
    }

}  catch(Exception $ex) {
    http_response_code(500);
    echo "System not working";
    exit();
}