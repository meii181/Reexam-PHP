<?php

require_once("../globals.php");
session_start();

if(isset($_POST["submit_code"])){
    if (!isset($_POST["auth_key"])){
        header("Location: ../authentication_insert_code.php?error=missingotp");
        exit();
    }

    else if (strlen($_POST["auth_key"]) !== 5){
        header("Location: ../authentication_insert_code.php?error=otpmustbe5");
        exit();
    }
}

try {

    $db = _db();

    $q = $db->prepare("SELECT * FROM customers WHERE authentication_key = :authentication_key");
    $q->bindValue(":authentication_key", $_POST["auth_key"]);
    $q->execute();

    $row = $q->fetch();

    if(!empty($row)){

        try{
        $id = $_SESSION["user_id"];
        $phone = $_POST["phone"];
        $new_auth_key = bin2hex(random_bytes(5));

        $q1 = $db->prepare("UPDATE customers SET user_phone = :user_phone WHERE user_id = :user_id");
        $q1->bindValue(":user_phone", $phone);
        $q1->bindValue(":user_id", $id);
        $q1->execute();

        $q2 = $db->prepare("UPDATE customers SET authentication_key = :authentication_key WHERE user_id = :user_id");
        $q2->bindValue(":authentication_code", $new_auth_key);
        $q2->bindValue("user_id", $id);
        $q2->execute();

        $_SESSION["user_id"] = $_POST["phone"];

        header("Location: ../verified_phone.php");
        exit();

        }catch (Exception $ex){
        header("Location: ../authentication_insert_code.php?error=somethingiswrong");
        exit();
        }

} else {
    header("Location: ../authentication_insert_code.php?error=codeiswrong");
    exit();
}

} catch (Exception $ex){
    http_response_code(500);
    echo "System not working";
    exit();
}
