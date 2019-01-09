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
            
        case 'catalogue':
            catalogue();
            break;

        default:
            notFound();
            break;

    }
} else {
    signin();
}
