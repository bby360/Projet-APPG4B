<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Consommation</title>
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
        <div class="desc"><h1> Consommation des capteurs de Luminosité </h1>
            <h1><?php foreach($capteursL as $capteur) { ?>
                    <?= $capteur["CSumL"];?>
                <?php } ?> kWh
            </h1>
        </div>
    </div>

    <div class="gallery">
        <a>
            <img src="designs/pictures/presence.jpg">
        </a>
        <div class="desc"><h1> Consommation des capteurs de présence</h1>
            <h1>
                <?php foreach($capteursP as $capteur) { ?>
                    <?= $capteur["CSumP"];?>
                <?php } ?> kWh
            </h1>
        </div>
    </div>

    <div class="gallery">
        <a>
            <img src="designs/pictures/temperature.jpg">
        </a>
        <div class="desc"><h1> Consommation des capteurs de Température</h1>
            <h1>
                <?php foreach($capteursT as $capteur) { ?>
                    <?= $capteur["CSumT"];?>
                <?php } ?> kWh
            </h1> </div>
    </div>

</section>
<footer>
    <?php require "footer.php"?>
</footer>
</body>
</html>

