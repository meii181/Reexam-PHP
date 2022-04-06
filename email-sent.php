<?php
require_once(__DIR__."../globals.php");
include_once(__DIR__."../includes/header4.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="email-sent">
    <h2><?= $text["40"][$lang] ?></h2>
    <p class="inbox"><?= $text["33"][$lang] ?></p>
</div>