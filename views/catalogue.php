<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Catalogue</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/catalogue.css" />
</head>
<body>
<header>
    <?php require "header.php"?>
</header>

<section>
    <div class="luminosite"><a href="index.php?action=see_home"></a>
        <p>
        <h1> Capteurs de luminosité: </h1>
        <a href="index.php?action=see_home"><img src="designs/pictures/light.jpg" id="light" /></a>
        </p>
    </div>

    <div class="temperature">
        <p>
        <h1>Capteurs de température :</h1>
        <a href="index.php?action=see_home"><img src="designs/pictures/temprature.jpg" id="temperature" /></a>
        </p>
    </div>

    <div class="presence">
        <p>
        <h1> Capteurs de présence :</h1>
        <a href="index.php?action=see_home"><img src="designs/pictures/presence.jpg" id="presence"/><</a>
        </p>
    </div>
</section>
</body>
</html>
