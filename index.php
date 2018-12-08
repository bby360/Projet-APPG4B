<?php
require "controllers/controller.php";
if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);
    switch ($action) {
            
        case 'signin':
          signingin();
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
            
      default:
        welcome();
        break;

    }
} else {
    welcome();
}
