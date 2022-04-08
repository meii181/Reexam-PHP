<?php
require_once(__DIR__."../globals.php");
session_start();


if(isset($_POST["update"])){

if(!isset($_POST['name'])){
    header("Location: ../profile.php?error=requiredname");
    exit();
}

else if(strlen($_POST['name']) < _NAME_MIN_LEN){
    header("Location: ../profile.php?error=mincharacters_2");
    exit();
}

else if(strlen($_POST['name']) > _NAME_MAX_LEN){
    header("Location: ../profile.php?error=maxcharacters_10");
    exit();
}

else if(!isset($_POST['last_name'])){
    header("Location: ../profile.php?error=requiredlastname");
    exit();
}


else if(strlen($_POST['last_name']) < 4){
    header("Location: ../profile.php?error=mincharacters_4");
    exit();
}

elseif(strlen($_POST['last_name']) > 8){
    header("Location: ../profile.php?error=maxcharacters_8");
    exit();
}

else if(!isset($_POST['email'])){
    header("Location: ../profile.php?error=requiredemail");
    exit();
}

else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    header("Location: ../profile.php?error=invalidemail");
    exit();
}

else if(strlen($_POST["pwd"]) < _PASSWORD_MIN_LEN){
    header("Location:../profile.php?error=mincharacters_7");
    exit();
}

 else if(strlen($_POST["pwd"]) > _PASSWORD_MAX_LEN){
    header("Location:../profile.php?error=maxcharacters_15");
    exit();
}

else if (!isset($_POST["phone"])){
    header("Location: ../profile.php?error=requiredphonenumber");
    exit();
}

else if ($_POST["phone"] !== 8){
    header("Location: ../profile.php?error=phonemustbedanish");
    exit();
}
}

$db = _db();

try{
    
    $user_id = $_SESSION['user_id'];
    $update_hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
    
    
    $q=$db->prepare('SELECT * FROM customers WHERE user_email = :user_email');
    $q->bindValue(':user_email', $_POST['email']);
    $q->execute();
    $row = $q->fetch();

    if($row > 0){
        header("Location: ../profile.php?error=emailistaken");
        exit();

    } else {

        $q = $db->prepare("SELECT * FROM customers WHERE phone_number = :phone_number");
        $q->bindValue(":phone_number", $_POST["phone"]);
        $q->execute();
        $row = $q->fetch(); 
    
        if($row > 0){
            header("Location:../signup.php?error=phoneistaken");
            exit();

        } else {

    
    $db->beginTransaction();

    //change name
    $q = $db->prepare('UPDATE customers SET user_name = :new_name WHERE user_id = :user_id');
    $q->bindValue(':user_id', $user_id);
    $q->bindValue(':new_name', $_POST['name']);
    $q->execute();


    //change last name
    $q = $db->prepare('UPDATE customers SET user_last_name = :new_last_name WHERE user_id = :user_id');
    $q->bindValue(':user_id', $user_id);
    $q->bindValue(':new_last_name', $_POST['last_name']);
    $q->execute();

    // change email
    $q = $db->prepare('UPDATE customers SET user_email = :new_email WHERE user_id = :user_id');
    $q->bindValue(':user_id', $user_id);
    $q->bindValue(':new_email', $_POST['email']);
    $q->execute();


    // change password
    $q = $db->prepare('UPDATE customers SET user_password = :new_password WHERE user_id = :user_id');
    $q->bindValue(':user_id', $user_id);
    $q->bindValue(':new_password', $update_hash);
    $q->execute();

    // change phone number

    $q = $db->prepare('UPDATE customers SET user_phone = :new_phone WHERE user_id = :user_id');
    $q->bindValue(':user_id', $user_id);
    $q->bindValue(':new_phone', $_POST["phone"]);
    $q->execute();
    
    $db->commit();

    header("Location: ../profile.php?success=informationupdatedsuccessfully");
    exit();
    
        }

}

}catch(Exception $ex){
    
    $db->rollback();

    http_response_code(500);
    echo "System not working";
    exit();
}
