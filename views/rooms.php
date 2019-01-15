

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pièce</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/rooms.css" />
</head>
<body>
<img id="fond" src="./designs/pictures/photo.jpg">
<header class="header">
    <?php include("header.php"); ?>
</header>
<section>


    <ul id="menuvertical">
        <li ><a href="#"><?php echo $_GET['piece']; ?></a>
            <ul>
                <?php
                foreach($rooms as $room) { ?>

                    <li><a href="index.php?action=rooms&piece=<?= $room["roomName"]; ?>"><?php echo $room["roomName"]; ?></a></li>

                <?php } ?>
            </ul>
        </li>
    </ul>

    <form action="index.php?action=updateRoom&piece=<?php echo $_GET['piece']; ?>" method="post">

        <div id="mode">


            <p>Mode de gestion de la pièce : <br></p>
            <input type="radio" name="mode" value="Auto" id="automatique" <?php foreach($infos as $info) { if ($info['mode'] == 'Auto'){ echo 'checked="checked"';} }?>>  <label for="automatique">Automatique</label>
            <input type="radio" name="mode" value="Manuel" id="manuel" <?php  foreach($infos as $info) { if ($info['mode'] == 'Manuel'){ echo 'checked="checked"';} }?>> <label for="manuel">Manuel</label>

        </div>

        <div id="lumiere_auto">
            Luminosité &nbsp &nbsp
            0% <input type="range" name="lumiere_auto" value=<?php foreach($infos as $info) { echo $info['lumAuto']; }?> max="100" min="0" step="5"> 100%
            <div id="lumiere_manuel">
                Luminosité &nbsp &nbsp
                0% <input type="range" name="lumiere_manuel" value=<?php foreach($infos as $info) { echo $info['lumManu']; }?> max="100" min="0" step="5"/>100%
            </div>
        </div>

        <div id="ouverture_volets">
            <label for="ouverture_volets">Horaire ouverture volets &nbsp &nbsp</label>
            <input type="time" name="ouverture_volets" value=<?php foreach($infos as $info) { echo $info['blindOpenTime']; }?>>
            <div id="volets_manuel">
                Volets &nbsp &nbsp
                0% <input type="range" name="volets_manuel" value=<?php foreach($infos as $info) { echo $info['voletsManu']; }?> max="100" min="0" step="5"/>100%
            </div>
        </div>

        <div id="fermeture_volets">
            <label for="fermeture_volets">Horaire fermeture volets &nbsp &nbsp</label>
            <input type="time" name="fermeture_volets" value=<?php foreach($infos as $info) { echo $info['blindCloseTime']; }?>>
        </div>



        <div id="temperature">
            Temperature &nbsp <input type="number" name="temperature" placeholder=<?php foreach($infos as $info) { if ($info['mode'] == 'Auto'){ echo $info['tempAuto'];} else{ echo $info['tempManu']; } }?>°C  />
        </div>

        <div id="valider">
            <input type="submit" value="Valider" />
        </div>

    </form>

</section>
<footer>
    <!-- <?php /*include("footer.php")*/; ?> -->

</footer>



</body>
</html>
