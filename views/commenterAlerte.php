<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>CommenterAlerte</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/commenterAlerte.css" />
</head>
<body>
<header>
    <?php include("header.php"); ?>
</header>
 <p> Vous souhaitez déclarer une alerte pour un capteur de type <?= $_GET['capteur'];?> </p>
<form action="index.php?action=posterAlerte&idCapteur=<?= $_GET['idCapteur'];?>" method="post" name="alerte">
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
