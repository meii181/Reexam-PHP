<?php

//connect to db
require_once(__DIR__."../globals.php");
session_start();

$db = _db();

try{

    $id = $_GET['item_id'];

    $q=$db->prepare('DELETE FROM items WHERE item_id = :item_id');
    $q->bindValue(':item_id', $id);
    $q->execute();

    //success
    header("Location: ../item-delete-confirmation.php");
    exit();

}catch(Exception $ex){
    http_response_code(500);
    echo "System under maintanance";
    exit();
}