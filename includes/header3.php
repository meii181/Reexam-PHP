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
        <title>Apple pie</title>
    </head>

    <body>

    <div class="menu-login">
    <div class="header"><a href="success.php" class="link">Apple Pie</a></div>
    <div class="deliver"><?= $text["1"][$lang] ?></div>
    <div><input type="search" id="search-input"></div>
    <div class="log-in"><a href="logout.php" class="link"><?= $text["42"][$lang] ?></a></div>
    <div class="registering"><a href="profile.php" class="link"><?= $text["43"][$lang] ?></a></div>
    <div class="items"><a href="items.php" class="link"><?= $text["44"][$lang] ?></a></div>
    <div class="cart"><?= $text["4"][$lang] ?></div>
    </div>

    <div class="second-menu">
    <div class="all">☰ <?= $text["5"][$lang] ?></div>
    <div class="deals"><?= $text["6"][$lang] ?></div>
    <div class="customer-service"><?= $text["7"][$lang] ?></div>
    <div class="registry"><?= $text["8"][$lang] ?></div>
    <div class="gift"><?= $text["9"][$lang] ?></div>
    <div class="sell"><?= $text["45"][$lang] ?></div>
    </div>