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

function getSensorsList(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM catalogue ORDER BY (typeProduct)");
    return $req;
}

function getLightSensors(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM catalogue WHERE typeProduct='Luminosité'");
    return $req;
}

function getPresenceSensors(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM catalogue WHERE typeProduct='Présence'");
    return $req;
}

function getTemperatureSensors(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM catalogue WHERE typeProduct='Temperature'");
    return $req;
}

function deletedSensors(){
    $db=dbConnect();
    $req =$db ->query("DELETE * FROM catalogue");
    return $req;
}

function insertSensors(){
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO catalogue(typeProduct,consumption,price) VALUES(:typeProduct,:consumption,:price)");
    $req->execute([
        'typeProduct'=> $_POST['typeProduct'],
        'consumption' => $_POST['consumption'],
        'price'=> $_POST['price'],
    ]);
    header("location: indexAdmin.php?action=catalogueAdmin");
}
