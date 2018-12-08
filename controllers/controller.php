<?php

$notification="Vous avez oublié de remplir un champ";
$alerte=false;
require "models/model.php";

function temporary(){
    require "views/temporary_guest.php";
}

function pageNonConnecter(){
    require "views/pageNonConnecter";
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

function seconnecter() {

    $_SESSION=array();

    if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['mdp'])) {
        echo "blabla1";

                connexion($email, $mdp);

                header('Location: index.php?action=connexion');
        }
        require "views/connexion.php";

}

function deconnexion(){
    require "views/deconnexion.php";
}

function edit_profile(){
    require "views/editProfile.php";
}

function inscription(){

    if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email']) 
    && isset($_POST['mdp']) && isset($_POST['phone']) && isset($_POST['adress']) && isset($_POST['confirm_mdp'])) {

        if (empty($_POST['lastName']) || empty($_POST['firstName'])  || 
        empty($_POST['email'])  || empty($_POST['mdp'])  ||  empty($_POST['phone']) && 
        empty($_POST['adress'])  || $_POST['mdp']!=$_POST['confirm_mdp']) {
 
                $alerte = "Veuillez remplir tous les champs correctement.";
                echo "Veuillez remplir tous les champs";
            }   else {                
                inscrire();                
                header('Location: index.php?action=seehome');

                exit();
            }
        }

        require "views/inscription.php";
}

function inscription2(){
    inscription2_();
}

function addRoom(){
    $name = htmlspecialchars($_POST["name"]);
    $area = htmlspecialchars($_POST["area"]);
    insertRoom($name, $area);
    $rooms = getRoom()->fetchAll();
    require "views/addRoom.php";
}

function catalogue(){
    require "views/catalogue.php";
}

function updateRoom(){
    $idClient="1" /*$_SESSION[idClient]*/ ;
    $nom ="Salon" /*$_Get[nom]*/ ;
    $nvMode=$_POST['mode'];
    $nvLumiereAuto=$_POST['lumiere_auto'];
    $nvOuvertureVolets=$_POST['ouverture_volets'];
    $nvFermetureVolets=$_POST['fermeture_volets'];
    $nvLumiereManu=$_POST['lumiere_manuel'];
    $nvVoletsManu=$_POST['volets_manuel'];
    $nvTemperature=$_POST['temperature'];
    updateMode($nvMode, $idClient, $nom);
    if($nvMode =='Auto'){
        updateAuto($idClient, $nom, $nvLumiereAuto, $nvOuvertureVolets, $nvFermetureVolets, $nvTemperature);
    }
    else{
        updateManu($idClient, $nom, $nvLumiereManu, $nvVoletsManu, $nvTemperature);
    }
}

