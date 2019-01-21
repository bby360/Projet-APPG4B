<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Urgence</title>
    <link rel="stylesheet" type="text/css" href="designs/css/urgence.css" />
</head>
<body>

<header>
    <?php include("header.php"); ?>

</header>
<a href="index.php?action=declarerAlerte"><input id="button" type="button" value="<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    switch ($_SESSION['lang']){
        case 'fr':
            echo "ALERTE";
            break;

        case 'eng':
            echo "EMERGENCY";
            break;
    }
    ?>"></a>
<section>
    
    
	<div class="gallery">
        <a href="./index.php?action=contactUrgence">
            <img src="designs/pictures/light.jpg">
        </a>
        <div class="desc"><?php
            if(!isset($_SESSION)) {
        session_start();
    }
            switch ($_SESSION['lang']){
                case 'fr':
                    echo "Contact d'urgence";
                    break;

                case 'eng':
                    echo "Emergency contact";
                    break;
            }
            ?></div>
    </div>
    <div class="gallery">
        <a href="./designs/pictures/presence.jpg">
            <img src="designs/pictures/presence.jpg">
        </a>
        <div class="desc">FAQ</div>
    </div>
    <div class="gallery">
        <a href="index.php?action=forum">
            <img src="designs/pictures/light.jpg">
        </a>
        <div class="desc">Forum</div>
    </div>
   
 



</section>
