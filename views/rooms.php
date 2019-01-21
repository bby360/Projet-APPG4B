<?php
if(!isset($_SESSION)) {
session_start();
} ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php

        switch ($_SESSION['lang']){
            case 'fr':
                echo 'Pièce';
                break;

            case 'eng':
                echo 'Room';
                break;
        }
        ?></title>
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
        <p><?php

            switch ($_SESSION['lang']){
                case 'fr':
                    echo 'Mode de gestion de la pièce :';
                    break;

                case 'eng':
                    echo 'Room management mode :';
                    break;
            }
            ?><br></p>
            <input type="radio" name="mode" value="Auto" id="automatique" <?php foreach($infos as $info) { if ($info['mode'] == 'Auto'){ echo 'checked="checked"';} }?>>  <label for="automatique"><?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo 'Automatique';
                        break;

                    case 'eng':
                        echo 'Automatic';
                        break;
                }
                ?></label>
            <input type="radio" name="mode" value="Manuel" id="manuel" <?php  foreach($infos as $info) { if ($info['mode'] == 'Manuel'){ echo 'checked="checked"';} }?>> <label for="manuel"><?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo 'Manuel';
                        break;

                    case 'eng':
                        echo 'Manual';
                        break;
                }
                ?></label>

        </div>

        <div id="lumiere_auto">
            <?php

            switch ($_SESSION['lang']){
                case 'fr':
                    echo 'Luminosité';
                    break;

                case 'eng':
                    echo 'Brightness';
                    break;
            }
            ?> &nbsp &nbsp
            0% <input type="range" name="lumiere_auto" value=<?php foreach($infos as $info) { echo $info['lumAuto']; }?> max="100" min="0" step="5"> 100%

            <!-- Rounded switch -->
            <label class="switch">
                <input type="checkbox" name='onOff' value="1" <?php foreach($infos as $info) { if ($info['lum'] == '1'){ echo 'checked="checked"';} }?> />
                <span class="slider round"></span>
            </label>

            <div id="lumiere_manuel">
                <?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo 'Luminosité';
                        break;

                    case 'eng':
                        echo 'Brightness';
                        break;
                }
                ?> &nbsp &nbsp
                0% <input type="range" name="lumiere_manuel" value=<?php foreach($infos as $info) { echo $info['lumManu']; }?> max="100" min="0" step="5"/>100%
            </div>
        </div>

        <div id="ouverture_volets">
            <label for="ouverture_volets"><?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Heure d'ouverture des volets";
                        break;

                    case 'eng':
                        echo "Blinds' opening time";
                        break;
                }
                ?> &nbsp &nbsp</label>
            <input type="time" name="ouverture_volets" value=<?php foreach($infos as $info) { echo $info['blindOpenTime']; }?>>
            <div id="volets_manuel">
                <?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Volets";
                        break;

                    case 'eng':
                        echo "Blinds";
                        break;
                }
                ?> &nbsp &nbsp
                0% <input type="range" name="volets_manuel" value=<?php foreach($infos as $info) { echo $info['voletsManu']; }?> max="100" min="0" step="5"/>100%
            </div>
        </div>

        <div id="fermeture_volets">
            <label for="fermeture_volets"><?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Heure de fermeture des volets";
                        break;

                    case 'eng':
                        echo "Blinds' closing time";
                        break;
                }
                ?> &nbsp &nbsp</label>
            <input type="time" name="fermeture_volets" value=<?php foreach($infos as $info) { echo $info['blindCloseTime']; }?>>
        </div>



        <div id="temperature">
            Temperature &nbsp <input type="number" name="temperature" placeholder=<?php foreach($infos as $info) { if ($info['mode'] == 'Auto'){ echo $info['tempAuto'];} else{ echo $info['tempManu']; } }?>°C  />
        </div>

        <div id="valider">
            <input type="submit" value="<?php

            switch ($_SESSION['lang']){
                case 'fr':
                    echo "Valider";
                    break;

                case 'eng':
                    echo "Confirm";
                    break;
            }
            ?>" />
        </div>

    </form>

</section>
<footer>
    <!-- <?php /*include("footer.php")*/; ?> -->

</footer>



</body>
</html>

<!-- <form name="lumiere" id="lumiere" method="post" action="index.php?action=updateLum">
            <label class="switch">
                <input type="checkbox" name='onOff' value="1" onchange="this.lumiere.submit();"/>
                <span class="slider round"></span>
            </label>
            </form> -->

