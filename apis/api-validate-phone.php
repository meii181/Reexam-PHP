<?php

require_once(__DIR__."../globals.php");
session_start();

$db = _db();

try{
$key = $_GET['verification_key'];

$q = $db->prepare('UPDATE mobile_phone SET verified_phone = :verified_phone WHERE phone_verification_key = :phone_verification_key');
$q->bindValue(':phone_verification_key', $key);
$q->bindValue(':verified_phone', true);
$q->execute();
$q->rowCount();

header("Location: ../verified_phone.php");
exit();

if($q->rowCount() > 0){
    $new_verify = bin2hex(random_bytes(16));

    $id = $_SESSION['user_id'];

    //prepare new query

    $q2 = $db->prepare('UPDATE mobile_phone SET phone_verification_key = :new_phone_verification_key WHERE phone_id = :phone_id');
    $q2->bindValue(':phone_id', $id);
    $q2->bindValue(':new_phone_verification_key', $new_verify);
    $q2->execute();

    echo "New verification key";
}

}catch (Exception $ex){
    http_response_code(500);
    echo "System not working";
    exit();
}
?>