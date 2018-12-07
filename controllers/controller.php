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

function inscription(){
if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email']) 
    && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['adress']) && isset($_POST['confirm_password'])) {

        if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && 
        !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']) && 
        !empty($_POST['adress']) && $_POST['password']=$_POST['confirm_password']) {
                $alerte = "Veuillez remplir tous les champs correctement.";
            } else if (!isAPassword($_POST['password'])) {
                $alerte = "Veuillez entrer un format de mot de passe valide avec au moins 8 caractères, une lettre, un chiffre et un caractère spécial.";
            } else if (!existingEmail($_POST['email'])) {
                inscrire();
                header('Location: index.php?action=inscrire');
                exit();
            } else {
                $alerte = "Un compte existe déjà avec cet email!";
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

