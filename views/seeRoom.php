<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/guest.css" />

</head>
<body>
<header>
    <?php
    include 'header.php';
    ?>
</header>
<section>

    <h1>Liste des pièces</h1>

    <ul>
        <?php foreach($rooms as $room) { ?>
            <li><a href="index.php?action=see_room&id=<?= $room["idRoom"]; ?>"></a> <?= $room["roomName"]; ?> <?= $room["mode"]; ?><?= $room["surface"]; ?></li>
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
