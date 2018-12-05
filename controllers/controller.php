<?php

$notification="Vous avez oublié de remplir un champ";

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
    require "views/home.php";
}

function seeRoom(){
    $rooms = getRoom()->fetchAll();

    require "views/seeRoom.php";
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
if (isset($_POST['lastName']) and isset($_POST['firstName']) and isset($_POST['email']) 
    and isset($_POST['password']) and isset($_POST['phone']) and isset($_POST['adress'])) {
        if (!empty($_POST['lastName']) and !empty($_POST['firstName']) and 
        !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['phone']) and 
        !empty($_POST['adress'])) {
            $lastName=$_POST['lastName'];
            $firstName=$_POST['firstName'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $phone=$_POST['phone'];
            $adress=$_POST['adress'];
            
            $adduser=adduser();
        }
    }
else { 
        $notification;
        include('index.php?action=inscription');
    }
}

}

function inscription2(){
    require "views/inscription2.php";
}

function addRoom(){
    $name = htmlspecialchars($_POST["name"]);
    $area = htmlspecialchars($_POST["area"]);

    insertRoom($name, $area);
    $rooms = getRooms()->fetchAll();
    require "views/rooms.php";
}

function catalogue(){
    require"views/catalogue.php";
}

function seeError(){
    require "views/error.php";
}

>
