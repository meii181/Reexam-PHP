<?php
require_once(__DIR__."../globals.php");

$db = _db();

try{
$q=$db->prepare('SELECT * FROM items');
$q->execute();

$items = $q->fetchALL(PDO::FETCH_OBJ);

}catch(Exception $ex){
    http_response_code(500);
    echo "System not working";
    exit();
}