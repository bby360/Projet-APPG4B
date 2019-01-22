<?php
require "controllers/controllerAdmin.php";
if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);
    switch ($action) {

        case 'signinAdmin':
            signinAdmin();
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
            
        case 'deleteSensors':
            deleteSensors();
            break;

        case 'addedSensors':
            addedSensors();
            break;
            
        case 'deconnexion':
            deconnexion();
            break;
            
        case 'sensorsGestion':
            sensorsGestion();
            break;

        case 'deleteAlerte':
            deleteAlerte();
            break;
            
        case 'faqAdmin':
            addQuestionReponse();
            break;

        case 'forum':
            seeForum();
            break;

        case 'messageForum':
            seeMessageForum();
            break;
            
        case 'addMessage':
            addMessage();
            break;

        case 'addTopic':
            addTopic();
            break;

        case 'supMessage':
            supMessage();
            break;

        case 'supTopic':
            supTopic();
            break;

        case 'infoClient':
            infoClient();
            break;
            
        default:
            notFound();
            break;

    }
} else {
    signin();
}
