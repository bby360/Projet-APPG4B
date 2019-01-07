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
    <h1> Consommation </h1>

    <table>
        <?php foreach($capteurs as $capteur) { ?>
            <ul>
                <li><?= $capteur["CSum"];?></li>
            </ul>
        <?php } ?>

    </table>


</section>
<footer>
    <?php require "footer.php"?>
</footer>
</body>
</html>
