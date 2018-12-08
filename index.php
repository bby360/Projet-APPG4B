<?php

require "controllers/controller.php";



if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);

    switch ($action) {
        case 'home':
            seeRoom();
            break;

        case 'temporaryGuest.php':
            temporary();
            break;

        case 'rooms':
            rooms();
            break;
            
        case 'add_room':
            addRoom();
            break;

        case 'deconnexion':
            deconnexion();
            break;

            
        case 'inscription':
            inscription();
            break;

        case 'edit_profile':
            editProfile();
            break;
            
        case 'inscription2':
            inscription2();
            break;

        case 'seeRoom':
            seeRoom();
            break;
            
        case 'footer':
            footer();
            break;
            
        case 'catalogue':
            catalogue();
            break;

        case 'connexion':
            seconnecter();
            break;
            
        case 'updateRoom':
			updateRoom();
			break;
            
        default:
            seeError();
            break;
            
            
    }
} else {
    pageNonConnecté();
}
