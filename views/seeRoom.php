<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/seeRoom.css" />
</head>
<body>
<header>
    <?php
    include 'header.php';
    ?>
</header>
<section>

    <h1>Liste des pièces</h1>

    <ol>
        <?php foreach($rooms as $room) { ?>
            <li>
                
                <?= 'Numéro de la pièce ' ,$room["idRoom"]; ?>
                
                <?= 'Nom de la pièce ' ,$room["roomName"]; ?>
                
                <?= 'Mode de la pièce ' ,$room["mode"]; ?>
                
                <?= 'Surface de la pièce ' ,$room["surface"]; ?>
                
            </li>
        <?php } ?>
    </ol>

</section>
    
</body>
    
</html>
