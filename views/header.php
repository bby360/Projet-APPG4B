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
                <li><a href="#"><img src="./designs/pictures/G4B.jpg" id="logo"></a></li>
                <li><a href="index.php?action=dashboard">Accueil</a></li>
                <li><a href="index.php?action=profileEdited">Votre profil</a>
                    <ul>
                        <li><a href="index.php?action=editProfile">Modifier mon profil</a></li>
                        <li><a href="index.php?action=guest">Ajouter un invité</a></li>
                    </ul>
                </li>

                <li><a href="index.php?action=rooms&amp;piece=salon">Pièces</a>
                    <ul>
                        <li><a href="index.php?action=roomList">Voir mes pièces</a></li>
                        <li><a href="index.php?action=addRoom">Ajouter une pièce</a></li>
                    </ul>
                </li>

                <li><a href="index.php?action=catalogue">Catalogue</a></li>
                <li><a href="#">Consommation</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Urgence</a></li>
                <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
            </ul>
        </div>

    </nav>
</header>
</body>

</html>
