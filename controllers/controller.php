<?php
require "models/model.php";

function welcome(){
    require "views/welcome.php";
}

function inscription(){

    if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email']) 
    && isset($_POST['mdp']) && isset($_POST['phone']) && isset($_POST['adress']) && isset($_POST['confirm_mdp'])) {

        if (empty($_POST['lastName']) || empty($_POST['firstName'])  || 
        empty($_POST['email'])  || empty($_POST['mdp'])  ||  empty($_POST['phone']) && 
        empty($_POST['adress'])  || $_POST['mdp']!=$_POST['confirm_mdp']) {
 
                $alerte = "Veuillez remplir tous les champs correctement.";
                echo "Veuillez remplir tous les champs correctement.";
            }   else {                
                inscrire();                
                header('Location: index.php?action=seehome');

                exit();
            }
        }

        require "views/inscription.php";
}
