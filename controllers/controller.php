<?php

require "models/model.php";

function temporary(){
    require "views/temporary_guest.php";
}

function rooms(){
    require "views/rooms.php";
}
function seeError(){
    require "views/home.php";
}

function seeHome(){
    require "views/seeHome.php";
}

function seeRooms(){
    $rooms = getRooms()->fetchAll();

    require "views/rooms.php";
}

function connexion(){
    require "views/connexion.php";
}

function deconnexion(){
    require "views/deconnexion.php";
}

function edit_profile(){
    require "views/editProfile.php";
}

function footer(){
    require "views/footer.php";
}

function header(){
    require "views/header.php";
}

function inscription(){
    require "views/inscription.php";
}

function inscription2(){
    require "views/inscription2.php";
}

>
