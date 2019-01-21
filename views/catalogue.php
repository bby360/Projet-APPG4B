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
        <a href="index.php?action=lightSensors">
            <img src="designs/pictures/light.jpg">
        </a>
        <div class="desc"><?php

            switch ($_SESSION['lang']){
                case 'fr':
                    echo 'Capteurs de luminosité';
                    break;

                case 'eng':
                    echo 'Light sensors';
                    break;
            }
            ?></div>
    </div>

    <div class="gallery">
        <a href="index.php?action=presenceSensors">
            <img src="designs/pictures/presence.jpg">
        </a>
        <div class="desc"><?php

            switch ($_SESSION['lang']){
                case 'fr':
                    echo 'Capteurs de présence';
                    break;

                case 'eng':
                    echo 'Proximity sensors';
                    break;
            }
            ?> </div>
    </div>

    <div class="gallery">
        <a href="index.php?action=temperatureSensors">
            <img src="designs/pictures/temperature.jpg">
        </a>
        <div class="desc"><?php

            switch ($_SESSION['lang']){
                case 'fr':
                    echo 'Capteurs de température';
                    break;

                case 'eng':
                    echo 'Heat sensors';
                    break;
            }
            ?> </div>
    </div>

</section>
    <footer>
        <?php require "footer.php"?>
    </footer>
</body>
</html>
