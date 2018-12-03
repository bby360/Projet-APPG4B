<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/guest.css" />

</head>
<body>
<header>

    <ul>
        <li><a href="index.php?action=see_home">Accueil</a></li>
        <li><a href="index.php?action=profil">Votre profil</a></li>
        <li><a href="index.php?action=rooms">Pièces</a></li>
        <li><a href="">Urgence</a></li>
        <li><a href="">Catalogue</a></li>
        <li><a href="">Consommation</a></li>
        <li><a href="">Forum</a></li>
        <li><a href="">FAQ</a></li>
    </ul>
    <div class="deconnexion">
        <a href="">Déconnexion</a>
    </div>
</header>
<section>

    <h1>Liste des pièces</h1>

    <ul>
        <?php foreach($rooms as $room) { ?>
            <li><a href="index.php?action=see_room&id=<?= $room["id"]; ?>"><?= $room["name"]; ?></a> <?= $room["area"]; ?></li>
        <?php } ?>
    </ul>

</section>
<footer>
    <ul>
        <li><a href="">Mentions légales</a></li>
        <li><a href="">A Propos</a></li>
        <li><a href="">Created by</a></li>
    </ul>
</footer>
</body>
</html>