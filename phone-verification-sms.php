<?php
include_once(__DIR__."../includes/header2.php");
require_once(__DIR__."../globals.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="email-sent">
    <h2>The SMS verification has just been sent.</h2>
    <p class="inbox">Please check your phone.</p>
</div>
    