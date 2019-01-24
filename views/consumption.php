<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php
         if(!isset($_SESSION)) {
        session_start();
    }
        switch ($_SESSION['lang']){
            case 'fr':
                echo "Consommation";
                break;

            case 'eng':
                echo "Consumption";
                break;
        }
        ?></title>
    <link rel="stylesheet" type="text/css"  href="designs/css/consumption.css" />
</head>
<body>
<header>
    <?php require "header.php"?>
</header>

<section>
    <div class="gallery">
        <a>
            <img src="designs/pictures/light.jpg">
        </a>
        <div class="desc"><h1> <?php
                 if(!isset($_SESSION)) {
        session_start();
    }
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Consommation des capteurs de luminosité";
                        break;

                    case 'eng':
                        echo "Light sensors consumption";
                        break;
                }
                ?> </h1>
            <h1><?php foreach($capteursL as $capteur) { ?>
                    0<?= $capteur["CSumL"];?>
                <?php } ?> Wh
            </h1>
        </div>
    </div>

    <div class="gallery">
        <a>
            <img src="designs/pictures/presence.jpg">
        </a>
        <div class="desc"><h1> <?php
         if(!isset($_SESSION)) {
            session_start();
         }
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Consommation des capteurs de présence";
                        break;

                    case 'eng':
                        echo "Proximity sensors consumption";
                        break;
                }
                ?></h1>
            <h1>
                <?php foreach($capteursP as $capteur) { ?>
                    <?= $capteur["CSumP"];?>
                <?php } ?> Wh
            </h1>
        </div>
    </div>

    <div class="gallery">
        <a>
            <img src="designs/pictures/temperature.jpg">
        </a>
        <div class="desc"><h1> <?php
                if(!isset($_SESSION)) {
                session_start();
                }
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Consommation des capteurs de température";
                        break;

                    case 'eng':
                        echo "Heat sensors consumption";
                        break;
                }
                ?></h1>
            <h1>
                <?php foreach($capteursT as $capteur) { ?>
                    <?= $capteur["CSumT"];?>
                <?php } ?> Wh
            </h1> </div>
    </div>

</section>
<footer>
    <?php require "footer.php"?>
</footer>
</body>
</html>

