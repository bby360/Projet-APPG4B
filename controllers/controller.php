<?php
require "models/model.php";

function welcome(){
    require "views/welcome.php";
}

function signup(){

    if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email']) 
    && isset($_POST['mdp']) && isset($_POST['phone']) && isset($_POST['adress']) && isset($_POST['confirm_mdp'])) {

        if (empty($_POST['lastName']) || empty($_POST['firstName'])  || 
        empty($_POST['email'])  || empty($_POST['mdp'])  ||  empty($_POST['phone']) && 
        empty($_POST['adress'])  || $_POST['mdp']!=$_POST['confirm_mdp']) {
 
                $alerte = "Veuillez remplir tous les champs correctement.";
                echo "Veuillez remplir tous les champs correctement.";
            }   else {                
                signingup();                
                header('Location: index.php?action=dashboard');

                exit();
            }
        }

        require "views/signup.php";
}

function signin() {

    $_SESSION=array();

    if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['mdp'])) {
                $email=$_POST['email'];
                $mdp=$_POST['mdp'];
                signingin($email, $mdp);

                header('Location: index.php?action=dashboard');
        }
        require "views/signin.php";

}


function catalogue(){
    require"views/catalogue.php";
}

function dashboard(){
    require"views/dashboard.php";
}

function roomList()
{
    $rooms = getRoomList()->fetchAll();

    require "views/roomList.php";
}

function addRoom(){


        if (isset($_POST['name']) && isset($_POST['area']) && isset($_POST['idHouse'])
            && isset($_POST['tempManu']) && isset($_POST['tempAuto']) && isset($_POST['lumAuto'])
            && isset($_POST['lumManu'])&& isset($_POST['blindOpenTime'])&& isset($_POST['blindCloseTime'])) {


                insertRoom();
                header('Location: index.php?action=roomList');

                exit();

        }
  require "views/addRoom.php";
}
