<?php
include_once(__DIR__."../includes/header2.php");
require_once(__DIR__."../globals.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="form-pass">
    <h2>Enter Authentication Key</h2>
    <p class="send">The authentication key was given through SMS, please enter it below</p>

    <form action="apis/api-authentication-code.php" method="post">
    <label>Enter the OTP here</label>
    <input type="text" name="auth_key">

    <button type="submit" name="submit_code">Submit</button>
    