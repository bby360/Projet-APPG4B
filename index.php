<?php
require "controllers/controller.php";
if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);
    switch ($action) {
            
        case 'connexion':
          seconnecter();
          break;
            
        case 'catalogue':
            catalogue();
            break;            
      
      default:
        welcome();
        break;

    }
} else {
    welcome();
}
