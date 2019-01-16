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
                <li><a href="index.php?action=dashboard">Accueil</a></li>
                <li><a href="index.php?action=profileEdited">Votre profil</a>
                    <ul>
                        <li><a href="index.php?action=editProfile">Modifier mon profil</a></li>
                        <li><a href="index.php?action=addGuest">Ajouter un invité</a></li>
                    </ul>
                </li>

                <li><a href="index.php?action=rooms&amp;piece=Choisir une pièce">Pièces</a>
                    <ul>
                        <li><a href="index.php?action=roomList">Voir mes pièces</a></li>
                        <li><a href="index.php?action=addRoom">Ajouter une pièce</a></li>
                    </ul>
                </li>
                <li><a href="index.php?action=addHouse">Vos maisons</a>
                    <ul>
                        <li><a href="index.php?action=addHouse">Ajouter une maison</a></li>
                        <li><a href="index.php?action=seeHouse">Voir mes maisons</a></li>

                    </ul>
                </li>

                <li><a href="index.php?action=catalogue">Catalogue</a>
                    <ul>
                        <li><a href="index.php?action=lightSensors">Capteurs de luminosité</a></li>
                        <li><a href="index.php?action=presenceSensors">Capteurs de présence</a></li>
                        <li><a href="index.php?action=temperatureSensors">Capteurs de température</a></li>
                    </ul>
                </li>
                <li><a href="index.php?action=consumption">Consommation</a></li>
                <li><a href="index.php?action=forum">Forum</a></li>
                <li><a href="index.php?action=faq">FAQ</a></li>
                <li><a href="index.php?action=urgence">Urgence</a></li>

                <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
            </ul>
        </div>

    </nav>
</header>
</body>

</html>
