<?php
require "controllers/controllerAdmin.php";
if(isset($_GET["action"])){
    $action = htmlspecialchars($_GET["action"]);
    switch ($action) {

        case 'signin':
            signin();
            break;


        default:
            notFound();
            break;

    }
} else {
    signin();
}
