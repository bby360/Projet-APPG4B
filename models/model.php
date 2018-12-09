<?php

require "models/dbconnexion.php";

function signingup(): bool
{
    $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $db=dbConnect();
    $req = $db->prepare("INSERT INTO client(lastName, firstName, email, phone, adress, mdp, postalcode, emergency) 
    VALUES(:lastName, :firstName, :email, :phone, :adress, :mdp, :postalcode, :emergency)");
 
    $req->execute([
    'lastName'=> $_POST['lastName'],
    'firstName' => $_POST['firstName'],
    'email'=> $_POST['email'],
    'phone'=> $_POST['phone'],
    'adress'=> $_POST['adress'],
    'mdp'=> $pass_hache,
    'postalcode'=> $_POST['postalcode'],
    'emergency' => $_POST['emergency']
    ]);
 
    return true;
}

function signingin($email, $mdp)
{   
    $db=dbConnect();
    $req = $db->prepare('SELECT * FROM client WHERE email = :email');
    $req->execute(['email' => $email]);
    $client = $req->fetch();

    if (password_verify($_POST['mdp'], $client['mdp'])) {
        session_start();
        $_SESSION['lastName'] = $client['lastName'];
        $_SESSION['firstName'] = $client['nom'];
        $_SESSION['email'] = $client['email'];
        $_SESSION['adress'] = $client['adress'];
        $_SESSION['phone'] = $client['phone'];
        $_SESSION['postalcode']=$client['postalcode'];
    } else {
		$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }
}

function getRoomList(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM room");
    return $req;
}

function insertRoom() {
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO room(idHouse,roomName,surface,mode,tempAuto,tempManu,lumAuto,lumManu,blindOpenTime,blindCloseTime,voletsManu) 
VALUES(:idHouse,:roomName,:surface,:mode,:tempAuto,:tempManu,:lumAuto,:lumManu,:blindOpenTime,:blindCloseTime,:voletsManu)");
    $req->execute([
        'idHouse'=> $_POST['idHouse'],
        'roomName' => $_POST['name'],
        'surface'=> $_POST['area'],
        'mode'=> $_POST['Mode'],
        'tempAuto'=> $_POST['tempAuto'],
        'tempManu'=> $_POST['tempManu'],
        'lumAuto'=> $_POST['lumAuto'],
        'lumManu'=> $_POST['lumManu'],
        'blindOpenTime'=> $_POST['blindOpenTime'],
        'blindCloseTime' => $_POST['blindCloseTime'],
        'voletsManu' => $_POST['voletsManu']
    ]);
}

function updateMode($mode,$client,$nom) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE room JOIN house ON room.idHouse=house.idHouse SET mode= :nvmode WHERE house.idClient= :idClient AND roomName= :nvnom');

    $req->bindParam("nvmode", $mode);
    $req->bindParam("idClient", $client);
    $req->bindParam("nvnom", $nom);
    $req->execute();
    $req->closeCursor();
}

function updateAuto($a, $b, $c, $d, $e, $f){
    $db = dbConnect();
    $req = $db->prepare('UPDATE room JOIN house ON room.idHouse=house.idHouse
						SET lumAuto=:nvLumiereAuto, blindOpenTime=:nvOuvertureVolets, blindCloseTime=:nvFermetureVolets, tempAuto=:nvTemperature WHERE house.idClient= :idClient AND roomName= :nvNom');
    $req->bindParam("idClient", $a);
    $req->bindParam("nvNom", $b);
    $req->bindParam("nvLumiereAuto", $c);
    $req->bindParam("nvOuvertureVolets", $d);
    $req->bindParam("nvFermetureVolets", $e);
    $req->bindParam("nvTemperature", $f);
    $req->execute();
    $req->closeCursor();
}

function updateManu($a, $b, $c, $d, $e){
    $db = dbConnect();
    $req = $db->prepare('UPDATE room JOIN house ON room.idHouse=house.idHouse
						SET lumManu=:nvLumiereManu, voletsManu=:nvVoletsManu, tempManu=:nvTemperature
						 WHERE house.idClient= :idClient AND roomName= :nvNom');
    $req->bindParam("idClient", $a);
    $req->bindParam("nvNom", $b);
    $req->bindParam("nvLumiereManu", $c);
    $req->bindParam("nvVoletsManu", $d);
    $req->bindParam("nvTemperature", $e);
    $req->execute();
    $req->closeCursor();
}
