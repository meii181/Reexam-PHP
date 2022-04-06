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
        
    <div class="logo-2">
    <img src="img/apple_pie.png" width="150" height="28"></img>
    </div>