<?php
include_once(__DIR__."../includes/header2.php");
require_once(__DIR__."../globals.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="form-pass">
    <h2>Phone number</h2>
    <p class="send">Verify your phone number here</p>

    <form action="apis/api-verified-phone.php" method="post">
    <label>Phone</label>
    <input type="text" name="phone" placeholder="Type phone number">
    <label>Confirm your phone number</label>
    <input type="text" name="confirm-phone" placeholder="Confirm phone number">

    <?php

    if(isset($_GET["error"])){

        if($_GET["error"] == "requiredphonenumber"){
            echo "<p>The phone number is required!</p>";
        }

        else if($_GET["error"] == "confirmphonenumber"){
            echo "<p>Please re-type your phone number!</p>";
        }

        else if($_GET["error"] == "mustbedanishnumber"){
            echo "<p>The phone number must be in danish format!</p>";
        }
        else if ($_GET["error"] == "phonenumberdoesnotmatch"){
            echo "<p>The phone numbers doesn't match!</p>";
        }

        else if($_GET["error"] == "phonetaken"){
            echo "<p>This phone number is taken, try another one!</p>";
        }

    }
    ?>

    <button type="submit" name="submit_phone">Add phone number</button>
    </form>
</div>