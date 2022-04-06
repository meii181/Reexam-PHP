<?php
require_once(__DIR__."../globals.php");
session_start();


if($_POST["update"]){

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
}

$db = _db();

try{
    
    $user_id = $_SESSION['user_id'];
    
    
    $q=$db->prepare('SELECT * FROM customers WHERE usersEmail = :usersEmail');
    $q->bindValue(':usersEmail', $_POST['email']);
    $q->execute();
    $row = $q->fetch();

    if($row > 0){
        header("Location: ../profile.php?error=emailistaken");
        exit();

    } else {

    
    $db->beginTransaction();

    //change name
    $q = $db->prepare('UPDATE customers SET user_name = :new_name WHERE user_id = :usersId');
    $q->bindValue(':user_id', $user_id);
    $q->bindValue(':new_name', $_POST['name']);
    $q->execute();


    //change last name
    $q = $db->prepare('UPDATE customers SET user_last_name = :new_last_name WHERE user_id = :usersId');
    $q->bindValue(':user_id', $user_id);
    $q->bindValue(':new_last_name', $_POST['last_name']);
    $q->execute();


    // change email
    $q = $db->prepare('UPDATE customers SET user_email = :new_email WHERE user_id = :usersId');
    $q->bindValue(':user_id', $user_id);
    $q->bindValue(':new_email', $_POST['email']);
    $q->execute();

    header("Location: ../profile.php?success=informationupdatedsuccessfully");
    exit();

    $db->commit();
    

}
}catch(Exception $ex){
    
    $db->rollback();

    http_response_code(500);
    echo "System not working";
    exit();
}
