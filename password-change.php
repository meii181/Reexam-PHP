<?php
require_once(__DIR__."../globals.php");
include_once(__DIR__."../includes/header4.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="change">
    <h2 class="success"><?= $text["41"][$lang] ?></h2>
    <button><a href="success.php"><?= $text["35"][$lang] ?></a></button>
</div>