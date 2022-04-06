<?php
include_once(__DIR__."../includes/header3.php");
require_once(__DIR__."../globals.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="content-1">
    <div class="item-1">
    <h2 class="index-title"><?= $text["10"][$lang] ?></h2>
    <img src="img/bia6c15b21a-ad7f-4fb0-9c5b-9e80c300f4f0.jpg" width="200" height="130" class="img-1">
    <p class="seemore"><?= $text["15"][$lang] ?></p>
    </div>
    <div class="item-2">
    <h2 class="index-title"><?= $text["11"][$lang] ?></h2>
    <img src="img/lego.jpeg" width="160" height="130" class="img-1">
    <p class="seemore"><?= $text["15"][$lang] ?></p>
    </div>
    <div class="create-account2">
            <h2 class="welcome"> <?= $text["46"][$lang] ?>
        <?php
echo $_SESSION['user_name'];
        ?> !</h2>
    <button class="btn"><a href="profile.php"><?= $text["13"][$lang] ?></a>
    </div>
</div>

<div class="content-2">
    <div class="img"><img src="img/samsung.png" width="200" height="200"></img></div>
    <div class="img"><img src="img/vanilla monin.jpg" width="200" height="200"></img></div>
    <div class="img"><img src="img/bia6c15b21a-ad7f-4fb0-9c5b-9e80c300f4f0.jpg" width="200" height="130"></img></div>
    <div class="img"><img src="img/pampers.jpg" width="200" height="200"></img></div>
    <div class="img"><img src="img/tablet.jpg" width="200" height="130"></img></div>
</div>

<div class="content-3">
    <div class="item-1">
    <h2 class="index-title"><?= $text["14"][$lang] ?></h2>
    <img src="img/iphone.jpg" width="200" height="200"class="img-1">
    <p class="seemore"><?= $text["15"][$lang] ?></p>
    </div>
    <div class="item-2">
    <h2 class="index-title"><?= $text["11"][$lang] ?></h2>
    <img src="img/lego.jpeg" width="160" height="130" class="img-1">
    <p class="seemore"><?= $text["11"][$lang] ?></p>
    </div>
    <div class="item-3">
    <h2 class="index-title"><?= $text["11"][$lang] ?></h2>
    <img src="img/lego.jpeg" width="160" height="130" class="img-1">
    <p class="seemore"><?= $text["15"][$lang] ?></p>
    </div>
</div>

<?php
require_once("includes/footer.php");
?>

