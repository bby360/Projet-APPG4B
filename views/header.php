<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Header</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./designs/css/header.css" />
</head>

<body>
<header>
    <nav>

        <div id="menu">
            <ul>
                <li><a href="index.php?action=dashboard"><img src="./designs/pictures/G4B.jpg" id="logo"></a></li>
                <li><a href="index.php?action=dashboard"><?php

                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo 'Accueil';
                                break;

                            case 'eng':
                                echo 'Homepage';
                                break;
                        }
                        ?></a></li>
                <li><a href="index.php?action=profileEdited"><?php

                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo 'Profil';
                                break;

                            case 'eng':
                                echo 'Profile';
                        }
                        ?></a>
                    <ul>
                        <li><a href="index.php?action=editProfile"><?php

                                switch ($_SESSION['lang']){
                                    case 'fr':
                                        echo 'Modifier mon profil';
                                        break;

                                    case 'eng':
                                        echo 'Edit profile';
                                        break;
                                }
                                ?></a></li>
                        <!--  <li><a href="index.php?action=addGuest">Ajouter un invité</a></li> !-->
                    </ul>
                </li>

                <li><a href="index.php?action=rooms&amp;piece=Choisir une pièce"><?php

                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo 'Pièces';
                                break;

                            case 'eng':
                                echo 'Rooms';
                                break;
                        }
                        ?></a>
                    <ul>
                        <li><a href="index.php?action=roomList"><?php

                                switch ($_SESSION['lang']){
                                    case 'fr':
                                        echo 'Voir mes pièces';
                                        break;

                                    case 'eng':
                                        echo 'Manage my rooms';
                                        break;
                                }
                                ?></a></li>
                        <li><a href="index.php?action=seeAddRoom"><?php

                                switch ($_SESSION['lang']){
                                    case 'fr':
                                        echo 'Ajouter une pièce';
                                        break;

                                    case 'eng':
                                        echo 'Add a room';
                                        break;
                                }
                                ?></a></li>
                    </ul>
                </li>
                <li><a href="index.php?action=addHouse"><?php

                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo 'Vos maisons';
                                break;

                            case 'eng':
                                echo 'Your houses';
                                break;
                        }
                        ?></a>
                    <ul>
                        <li><a href="index.php?action=addHouse"><?php

                                switch ($_SESSION['lang']){
                                    case 'fr':
                                        echo 'Ajouter une maison';
                                        break;

                                    case 'eng':
                                        echo 'Add a house';
                                        break;
                                }
                                ?></a></li>
                        <li><a href="index.php?action=seeHouse"><?php

                                switch ($_SESSION['lang']){
                                    case 'fr':
                                        echo 'Voir mes maisons';
                                        break;

                                    case 'eng':
                                        echo 'Manage my houses';
                                        break;
                                }
                                ?></a></li>

                    </ul>
                </li>

                <li><a href="index.php?action=catalogue">Catalogue</a>
                    <ul>
                        <li><a href="index.php?action=lightSensors"><?php

                                switch ($_SESSION['lang']){
                                    case 'fr':
                                        echo 'Capteurs de luminosité';
                                        break;

                                    case 'eng':
                                        echo 'Light sensors';
                                        break;
                                }
                                ?></a></li>
                        <li><a href="index.php?action=presenceSensors"><?php

                                switch ($_SESSION['lang']){
                                    case 'fr':
                                        echo 'Capteurs de présence';
                                        break;

                                    case 'eng':
                                        echo 'Proximity sensors';
                                        break;
                                }
                                ?></a></li>
                        <li><a href="index.php?action=temperatureSensors"><?php

                                switch ($_SESSION['lang']){
                                    case 'fr':
                                        echo 'Capteurs de température';
                                        break;

                                    case 'eng':
                                        echo 'Heat sensors';
                                        break;
                                }
                                ?></a></li>
                    </ul>
                </li>
                <li><a href="index.php?action=consumption"><?php

                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo 'Consommation';
                                break;

                            case 'eng':
                                echo 'Consumption';
                                break;
                        }
                        ?></a></li>
                <li><a href="index.php?action=forum">Forum</a></li>
                <li><a href="index.php?action=faq">FAQ</a></li>
                <li><a href="index.php?action=urgence"><?php

                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo 'Urgence';
                                break;

                            case 'eng':
                                echo 'Emergency';
                                break;
                        }
                        ?></a></li>
                <li><a href="index.php?action=langue"><?php

                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo 'English';
                                break;

                            case 'eng':
                                echo 'Français';
                                break;
                        }
                        ?></a></li>

                <li><a href="index.php?action=deconnexion"><?php

                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo 'Déconnexion';
                                break;

                            case 'eng':
                                echo 'Log out';
                                break;
                        }
                        ?></a></li>
            </ul>
        </div>

    </nav>
</header>
</body>

</html>
