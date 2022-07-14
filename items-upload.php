<?php
require_once(__DIR__."../globals.php");
include_once(__DIR__."../includes/header3.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";

?>


<div class="form">
<h2><?= $text['54'][$lang] ?></h2>

<p class="send"><?= $text['55'][$lang] ?></p>

<form action="apis/api-item.php" method="post" enctype="multipart/form-data"> 
    <input type="text" name="name" placeholder="Name of the item">
    <input type="text" name="price" placeholder="Price">
    <input type="text" name="description" placeholder="Please describe your product here">
    <input type="file" name="image">  

    <?php

if (isset($_GET["error"])){
    if($_GET["error"] == "nameismissing"){
        echo "<p>The name of the item is required!</p>";
    }

    else if($_GET["error"] == "priceismissing"){
        echo "<p>Please type the price of the item!</p>";
    }

    else if($_GET["error"] == "descriptionismissing"){
        echo "<p>The description of the item is required!</p>";
    }

    else if($_GET["error"] == "imageismissing"){
        echo "<p>The image of the item is missing!</p>";
    }

    else if ($_GET["success"] == "itemuploadedsuccessfully" ){
        echo "<p>The item has been successfully added!</p>";
    }
}
?>

<button type="submit" name="submit-item"><?= $text['26'][$lang] ?></button>

<p><a href="../reexam/apis/api-update-item.php">Update your item here</a></p>

</form>
</div>

<?php
include_once("includes/footer.php");
?>