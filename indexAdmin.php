<?php
require "controllers/controllerAdmin.php";
if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);
    switch ($action) {

        case 'signinAdmin':
            signinAdmin();
            break;

        case 'signupAdmin':
            signupAdmin();
            break;

        case 'dashboardAdmin':
            dashboardAdmin();
            break;

        case 'clients':
            clients();
            break;
            
        case 'catalogueAdmin':
            catalogue();
            break;
            
        case 'addSensors':
            addSensors();
            break;
            
        case 'welcome':
            welcome();
            break;

        case 'lightSensorsUnlog':
            lightSensorsUnlog();
            break;

        case 'presenceSensorsUnlog':
            presenceSensorsUnlog();
            break;

        case 'temperatureSensorsUnlog':
            temperatureSensorsUnlog();
            break;
            
        case 'deconnexion':
            deconnexion();
            break;
            
        case 'sensorsGestion':
            sensorsGestion();
            break;


        default:
            notFound();
            break;

    }
} else {
    signin();
}
