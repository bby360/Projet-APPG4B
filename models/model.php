<?php

require "models/dbconnexion.php";

function signingup(): bool
{
    $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $db=dbConnect();
    $req = $db->prepare("INSERT INTO client(lastName, firstName, email, phone, adress, mdp, postalcode, emergency,pays) 
    VALUES(:lastName, :firstName, :email, :phone, :adress, :mdp, :postalcode, :, emergency:pays)");
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

    $req2= $db->prepare("INSERT INTO house(adress) VALUES (:adress)");
    $req2->execute(['adress'=> $_POST['adress']]);
 
    return true;
}



function isAmdp($str): bool
{   
    if (empty($str) ||
        strlen($str) < 8 ||
        !preg_match("#[0-9]+#", $str) ||
        !preg_match("#[a-zA-Z]+#", $str) ||
        !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $str)
    ) {
        return false;
    } else {
        return is_string($str);
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
