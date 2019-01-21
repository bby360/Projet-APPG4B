<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<?php include("isConnected.php"); ?>

<html>
<head>
    <meta charset="utf-8" />
    <title><?php

        switch ($_SESSION['lang']){
            case 'fr':
                echo "Page d'accueil";
                break;

            case 'eng':
                echo 'Homepage';
                break;
        }
        ?></title>
    <link rel="stylesheet" type="text/css" href="designs/css/dashboard.css" />
</head>
<body>
<img id="fond" src="./designs/pictures/photo.jpg">
<header>
    <?php include("header.php"); ?>

</header>

<section>


    <div class="piece"><a href="index.php?action=rooms&amp;piece=Choisir une pièce">
            <div class="text">
                <p><?php

                    switch ($_SESSION['lang']){
                        case 'fr':
                            echo 'PIECES';
                            break;

                        case 'eng':
                            echo 'ROOMS';
                            break;
                    }
                    ?></p>
            </div>
        </a>
    </div>

    <div class="profil"><a href="index.php?action=profileEdited">
            <div class="text">
                <p><?php

                    switch ($_SESSION['lang']){
                        case 'fr':
                            echo 'PROFIL';
                            break;

                        case 'eng':
                            echo 'PROFILE';
                            break;
                    }
                    ?></p>
            </div>
        </a>
    </div>

    <div class="catalogue"><a href="index.php?action=catalogue">
            <div class="text">
                <p>CATALOGUE</p>
            </div>
        </a>
    </div>

    <div class="consommation"><a href="index.php?action=consumption">
            <div class="text">
                <p><?php

                    switch ($_SESSION['lang']){
                        case 'fr':
                            echo 'CONSOMMATION';
                            break;

                        case 'eng':
                            echo 'CONSUMPTION';
                            break;
                    }
                    ?></p>
            </div>
        </a>
    </div>

</section>

<footer>
    <?php include("footer.php"); ?>
</footer>
</body>
</html>
