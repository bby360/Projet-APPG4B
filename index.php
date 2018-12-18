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
            
        case 'rooms':
            rooms();
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
		    
	    case 'deconnexion':
		    deconnexion();
            break;
            
        case 'addHouse':
            addHouse();
            break;
            
      default:
        notFound();
        break;

    }
} else {
    welcome();
}
