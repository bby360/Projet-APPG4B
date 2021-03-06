<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<?php include("isConnected.php"); ?>
<html>
<head>
    <meta charset="utf-8" />
    <title>CommenterAlerte</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/commenterAlerte.css" />
</head>
<img id="fond" src="./designs/pictures/photo.jpg">
<body>
<header>
    <?php include("header.php"); ?>
</header>
<section>
 <p> Vous souhaitez déclarer une alerte pour un capteur de type : <?= $_GET['capteur'];?> dans la pièce : <?= $_GET['room'];?>  </p>
<form action="index.php?action=posterAlerte&idCapteur=<?= $_GET['idCapteur'];?>&idRoom=<?= $_GET['idRoom'];?>" method="post" name="alerte">
    <p>
        <label for="typeAlerte">Type d'alerte</label><br />
        <SELECT name="typeAlerte" id="typeAlerte" size="1">
            <OPTION values="Ne fonctionne pas">Ne fonctionne pas</option>
            <OPTION values="fonctionne par intermittence">fonctionne par intermittence</option>
            <OPTION values="met du temps à repondre">met du temps à repondre</option>
            <OPTION values="je l'ai cassé">je l'ai cassé</option>
        </SELECT>
    </p>
    <p>
        <label for="commentaire">Commentaire</label><br />
        <textarea name="commentaire" id="commentaire" rows="10" cols="50"></textarea>
    </p>
    <div id="valider">
        <input type='button' value='Confirmer' onClick='Confirmer()'>

    </div>
</form>
</section>

<script language='javascript'>
    function Confirmer()
    {
        if (document.alerte.commentaire.value == "") {

            alert("Veuillez ajouter un commentaire");
            return false; 
        }
        else (confirm("Souhaitez-vous vraiment déclarer cette alerte ?"))
        {
            alerte.submit();
        }
    }

</script>
