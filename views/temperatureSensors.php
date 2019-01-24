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
                echo "Capteurs de Température";
                break;

            case 'eng':
                echo "Heat sensors";
                break;
        }
        ?></title>
    <link rel="stylesheet" type="text/css" href="designs/css/sensors.css" />
</head>
<body>
<header>
    <?php require "header.php"?>
</header>
<section>
    <h1> <?php
         if(!isset($_SESSION)) {
        session_start();
    }
        switch ($_SESSION['lang']){
            case 'fr':
                echo "Capteurs de Température";
                break;

            case 'eng':
                echo "Heat sensors";
                break;
        }
        ?></h1>

    <table>

        <thead>
        <tr>
            <td><h3><?php
                     if(!isset($_SESSION)) {
        session_start();
    }
                    switch ($_SESSION['lang']){
                        case 'fr':
                            echo "Référence";
                            break;

                        case 'eng':
                            echo "Reference";
                            break;
                    }
                    ?></h3></td>
            <td><h3><?php
                    if(!isset($_SESSION)) {
        session_start();
    }
                    switch ($_SESSION['lang']){
                        case 'fr':
                            echo "Type de produit";
                            break;

                        case 'eng':
                            echo "Product type";
                            break;
                    }
                    ?></h3></td>
            <td><h3><?php
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
                    ?></h3></td>
            <td><h3><?php
                     if(!isset($_SESSION)) {
        session_start();
    }
                    switch ($_SESSION['lang']){
                        case 'fr':
                            echo "Prix";
                            break;

                        case 'eng':
                            echo "Price";
                            break;
                    }
                    ?></h3></td>
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
                    <?= $sensors["consumption"];?> Wh
                </td>
                <td>
                    <?= $sensors["price"];?> €
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

