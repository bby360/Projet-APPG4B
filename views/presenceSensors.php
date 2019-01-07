<!DOCTYPE html>
<?php include("isConnected.php"); ?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Capteurs de présence</title>
    <link rel="stylesheet" type="text/css" href="designs/css/sensors.css" />
</head>
<body>
<header>
    <?php require "header.php"?>
</header>
<section>
    <h1> Capteurs de présence</h1>
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
