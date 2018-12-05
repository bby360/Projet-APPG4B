<?php

require "controllers/controller.php";



if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);

    switch ($action) {
        case 'home':
            home();
            break;

        case 'temporary_guest.php':
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
            
        case 'inscription2':
            inscription2();
            break;

        case 'SeeRoom':
            SeeRoom();
            break;
            
        case 'footer':
            footer();
            break;

        case 'header':
            header();
            break;

        default:
            seeError();
            break;
            
            
    }
} else {
    seeHome();
}
