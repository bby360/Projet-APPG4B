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
            $admin = $req->fetch(PDO::FETCH_OBJ);



            if(password_verify($_POST['mdp'], $admin->mdp)) {
                session_start();

                $_SESSION['email'] = $admin->email;


                echo 'Vous êtes maintenant connecté';


                header('Location: indexAdmin.php?action=dashboard');
                exit();
            }

            exit();
        } else {
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
            echo 'Vous avez tapé le mauvais mdp';
        }
    }
    require 'views/signinAdmin.php';
}

function dashboard(){
    require"views/dashboardAdmin.php";
}

function clients(){
    require "views/clients.php";
}

