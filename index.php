<?php
require "controllers/controller.php";
if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);
    switch ($action) {
            
        case 'signin':
          signin();
          break;
            
        case 'catalogue':
            catalogue();
            break;
            
        case 'signup':
            signup();
            break;

        case 'dashboard':
            dashboard();
            break;
            
        case 'roomList':
            roomList();
            break;

        case 'addRoom':
            addRoom();
            break;
            
        case 'updateRoom':
		    updateRoom();
		    break;

        case 'addGuest':
            viewAddGuest();
            break;
            
        case 'rooms':
            roomList2();
            break;

        case 'editProfile':
        	editProfile();
        	break;

        case 'profileEdited':
        	profileEdited();
        	break;
		    
	    case 'catalogueUnlog':
		    catalogueUnlog();
		    break;

        case 'consumption':
            consumption();
            break;

        case 'lightSensors':
            lightSensors();
            break;

        case 'presenceSensors':
            presenceSensors();
            break;

        case 'temperatureSensors':
            temperatureSensors();
            break;
	
	    case 'deconnexion':
		    deconnexion();
            break;
            
        case 'addHouse':
            addHouse();
            break;
		    
	    case 'urgence':
            urgence();
            break;  

        case 'contactUrgence':
            contactUrgence();
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
		    
	case 'consumption':
            consumption();
            break;

            
      default:
        notFound();
        break;

    }
} else {
    welcome();
}
