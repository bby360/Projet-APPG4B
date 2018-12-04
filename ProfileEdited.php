<?php
session_start();?>
/**
* Created by PhpStorm.
* User: HannaTaravel
* Date: 2018-12-03
* Time: 18:10
*/

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../design/ProfileEdited.css" />
    <title>Profil Edité</title>
</head>

<p>

<div class="Contact">
    <p> <h1>Votre profil a été modifié : </h1>
    <h3>Nom : <?php /* récupérer le nom de l'utilisateur*/ echo $_SESSION['nom']?> </h3>
    <h3>Prénom : <?php /* récupérer le prénom de l'utilisateur*/ echo $_SESSION['prenom'] ?> </h3>
    <h3>Numéro de portable : <?php echo $_POST['numportable']; ?> </h3>
    <h3>E-mail : <?php echo $_POST['email']; ?></h3>
    <h3>Contact d'urgence : <?php echo $_POST['urgence']; ?></h3>
    </p>
</div>

<div class="Photo">
    <p> <h1>Votre photo de profil a été modifié : </h1> </p>

    <?php
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['newpic']) AND $_FILES['newpic']['error'] == 0)
    {
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['newpic']['size'] <= 1000000)
        {
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['newpic']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['newpic']['tmp_name'], 'uploads/' . basename($_FILES['newpic']['name']));
                echo "Votre photo a été modifiée !";

            }
        }
    }
    ?>

</div>

</body>