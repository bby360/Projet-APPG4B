<?php
require "models/modelAdmin.php";

function notFound() {
    require "views/notFound.php";
}

function signupAdmin(){
    if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email'])
        && isset($_POST['mdp'])){

        if (empty($_POST['lastName']) || empty($_POST['firstName']) ||
            empty($_POST['email']) || empty($_POST['mdp']) || $_POST['mdp'] != $_POST['confirm_mdp']) {

            $alerte = "Veuillez remplir tous les champs correctement.";
            echo "Veuillez remplir tous les champs correctement.";
        } else {
            signingup();
            header('Location: indexAdmin.php?action=signin');

            exit();

        }
    }

    require "views/signupAdmin.php";
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
    $sensors = getSensorsList()->fetchAll();
    require"views/catalogueAdmin.php";
}

function addSensors(){
    require"views/addSensors.php";
}

function welcome(){
    require "views/welcome.php";
}

function lightSensorsUnlog(){
    $sensors = getLightSensors()->fetchAll();
    require "views/lightSensorsUnlog.php";
}

function presenceSensorsUnlog(){
    $sensors = getPresenceSensors()->fetchAll();
    require "views/presenceSensorsUnlog.php";
}

function temperatureSensorsUnlog(){
    $sensors = getTemperatureSensors()->fetchAll();
    require "views/temperatureSensorsUnlog.php";
}

