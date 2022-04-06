<?php
session_start();

require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Apple Pie</title>
    </head>

    <body>

    <div class="menu">
    <div class="header"><a href="index.php" class="link">Apple Pie</a></div>
    <div class="deliver"><?= $text["1"][$lang] ?></div>
    <div><input type="search" id="search-input"></div>
    <div class="log-in"><a class="link" href="login.php"><?= $text["2"][$lang] ?></a></div>
    <div class="registering"><a class="link" href="signup.php"><?= $text["3"][$lang] ?></a></div>
    <div class="cart"><?= $text["4"][$lang] ?></div>
    </div>

    <div class="second-menu">
    <div class="all">☰ <?= $text["5"][$lang] ?></div>
    <div class="deals"><?= $text["6"][$lang] ?></div>
    <div class="customer-service"><?= $text["7"][$lang] ?></div>
    <div class="registry"><?= $text["8"][$lang] ?></div>
    <div class="gift"><?= $text["9"][$lang] ?></div>
    </div>

        


