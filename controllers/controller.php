<?php
require "models/model.php";

function welcome(){
    require "views/welcome.php";
}

function signup(){

    if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email']) 
    && isset($_POST['mdp']) && isset($_POST['phone']) && isset($_POST['adress']) && isset($_POST['confirm_mdp'])) {

        if (empty($_POST['lastName']) || empty($_POST['firstName'])  || 
        empty($_POST['email'])  || empty($_POST['mdp'])  ||  empty($_POST['phone']) && 
        empty($_POST['adress'])  || $_POST['mdp']!=$_POST['confirm_mdp']) {
 
                $alerte = "Veuillez remplir tous les champs correctement.";
                echo "Veuillez remplir tous les champs correctement.";
            }   else {                
                signingup();                
                header('Location: index.php?action=dashboard');

                exit();
            }
        }

        require "views/signup.php";
}

function catalogue(){
    require"views/catalogue.php";
}

function dashboard(){
    require"views/dashboard.php";
}
