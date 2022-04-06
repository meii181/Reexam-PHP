<?php
//connect to db

require_once(__DIR__."../globals.php");
session_start();

if($_POST["item-upd"]){
if(!isset($_POST['item_name'])){
    header("Location: ../items-update.php?error=requireditemname");
    exit();
}

else if(strlen($_POST['item_name']) < _ITEM_MIN_LEN){
    header("Location: ../items-update.php?error=mincharacters_5");
    exit();
}

else if(strlen($_POST['item_name']) > _ITEM_MAX_LEN){
    header("Location: ../items-update.php?error=maxcharacters_20");
    exit();
}

else if(!isset($_POST['item_price'])){
    header("Location: ../items-update.php?error=requireditemprice");
    exit();
}

else if(strlen($_POST['item_price']) < 2){
    header("Location: ../items-update.php?error=mincharacters_2");
    exit();
}

else if(strlen($_POST['item_price']) > 5){
    header("Location: ../items-update.php?error=maxcharacters_5");
    exit();
}

else if(!isset($_POST['item_description'])){
    header("Location: ../items-update.php?error=requireditemdescription");
    exit();
}

else if(strlen($_POST['item_description']) > 200){
    header("Location: ../items-update.php?error=maxcharacters_200");
    exit();
}
}

//define the db
$db = _db();


try{

    $id = $_GET['item_id'];

    $db->beginTransaction();

    //update the item's name
    $q=$db->prepare('UPDATE items SET item_name = :new_name WHERE item_id = :item_id');
    $q->bindValue(':item_id', $id);
    $q->bindValue(':new_name', $_POST['item_name']);
    $q->execute();

    //update the item's price
    $q=$db->prepare('UPDATE items SET item_price = :new_price WHERE item_id = :item_id');
    $q->bindValue(':item_id', $id);
    $q->bindValue(':new_price', $_POST['item_price']);
    $q->execute();

    //update the item's description
    $q=$db->prepare('UPDATE items SET item_description = :new_description WHERE item_id = :item_id');
    $q->bindValue(':item_id', $id);
    $q->bindValue(':new_description', $_POST['item_description']);
    $q->execute();

    //success
    header("Location: ../items-update.php?success=itemupdatedsuccessfully");
    exit();

    $db->commit();


} catch(Exception $ex){
   $db->rollback();
   http_response_code(500);
   echo "System not working";
   exit();
}
