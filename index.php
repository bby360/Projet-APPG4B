<?php
require "controllers/controller.php";
if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);
    switch ($action) {
      
      
      default:
        welcome();
        break;

    }
} else {
    welcome();
}
