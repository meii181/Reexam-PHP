<?php
//connection to db
require_once('globals.php');
session_start();

if(isset($_POST["submit-login"])){

    if(empty($_POST['email']) || empty($_POST["pwd"])){
    header("Location: ../login.php?error=emptyfields");
    exit();
    }

   else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        header("Location: ../login.php?error=invalidemail");
        exit();
    }


    else if(strlen($_POST['pwd']) < _PASSWORD_MIN_LEN){
        header("Location: ../login.php?error=mincharacters_7");
        exit();
    }

   else if(strlen($_POST['pwd']) > _PASSWORD_MAX_LEN){
    header("Location: ../login.php?error=maxcharacters_15");
    exit();
    }
}

    $db = _db();

        try{ 

        $q=$db->prepare('SELECT * FROM customers WHERE user_email = :user_email');
        $q->bindValue(':user_email', $_POST['email']);
        $q->execute();
        $row = $q->fetch();

        if(!empty($row)){

        if(password_verify($_POST['pwd'], $row['user_password'])){ 

        //success
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_last_name'] = $row['user_last_name'];
        $_SESSION['user_email'] = $row['user_email'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['verification_key'] = $row['verification_key'];
        $_SESSION['forgotten_password'] = $row['forgotten_password'];
        $_SESSION['verified_user'] = $row['verified_user'];
        $_SESSION['user_phone'] = $row['user_phone'];

        //success redirect
        header("Location: ../success.php");
        exit();

        } else {
            header("Location: ../login.php?error=wrongdetails");
            exit();
        }
        } else {
            header("Location: ../login.php?error=userdoesnotexist");
            exit();
        }
    }

        catch (Exception $ex){
        http_response_code(500);
        echo "System not working";
        exit();

        }
        


