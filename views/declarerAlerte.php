<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<?php include("isConnected.php"); ?>
<html>
<head>
    <meta charset="utf-8" />
    <title>DeclarerAlerte</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/declarerAlerte.css" />
</head>
<body>
<img id="fond" src="./designs/pictures/photo.jpg">
<header>
    <?php include("header.php"); ?>
</header>
<section>
<table>
    <thead>
    <tr>
        <td><h3>Pièce</h3></td>
        <td><h3>Type de capteur</h3></td>
        <td><h3></h3></td>
    </tr>
    </thead>

    <?php foreach($typeCapteurs as $key => $value){ ?>
    
        
         <tr id='info'> 

            <td class="tab1">
                <p><?=$roomNames[$key]; ?></p>
            </td>
            <td class="tab3">
                <p><?= $typeCapteurs[$key];?></p>
            </td>
            <td class="tab4">
            <a href="index.php?action=commenterAlerte&amp;capteur=<?= $typeCapteurs[$key];?>&amp;idCapteur=<?= $idCapteurs[$key];?>&amp;room=<?=$roomNames[$key]; ?>&amp;idRoom=<?= $idRooms[$key];?>" > <input type="button" value="declarer alerte" /> </a>

            </td>
        </tr>
    <?php } ?>
    
   
</table>
</section>



