<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Header</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./designs/css/header.css" />
</head>

<body>
<header>
    <nav>

        <div id="menu">
            <ul>
                <li><a href="indexAdmin.php?action=welcome"><img src="./designs/pictures/G4B.jpg" id="logo"></a></li>
                <li><a href="indexAdmin.php?action=lightSensorsUnlog">Capteur de Luminosité</a></li>
                <li><a href="indexAdmin.php?action=presenceSensorsUnlog">Capteur de Présence</a></li>
                <li><a href="indexAdmin.php?action=temperatureSensorsUnlog">Capteur de Température</a></li>


                <li><a href="indexAdmin.php?action=welcome">Retour à la page d'accueil</a></li>
            </ul>
        </div>

    </nav>
</header>
</body>

</html>
