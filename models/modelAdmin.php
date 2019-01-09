<?php
require "models/dbconnexion.php";

function signingup(): bool
{   if(!isset($_SESSION))
{
    session_start();
}

    $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $db=dbConnect();
    $req = $db->prepare("INSERT INTO admin(lastName, firstName,email, mdp) VALUES(:lastName, :firstName, :email, :mdp)");

    $req->execute([
        'lastName'=> $_POST['lastName'],
        'firstName' => $_POST['firstName'],
        'email'=> $_POST['email'],

        'mdp'=> $pass_hache,

    ]);

    return true;
}