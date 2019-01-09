<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Capteurs de présence</title>
    <link rel="stylesheet" type="text/css" href="designs/css/sensors.css" />
</head>
<header>
    <?php require "catalogueHeader.php"?>
</header>
<body>

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
<footer>
    <?php require "footer.php"?>
</footer>
</body>

</html>
