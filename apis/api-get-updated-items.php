<?php
require_once(__DIR__."../globals.php");

$db = _db();

try{

$author_id = $_SESSION['user_id'];

$q=$db->prepare('SELECT * FROM items WHERE item_author_id = :item_author_id');
$q->bindValue("item_author_id", $author_id);
$q->execute();
$items = $q->fetchALL(PDO::FETCH_OBJ);

}catch(Exception $ex){
    http_response_code(500);
    echo "System not working";
    exit();
}