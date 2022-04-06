<?php

require_once("globals.php");
session_start();
if(isset($_POST["submit-item"])){

if (!isset($_POST["name"])){
    header("../items-upload.php?error=nameismissing");
    exit();
}

else if(!isset($_POST["price"])){
    header("Location: ../items-upload.php?error=priceismissing");
    exit();
}

else if(!isset($_POST["description"])) {
    header("Location: ../items-upload.php?error=descriptionismissing");
    exit();

}

// else if(!is_uploaded_file($_FILES["image"]["tmp_name"])){
//     header("Location: ../items-upload.php?error=imageismissing");
//     exit();
}


$db = _db();

try{

    $item_id = bin2hex(random_bytes(16));
    
    $q = $db->prepare("INSERT INTO items VALUES(:item_id, :item_name, :item_price, :item_description)");
    $q->bindValue(":item_id", $item_id);
    $q->bindValue(":item_name", $_POST["name"]);
    $q->bindValue(":item_price", $_POST["price"]);
    $q->bindValue(":item_description", $_POST["description"]);
    // move_uploaded_file($_FILES["image"]["tmp_name"], "../items/img_product_" . $item_id);
    $q->execute();

    //success

    header("Location: ../items-upload.php?success=itemuploadedsuccessfully");
    exit();

}catch(PDOException $ex){
    http_response_code(500);
    echo "System not working";
    exit();
}