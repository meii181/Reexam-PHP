<?php
include_once (__DIR__."../includes/header2.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
require_once(__DIR__."../globals.php");

?>
 
<div class="login-1">

<h2><?= $text["30"][$lang] ?></h2>
        <form action="apis/api-login.php" method="post">
        <label>Email</label>
        <input type="text" name="email" placeholder="Email">
        <label><?= $text["19"][$lang] ?></label>
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit-login"><?= $text["26"][$lang] ?></button>

        <?php

        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyfields"){
                echo "<p>Please fill all fields!</p>";
            }

            else if($_GET["error"] == "invalidemail"){
                echo "<p>Please enter a valid email!</p>";
            }

            else if($_GET["error"] == "mincharacters_7"){
                echo "<p>Password must be at least 7 characters!</p>";
            }

            else if($_GET["error"] == "maxcharacters_15"){
                echo "<p>Password cannot be longer than 15 characters!</p>";
            }

            else if($_GET["error"] == "wrongdetails"){
                echo "<p>Wrong email or password!</p>";
            }

            else if($_GET["error"] == "userdoesnotexist"){
                echo "<p>User doesn't exist!</p>";
            }
        }

        ?>

        <p class="forgot"><?= $text["28"][$lang] ?><a class="link-pass" href="pass.php"><?= $text["29"][$lang] ?></a></p>
    </form>
</div>

<div class="divide-1">
<p class="border"><?= $text["12"][$lang] ?></p>
<button class="register"><a class="create" href="signup.php"><?= $text["31"][$lang] ?></a></button>
</div>

