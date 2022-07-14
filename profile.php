<?php

include_once(__DIR__."../includes/header3.php");
require_once(__DIR__."../globals.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";

?>
<div class="update-info">
        <h2><?= $text["47"][$lang]  ?></h2>
        
        <form action="apis/api-update-user.php" method="post">
        <label><?= $text["17"][$lang]  ?></label>
        <input type="text" name="name">
        <label><?= $text["18"][$lang]  ?></label>
        <input type="text" name="last_name">
        <label>Email</label>
        <input type="text" name="email">
        <label>Password</label>
        <input type="password" name="pwd">
        <label>Phone number</label>
        <input type="text" name="phone">

        <?php
if (isset ($_GET["error"])){

        if($_GET["error"] == "requiredname"){
                echo "<p>Name is required!</p>";
        }

        else if($_GET["error"] == "requiredlastname"){
                echo "<p>Last name is required!</p>";
        }

        else if($_GET["error"] == "requiredemail"){
                echo "<p>Email is required!</p>";
        }

        if($_GET["error"] == "invalidemail"){
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

            else if($_GET["error"] == "maxcharacters_8"){
                echo "<p>Last name cannot be longer than 8 characters!</p>";
            }

            else if ($_GET["error"] == "emailistaken"){
                    echo "<p>Email is taken!</p>";
            }

            else if ($_GET["error"] == "phoneistaken"){
                    echo "<p>This phone number is taken, try another one!</p>";
            } 

            else if ($_GET["error"] == "phonemustbedanish"){
                    echo "<p>The phone number must be in danish format!</p>";
            }

            else if ($_GET["error"] == "requiredphonenumber"){
                echo "<p>Please enter your phone number</p>";
        }

            else if ($_GET["error"] == "mincharacters_7"){
                    echo "<p>Password must be at least 7 characters!</p>";
            }

            else if ($_GET["error"] == "maxcharacters_15"){
                echo "<p>Password cannot be more than 15 characters!</p>";
        }
}

if (isset ($_GET["success"])){
           if ($_GET["success"] == "informationupdatedsuccessfully"){
                echo "<p>Your profile has been updated successfully!</p>";
        }
}

        ?>
        <button type="submit" name="update"><?= $text["26"][$lang]  ?></button>

        <p>Delete your account <a href="../reexam/apis/api-delete-user.php">here</a></p>
</form>
<div>

<?php
require_once('includes/footer.php');
?>

</body>
</html>