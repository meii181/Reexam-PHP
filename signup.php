<?php
include_once(__DIR__."../includes/header2.php");
include_once(__DIR__."../language/configuration.php");
$lang = $_GET["lang"] ?? "en";
require_once(__DIR__."../globals.php");

?>
 
<div class="sign-up">
    <h2><?= $text["16"][$lang] ?></h2>
    
    <form action="apis/api-signup.php" method="post">
    <label><?= $text["17"][$lang] ?></label>
        <input type="text" name="name">
        <label><?= $text["18"][$lang] ?></label>
        <input type="text" name="last_name">
        <label>Email</label>
        <input type="text" name="email">
        <label><?= $text["19"][$lang] ?></label>
        <input type="password" name="pwd" placeholder="<?= $text['27'][$lang] ?>">
        <label><?= $text["20"][$lang] ?></label>
        <input type="password" name="pwd-repeat">
        <label>Phone number</label>
        <input type="text" name="phone">
        <label>Confirm phone number</label>
        <input type="text" name="confirm-phone">
        <button type="submit" name="submit-signup"><?= $text["26"][$lang] ?></button>
        


        <?php
        if (isset($_GET["error"])){
            
            if($_GET["error"] == "emptyfields"){
                echo "<p>Please fill all fields!</p>";
            }

            else if($_GET["error"] == "invalidemail"){
                echo "<p>Please enter a valid email!</p>";
            }

            else if($_GET["error"] == "mincharacters_2"){
                echo "<p>Name must be at least 2 characters!</p>";
            }

            else if($_GET["error"] == "maxcharacters_10"){
                echo "<p>Name cannot be longer than 10 characters!</p>";
            }

            else if($_GET["error"] == "mincharacters_4"){
                echo "<p>Last name must be at least 4 characters!</p>";
            }

            else if($_GET["error"] == "maxcharacters_11"){
                echo "<p>Last name cannot be longer than 11 characters!</p>";
            }

            else if($_GET["error"] == "mincharacters_7"){
                echo "<p>Password must be at least 7 characters!</p>";
            }

            else if($_GET["error"] == "maxcharacters_15"){
                echo "<p>Password cannot be longer than 15 characters!</p>";
            }

            else if($_GET["error"] == "passworddoesnotmatch"){
                echo "<p>Password does not match!</p>";
            }

            else if($_GET["error"] == "emailistaken"){
                echo "<p>Email is taken!</p>";
            }

            else if($_GET["error"] == "requiredphonenumber"){
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
    
            else if($_GET["error"] == "phoneistaken"){
                echo "<p>This phone number is taken, try another one!</p>";
            }
        }
            
        ?>
        
        <p class="terms"><?= $text["21"][$lang] ?></p>

        <div class="divide">
        <?= $text["22"][$lang] ?><a class="login" href="login.php"><?= $text["23"][$lang] ?></a>
        </div>

    </form>
    </div>
