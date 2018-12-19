<?php
require "models/dbconnexion.php";

function signingup(): bool
{   session_start();

    $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $db=dbConnect();
    $req = $db->prepare("INSERT INTO client(lastName, firstName, email, phone, adress, mdp, postalcode, emergency,pays) 
    VALUES(:lastName, :firstName, :email, :phone, :adress, :mdp, :postalcode, :emergency, :pays)");
 
    $req->execute([
    'lastName'=> $_POST['lastName'],
    'firstName' => $_POST['firstName'],
    'email'=> $_POST['email'],
    'phone'=> $_POST['phone'],
    'adress'=> $_POST['adress'],
    'mdp'=> $pass_hache,
    'postalcode'=> $_POST['postalcode'],
    'emergency' => $_POST['emergency'],
    'pays' => $_POST['pays']
    ]);
 
    return true;
}


function getRoomList(){
    session_start();

    $db = dbConnect();
    $idSession = $_SESSION['idClient'];
    $req = $db->query("SELECT * FROM room JOIN house ON house.idHouse = room.idHouse WHERE house.idClient = $idSession");
    return $req;
}

function insertRoom() {
    session_start();
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

function insertHouse() {
    session_start();
    $db=dbConnect();
    $req=$db->prepare("INSERT INTO house VALUES('',:idClient, :adress)");
    $req ->execute([
        'adress'=>$_POST['adress'],
        'idClient'=>"1"//$_SESSION['idClient']
    ]);
    $req ->CloseCursor();

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

function getLightSensors(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM catalogue WHERE typeProduct='Luminosité'");
    return $req;
}

function getPresenceSensors(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM catalogue WHERE typeProduct='Présence'");
    return $req;
}

function getTemperatureSensors(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM catalogue WHERE typeProduct='Temperature'");
    return $req;
}
