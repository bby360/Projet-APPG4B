<?php

require "controllers/controller.php";



if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);

    switch ($action) {
        case 'see_home':
            seeHome();
            break;

        case 'temporary':
            temporary();
            break;

        case 'rooms':
            rooms();
            break;

        case 'deconnexion':
            deconnexion();
            break;

        case 'connexion':
            connexion();
            break;
            
        case 'inscription':
            view_inscription();
            break;

        case 'inscrire':
            inscrire();
            break;

        case 'edit_profile':
            editProfile();
            break;

        default:
            seeError();
            break;
    }
} else {
    seeHome();
}
