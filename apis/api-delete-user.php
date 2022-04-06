<?php
require_once(__DIR__."../globals.php");
session_start();

$db = _db();

try{

$usersId = $_SESSION['user_id'];

$q=$db->prepare('DELETE FROM customers WHERE user_id = :user_id');
$q->bindValue(':user_id', $usersId);
$q->execute();
session_destroy();

//success
header("Location: ../delete-confirmation.php");
exit();

}catch(Exception $ex){
    http_response_code(500);
    echo "System not working";
    exit();
}