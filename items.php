<?php
include_once("includes/header3.php");
require_once("globals.php");
require_once("language/configuration.php");
$lang = $_GET["lang"] ?? "en";
?>

<div class="first-row">
<div class="picture">
    <img src="img/samsung.png" width="200" height="200"></img>
</div>
<div class="title">
    <h2 class="product">Samsung</h2>
</div>

<div class="price">
    <p>1000,-</p>
</div>
</div>

<div class="second-row">
<div class="picture">
    <img src="img/bakujuly 5.png" width="140" height="200"></img>
</div>
<div class="title">
    <h2 class="product">Illustration</h2>
</div>

<div class="price">
    <p>200,-</p>
</div>
</div>

<div class="third-row">
<div class="picture">
    <img src="img/iphone.jpg" width="200" height="200"></img>
</div>
<div class="title">
    <h2 class="product">iPhone 11 Pro</h2>
</div>

<div class="price">
    <p>3000,-</p>
</div>
</div>

<div class="fourth-row">
<div class="picture">
    <img src="img/vanilla monin.jpg" width="200" height="200"></img>
</div>
<div class="title">
    <h2 class="product">Monin Vanilla Syrup</h2>
</div>

<div class="price">
    <p>89,-</p>
</div>
</div>

<div class="fifth-row">
<div class="picture">
    <img src="img/bia6c15b21a-ad7f-4fb0-9c5b-9e80c300f4f0.jpg" width="200" height="150"></img>
</div>
<div class="title">
    <h2 class="product"> Keyboard gaming</h2>
</div>

<div class="price">
    <p>1000,-</p>
</div>
</div>

<div class="sixth-row">
<div class="picture">
    <img src="img/2183838.jpg" width="200" height="250"></img>
</div>
<div class="title">
    <h2 class="product">When We All Fall Asleep - Billie Eilish</h2>
</div>

<div class="price">
    <p>500,-</p>
</div>
</div>

<div class="seventh-row">
<div class="picture">
    <img src="img/abbey road.jpg" width="200" height="160"></img>
</div>
<div class="title">
    <h2 class="product"> Abbey Road - The Beatles</h2>
</div>

<div class="price">
    <p>400,-</p>
</div>
</div>

<div class="upload">
<p><?= $text["56"][$lang] ?></p>

<button class="add"><a href="items-upload.php"><?= $text["57"][$lang] ?></a></button>
</div>



<?php
include_once("includes/footer.php");
?>