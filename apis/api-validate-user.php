<?php

require_once(__DIR__."../globals.php");
session_start();

$db = _db();

try{
$key = $_GET['verification_key'];

$q = $db->prepare('UPDATE customers SET verified_user = :verified_user WHERE verification_key = :verification_key');
$q->bindValue(':verification_key', $key);
$q->bindValue(':verified_user', true);
$q->execute();
$q->rowCount();

header("Location: ../confirmed-account.php");
exit();

if($q->rowCount() > 0){
    $new_verify = bin2hex(random_bytes(16));
    $id = $_SESSION['user_id'];

    //prepare new query

    $q2 = $db->prepare('UPDATE customers SET verification_key = :new_verification_key WHERE user_id = :user_id');
    $q2->bindValue(':user_id', $id);
    $q2->bindValue(':new_verification_key', $new_verify);
    $q2->execute();

    echo "New verification key";
}

}catch (Exception $ex){
    http_response_code(500);
    echo "System not working";
    exit();
}
?>