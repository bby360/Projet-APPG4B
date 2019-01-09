<!DOCTYPE html>
<?php include("isConnected.php"); ?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Catalogue</title>
    <link rel="stylesheet" type="text/css" href="designs/css/catalogue.css" />
</head>
<body>
<header>
    <?php require "header.php"?>
</header>

<section>
<div class="gallery">
        <a target="_blank" href="./designs/pictures/light.jpg">
            <img src="designs/pictures/light.jpg">
        </a>
        <div class="desc">Capteurs de luinosité</div>
    </div>

    <div class="gallery">
        <a target="_blank" href="./designs/pictures/presence.jpg">
            <img src="designs/pictures/presence.jpg">
        </a>
        <div class="desc">Capteurs de présence </div>
    </div>

    <div class="gallery">
        <a target="_blank" href="temperature.jpg">
            <img src="designs/pictures/temperature.jpg">
        </a>
        <div class="desc">Capteurs de température </div>
    </div>

</section>
    <footer>
        <?php require "footer.php"?>
    </footer>
</body>
</html>
