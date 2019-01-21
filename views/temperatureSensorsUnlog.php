<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Capteurs de Température</title>
    <link rel="stylesheet" type="text/css" href="designs/css/sensors.css" />
</head>
<body>
<header>
    <?php require "catalogueHeader.php"?>
</header>
<section>
    <h1> Capteurs de Température</h1>
    
    <table>

        <thead>
        <tr>
            <td><h3>Référence</h3></td>
            <td><h3>Type de produit</h3></td>
            <td><h3>Consommation</h3></td>
            <td><h3>Prix</h3></td>
        </tr>
        </thead>

        <tbody>
        <?php foreach($sensors as $sensors) { ?>
            <tr>
                <td>
                    <a href="index.php?action=detailedSensors&id=<?=$sensors["idProduit"];?>"><?= $sensors["idProduit"];?>
                </td>
                <td>
                    <?= $sensors["typeProduct"];?>
                </td>
                <td>
                    <?= $sensors["consumption"];?> kWh
                </td>
                <td>
                    <?= $sensors["price"];?>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>

</section>
<footer>
    <?php require "footer.php"?>
</footer>
</body>

</html>
