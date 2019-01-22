<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>

<?php

if(!isset($_SESSION)) {
session_start();
}
$bdd = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');

$requser = $bdd->prepare("SELECT * FROM client WHERE idClient = ?");
$requser->execute(array($_SESSION['idClient']));
$user = $requser->fetch();


$_SESSION['email']=$user['email'];
$_SESSION['phone']=$user['phone'];
$_SESSION['emergency']=$user['emergency'];



if ( !empty($_POST['email']) and empty($_POST['phone']) and empty($_POST['emergency'])) {

    $newemail = htmlspecialchars($_POST['email']);

    $req = $bdd->prepare('SELECT * FROM client WHERE email = ?');
    $req->execute(array($_POST['email']));
    $exist = $req->fetch();

    if ($exist != null){
        echo "Cet email existe déjà";


    }

    else {
        $insertmail = $bdd->prepare('UPDATE client SET email = ? WHERE idClient = ? ');

        $insertmail->execute(array(
            $newemail,
            $_SESSION['idClient']
        ));

        $_SESSION['email'] = $newemail;
    }
}
elseif (!empty($_POST['phone']) and empty($_POST['email']) and empty($_POST['emergency'])){

    $newphone = htmlspecialchars($_POST['phone']);
    $insertphone = $bdd->prepare('UPDATE client SET phone = ? WHERE idClient = ?');
    $insertphone->execute(array(
        $newphone,
        $_SESSION['idClient'],
    ));

    $_SESSION['phone']=$newphone;

}
elseif (!empty($_POST['phone']) AND !empty($_POST['email']) and empty($_POST['emergency'])){

    $newphone = htmlspecialchars($_POST['phone']);
    $newemail = htmlspecialchars($_POST['email']);
    $req = $bdd->prepare('SELECT * FROM client WHERE email = ?');
    $req->execute(array($_POST['email']));
    $exist = $req->fetch();

    if ($exist != null){
        echo "Cet email existe déjà";

    }

    else {
        $req = $bdd->prepare('UPDATE client SET email = ?, phone = ? WHERE idClient = ?');
        $req->execute(array(
            $newemail,
            $newphone,
            $_SESSION['idClient'],
        ));

        $_SESSION['email'] = $newemail;
        $_SESSION['phone'] = $newphone;
    }
}
elseif(!empty($_POST['emergency']) and empty($_POST['phone']) and empty($_POST['email'])){

    $newemergency = htmlspecialchars($_POST['emergency']);
    $insertphone = $bdd->prepare('UPDATE client SET emergency = ? WHERE idClient = ?');
    $insertphone->execute(array(
        $newemergency,
        $_SESSION['idClient'],
    ));

    $_SESSION['emergency']=$newemergency;

}
elseif(!empty($_POST['emergency']) and !empty($_POST['phone']) and empty($_POST['email'])){

    $newphone = htmlspecialchars($_POST['phone']);
    $newemergency = htmlspecialchars($_POST['emergency']);
    $insertphone = $bdd->prepare('UPDATE client SET emergency = ?, phone = ? WHERE idClient = ?');
    $insertphone->execute(array(
        $newemergency,
        $newphone,
        $_SESSION['idClient'],
    ));

    $_SESSION['emergency']=$newemergency;
    $_SESSION['phone']=$newphone;

}
elseif(!empty($_POST['emergency']) and empty($_POST['phone']) and !empty($_POST['email'])){

    $newemail = htmlspecialchars($_POST['email']);
    $newemergency = htmlspecialchars($_POST['emergency']);

    $req = $bdd->prepare('SELECT * FROM client WHERE email = ?');
    $req->execute(array($_POST['email']));
    $exist = $req->fetch();

    if ($exist != null){
        echo "Cet email existe déjà";

    }
    else {
        $insertphone = $bdd->prepare('UPDATE client SET emergency = ?, email = ? WHERE idClient = ?');
        $insertphone->execute(array(
            $newemergency,
            $newemail,
            $_SESSION['idClient'],
        ));

        $_SESSION['emergency'] = $newemergency;
        $_SESSION['email'] = $newemail;
    }

}
elseif(!empty($_POST['emergency']) and !empty($_POST['phone']) and !empty($_POST['email'])){

    $newphone = htmlspecialchars($_POST['phone']);
    $newemail = htmlspecialchars($_POST['email']);
    $newemergency = htmlspecialchars($_POST['emergency']);

    $req = $bdd->prepare('SELECT * FROM client WHERE email = ?');
    $req->execute(array($_POST['email']));
    $exist = $req->fetch();

    if ($exist != null){
        echo "Cet email existe déjà";

    }

    else {
        $insertphone = $bdd->prepare('UPDATE client SET emergency = ?, phone = ?, email = ? WHERE idClient = ?');
        $insertphone->execute(array(
            $newemergency,
            $newphone,
            $newemail,
            $_SESSION['idClient'],
        ));

        $_SESSION['emergency'] = $newemergency;
        $_SESSION['email'] = $newemail;
        $_SESSION['phone'] = $newphone;
    }

}



?>

<div xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../design/ProfileEdited.css" />
        <title>Profil</title>
    </head>
    
    <header>
        <?php require "header.php"?>
    </header>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="./design/css/ProfileEdited.css" />
    <title>Profil</title>
</div>

<body>

<section>

    <p> <h1>Votre profil</h1>

    <div id="soussection">

        <div class="Contact">

            <fieldset>
                <legend><h2>Vos informations</h2></legend>
                <p>
                <h3>Nom : <?php /* récupérer le nom de l'utilisateur*/ echo $_SESSION['lastName'];?> </h3>
                <h3>Prénom : <?php /* récupérer le prénom de l'utilisateur*/ echo $_SESSION['firstName']; ?> </h3>
                <h3>Téléphone : <?php echo $_SESSION['phone']; ?> </h3>
                <h3>E-mail : <?php echo $_SESSION['email'];?> </h3>
                <h3>Contact d'urgence : <?php echo $_SESSION['emergency'];?> </h3>
                </p>
            </fieldset>

        </div>

        <div class=edit>

     <button ><a href="index.php?action=editProfile">Modifier votre profil</a> </button>
        </div>

    </div>
</section>
<footer>
    <?php require "footer.php"?>
</footer>
</body>
