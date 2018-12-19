<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Capteurs de luminosité</title>
    <link rel="stylesheet" type="text/css" href="designs/css/sensors.css" />
</head>
<body>
<header>
    <?php require "header.php"?>
</header>
<section>
    <h1> Capteurs de Luminosité</h1>
    <table>
        <?php foreach($sensors as $sensors) { ?>
            <ul>
                <li><a href="index.php?action=detailedSensors&id=<?=$sensors["idProduit"];?>"><?= $sensors["typeProduct"];?></li>
            </ul>
        <?php } ?>
    </table>

</section>
</body>

</html>
