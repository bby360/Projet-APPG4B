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
                <li><a href="indexAdmin.php?action=dashboardAdmin"><img src="./designs/pictures/G4B.jpg" id="logo"></a></li>
                <li><a href="indexAdmin.php?action=dashboardAdmin">Accueil</a></li>
                <li><a href="indexAdmin.php?action=clients">Clients</a>
                <li><a href="indexAdmin.php?action=catalogueAdmin">Catalogue</a>
                <li><a href="indexAdmin.php?action=sensorsGestion">Gestion des capteurs</a>
                <li><a href="indexAdmin.php?action=faqAdmin">Gestion FAQ</a>
                <li><a href="indexAdmin.php?action=forum">Forum</a></li>

                <li><a href="indexAdmin.php?action=deconnexion">Déconnexion</a></li>
            </ul>
        </div>

    </nav>
</header>
</body>

</html>
