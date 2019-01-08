<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Catalogue</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/catalogue.css" />
</head>
<body>

<section>
<div class="gallery">
        <a href="index.php?action=lightSensorsUnlog">
            <img src="designs/pictures/light.jpg">
        </a>
        <div class="desc">Capteurs de luminosité</div>
    </div>
    <div class="gallery">
        <a href="index.php?action=presenceSensorsUnlog">
            <img src="designs/pictures/presence.jpg">
        </a>
        <div class="desc">Capteurs de présence </div>
    </div>
    <div class="gallery">
        <a href="index.php?action=temperatureSensorsUnlog">
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
