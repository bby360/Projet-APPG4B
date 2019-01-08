<?php
require "models/modelAdmin.php";

function notFound() {
    require "views/notFound.php";
}

function signin()
{


    if (isset($_POST['email'])) {
        if (!empty($_POST['email']) && !empty($_POST['mdp'])) {

            $db = dbConnect();
            $req = $db->prepare('SELECT * FROM admin WHERE (email = :email)');
            $req->execute(['email' => $_POST['email']]);
            $client = $req->fetch(PDO::FETCH_OBJ);

            header('Location: indexAdmin.php?action=dashboard');
            exit();
        } else {
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
            echo 'Vous avez tapé le mauvais mdp';
        }
    }
    require 'views/signinAdmin.php';
}

function dashboard(){
    require"views/dashboard.php";
}

