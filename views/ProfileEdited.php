<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../design/ProfileEdited.css" />
    <title>Profil Edité</title>
</head>

<p>

    <div class="Contact">
<?php
$bdd = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', 'root');

if ( !empty($_POST['email']) and empty($_POST['phone'])) {

    $newemail = $_POST['email'];
    $newemergency = $_POST['emergency'];

    $req = $bdd->prepare('UPDATE Client SET email = :newemail WHERE lastName = :lastName');
    $req->execute(array(
        'newemail' => $newemail,
        'lastName' => $_SESSION['lastName'],
    ));

}
elseif (!empty($_POST['phone']) and empty($_POST['email'])){

    $newphone = $_POST['phone'];
    $req = $bdd->prepare('UPDATE Client SET phone = :newphone WHERE lastName = :lastName');
    $req->execute(array(
    'newphone' => $newphone,
    'lastName' => $_SESSION['lastName'],
    ));

}
elseif (!empty($_POST['phone']) AND !empty($_POST['email'])){

    $newphone = $_POST['phone'];
    $newemail = $_POST['email'];
    $req = $bdd->prepare('UPDATE Client SET email = newemail, phone = :newphone WHERE lastName = :lastName');
    $req->execute(array(
        'newemail' => $newemail,
        'newphone' => $newphone,
        'lastName' => $_SESSION['lastName'],
    ));
}
else{
    echo "Vous avez fait une erreur lors de la saisie du email/password, recommencez";
}


?>

<p> <h1>Votre profil a été modifié : </h1>
<h3>Nom : <?php /* récupérer le nom de l'utilisateur*/ echo $_SESSION['lastName'];?> </h3>
<h3>Prénom : <?php /* récupérer le prénom de l'utilisateur*/ echo $_SESSION['firstName']; ?> </h3>
<h3>Téléphone : <?php echo $_SESSION['phone']; ?> </h3>
<h3>E-mail : <?php echo $_SESSION['email'];?> </h3>


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