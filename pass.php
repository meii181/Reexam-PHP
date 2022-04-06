<?php
include_once(__DIR__."../includes/header2.php");
require_once(__DIR__."../globals.php"); 
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="reset-pass">
<h2><?= $text["28"][$lang] ?></h2>
<p class="send"><?= $text["39"][$lang] ?></p>

<form action="apis/api-reset-pass.php" method="post">
<input type="text" name="email" placeholder="Email">

<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "requiredemail"){
    echo "<p>Email is required in order to find your account!</p>";
    }

else if($_GET["error"] == "invalidemail"){
    echo "<p>Please enter a valid email!</p>";
}

else if($_GET["error"] == "keynotfound"){
    echo "<p>The key for resetting your password cannot be found, please contact our assistants or 
    create a new account.</p>";
    exit();
}

else if($_GET["error"] == "keynot32"){
    echo "<p>The key is not 32 characters!</p>";
    exit();
}
}
?>


<button type="submit" name="send-email"><?= $text["26"][$lang] ?></button>
</form>
</div>

