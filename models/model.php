<?php

require "models/dbconnexion.php";

function inscrire(): bool
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
