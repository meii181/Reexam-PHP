<?php
include_once("includes/header3.php");
require_once(__DIR__."../globals.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="form-update">
<h1><?= $text["48"][$lang] ?></h1>
<p class="send"><?= $text["49"][$lang] ?></p>
<form action="apis/api-update-item.php"> 
<input type="text" name="item_name" data-validate="str" data-max="20" data-min="5" placeholder="<?= $text['50'][$lang] ?>">
<input type="text" name="item_price" data-validate="str" data-max="20" data-min="2" placeholder="<?= $text['51'][$lang] ?>">
<input type="text" name="item_description" data-validate="str" data-max="100" data-min="5" placeholder="<?= $text['52'][$lang] ?>">

<button type="submit" name="item-upd"><?= $text["26"][$lang] ?></button>

<?php
if (isset($_GET["error"])){
    if($_GET["error"] == "requireditemname"){
        echo "<p>The name of the item is required!</p>";
    }

    else if($_GET["error"] == "requireditemprice"){
        echo "<p>Please type the price of the item!</p>";
    }

    else if($_GET["error"] == "requireddescription"){
        echo "<p>The description of the item is required!</p>";
    }

    else if ($_GET["error"] == "mincharacters_5"){
        echo "<p>The item's name must be at least 5 characters!</p>";
    }

    else if($_GET["error"] == "maxcharacters_20"){
        echo "<p>The item's name cannot be more than 20 characters!</p>";
    }

    else if($_GET["error"] == "mincharacters_2"){
        echo "<p>The item's price must be at least 2 characters!</p>";
    }

    else if ($_GET["error"] == "maxcharacters_5"){
        echo "<p>The item's price cannot be more than 5 characters!</p>";
    }

    else if ($_GET["error"] == "maxcharacters_200"){
        echo "<p>The description cannot be more than 200 characters!</p>";
    }

    else if ($_GET["success"] == "itemsuccessfullyploaded" ){
        echo "<p>The item has been successfully added!</p>";
    }
}
?>

</form>
</div>

<script src="validate.js"></script>

<?php
include_once("includes/footer.php");
?>