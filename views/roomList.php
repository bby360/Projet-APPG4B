
<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<?php include("isConnected.php"); ?>

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

    <h1><?php

        switch ($_SESSION['lang']){
            case 'fr':
                echo 'Liste des pièces';
                break;

            case 'eng':
                echo 'List of your rooms';
                break;
        }
        ?></h1>

    <table>
        <?php foreach($rooms as $room) { ?>
        <ul>
            <li><?php echo $room["roomName"]; ?>
        </ul>
        <?php } ?>



    </table>


</section>

</body>

</html>
