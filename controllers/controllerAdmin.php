<?php
require "models/modelAdmin.php";

function notFound() {
    require "views/notFound.php";
}

function signupAdmin(){
    if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email'])
        && isset($_POST['mdp']) && isset($_POST['phone']) && isset($_POST['adress']) && isset($_POST['confirm_mdp']) && isset($_POST['pays'])) {

        if (empty($_POST['lastName']) || empty($_POST['firstName'])  || empty($_POST['pays'])  ||
            empty($_POST['email'])  || empty($_POST['mdp'])  ||  empty($_POST['phone']) &&
            empty($_POST['adress'])  || $_POST['mdp']!=$_POST['confirm_mdp']) {

            $alerte = "Veuillez remplir tous les champs correctement.";
            echo "Veuillez remplir tous les champs correctement.";
        }   else {
            signingup();
            header('Location: index.php?action=signin');

            exit();

        }
    }

    require "views/signup.php";
}

function signinAdmin(){


        if (!empty($_POST['email']) && !empty($_POST['mdp'])) {

            $db = dbConnect();
            $req = $db->prepare('SELECT * FROM admin WHERE (email = :email)');
            $req->execute(['email' => $_POST['email']]);
            $admin = $req->fetch(PDO::FETCH_OBJ);



            if(password_verify($_POST['mdp'], $admin->mdp)) {
                session_start();

                $_SESSION['email'] = $admin->email;

                echo 'Vous êtes maintenant connecté';


                header('Location: indexAdmin.php?action=dashboardAdmin');
                exit();
            }
        else {
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
            echo 'Vous avez tapé le mauvais mdp';
        }
    }
    require 'views/signinAdmin.php';
}


function dashboardAdmin(){
    require"views/dashboardAdmin.php";
}

function clients(){
    require "views/clients.php";
}
function catalogue(){
    require"views/catalogueAdmin.php";
}

