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

        case 'aide':
            aide();
            break;

        case 'connexion':
            connexion();
            break;
            
        case 'inscription':
            inscription();
            break;

        case 'inscription2':
            inscription2();
            break;

        case 'catalogue':
            catalogue();
            break;


        default:
            seeError();
            break;
    }
} else {
    seeHome();
}
