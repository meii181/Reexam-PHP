<?php
include_once(__DIR__."../includes/header2.php");
require_once(__DIR__."../globals.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="form-pass">
    <h2><?= $text["36"][$lang] ?></h2>
    <p class="send"><?= $text["37"][$lang] ?></p>

    <form action="apis/api-recover-pass.php" method="post">
    <input type="password" name="reset" placeholder="Type password">
    <input type="password" name="confirm" placeholder="Confirm password">

    <?php

    if(isset($_GET["error"])){
        if($_GET["error"] == "missingkey"){
            echo "<p>The key is missing!</p>";
        }

        else if($_GET["error"] == "keyisnot32"){
            echo "<p>The key is not 32 characters!</p>";
        }

        else if($_GET["error"] == "passwordrequired"){
            echo "<p>Password is required!</p>";
        }

        else if($_GET["error"] == "confirmpassword"){
            echo "<p>Please re-type your password!</p>";
        }

        else if($_GET["error"] == "mincharacters_7"){
            echo "<p>Password must be at least 7 characters!</p>";
        }

        else if($_GET["error"] == "maxcharacters_15"){
            echo "<p>Password cannot be longer than 15 characters!</p>";
        }

        else if($_GET["error"] == "verifykeyfail"){
            echo "<p>Failed to verify the key</p>";
        }

        else if($_GET["error"] == "passworddoesnotmatch"){
            echo "<p>Password doesn't match!</p>";
        }
    }
    ?>

    <button type="submit" name="reset_password"><?= $text["38"][$lang] ?></button>
    </form>
</div>