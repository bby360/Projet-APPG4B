<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pièce</title>
    <link rel="stylesheet" type="text/css" href="designs/css/rooms.css" />
</head>
<body>
<img id="fond" src="../designs/css/photo.jpg">
<header>
    <?php
include 'header.php';
?>
</header>
<section>


    <ul id="menuvertical">
        <li id="salon"><a href="#">SALON</a>
            <ul>
                <li id="bureau"><a href="#">BUREAU</a></li>
                <li><a href="#">Sous-Menu 2.2</a></li>
                <li><a href="#">Sous-Menu 2.3</a></li>
                <li><a href="#">Sous-Menu 2.4</a></li>
            </ul>
        </li>
    </ul>
    <form action="test.php" method="post">
        <div id="mode">
            <p>Mode de gestion de la pièce : </br></p>
            <input type="radio" name="mode" value="automatique" id="automatique" checked="checked" /> <label for="automatique">Automatique</label>
            <input type="radio" name="mode" value="manuel" id="manuel" /> <label for="manuel">Manuel</label>
        </div>

        <div id="lumiere_auto">
            <label for="lumiere_auto">lumière désirée &nbsp &nbsp</label>    <!-- &nbsp = indentation -->
            <select name="lumiere_auto">
                <option value="pas lumineux">pas lumineux</option>
                <option value="lumineux">lumineux</option>
                <option value="très lumineux">très lumineux</option>
                <option value="trop lumineux">trop lumineux</option>
            </select>
            <div id="lumiere_manuel">
                lumière &nbsp &nbsp
                0% <input type="range" value="15" max="100" min="0" step="5">100%
            </div>
        </div>

        <div id="ouverture_volets">
            <label for="ouverture_volets">horaire ouverture volets &nbsp &nbsp</label>
            <input type="time" name="ouverture_volets">
            <div id="volets_manuel">
                volets &nbsp &nbsp
                0% <input type="range" value="15" max="100" min="0" step="5">100%
            </div>
        </div>

        <div id="fermeture_volets">
            <label for="fermeture_volets">horaire fermeture volets &nbsp &nbsp</label>
            <input type="time" name="fermeture_volets">
        </div>

        <div id="ventilateur">
            <label for="ventilateur">ventilateur &nbsp &nbsp</label>
            <select name="ventilateur">
                <option value="0">0%</option>
                <option value="25">25%</option>
                <option value="50">50%</option>
                <option value="75">75%</option>
                <option value="100">100%</option>
            </select>
        </div>

        <div id="temperature">
            Temperature &nbsp <input type="number" name="temperature" placeholder="°C"  />
        </div>

        <div id="valider">
            <input type="submit" value="Valider" />
        </div>

    </form>
</section>
</body>
</html>
