<?php

require "models/dbconnexion.php";

function signingup(): bool
{
    $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $db=dbConnect();
    $req = $db->prepare("INSERT INTO client(lastName, firstName, email, phone, adress, mdp, postalcode, emergency) 
    VALUES(:lastName, :firstName, :email, :phone, :adress, :mdp, :postalcode, :emergency)");
 
    $req->execute([
    'lastName'=> $_POST['lastName'],
    'firstName' => $_POST['firstName'],
    'email'=> $_POST['email'],
    'phone'=> $_POST['phone'],
    'adress'=> $_POST['adress'],
    'mdp'=> $pass_hache,
    'postalcode'=> $_POST['postalcode'],
    'emergency' => $_POST['emergency']
    ]);
 
    return true;
}

function signingin($email, $mdp)
{   
    $db=dbConnect();
    $req = $db->prepare('SELECT * FROM client WHERE email = :email');
    $req->execute(['email' => $email]);
    $client = $req->fetch();

    if (password_verify($_POST['mdp'], $client['mdp'])) {
        session_start();
        $_SESSION['lastName'] = $client['lastName'];
        $_SESSION['firstName'] = $client['nom'];
        $_SESSION['email'] = $client['email'];
        $_SESSION['adress'] = $client['adress'];
        $_SESSION['phone'] = $client['phone'];
        $_SESSION['postalcode']=$client['postalcode'];
    } else {
		$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }
}

function getRoom(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM room");
    return $req;
}
