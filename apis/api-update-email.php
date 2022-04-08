<?php

require_once("globals.php");
session_start();

if(isset($_POST["submit_new_email"])){
    if(!isset($_POST["email_new"])){
        header("Location: ../update-email.php?error=emailisrequired");
        exit();
    }

    else if (!isset($_POST["confirm_email"])){
        header("Location: ../update-email.php?error=confirmationrequired");
        exit();
    }

    else if ($_POST["email_new"] == $_POST["confirm_email"]){
        header("Location: ../update-email.php?error=emaildoesnotmatch");
        exit();
    }
} 

try{
    $db = _db();

}catch(Exception $ex){
    
    $db->rollback();

    http_response_code(500);
    echo "System not working";
    exit();
}