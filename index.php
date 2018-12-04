<?php

require "controllers/controller.php";

if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);

    switch ($action) {

        case 'temporary':
            temporary();
            break;

        case 'rooms':
            rooms();
            break;


        case 'seeRoom':
            seeRooms();
            break;
        
        case 'edit_profile':
            editProfile();
            break;


        default:
            seeError();
            break;
    }
} else {
    rooms();
}
