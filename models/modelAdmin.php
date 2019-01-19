<?php
require "models/dbconnexion.php";

function signingup(): bool
{   if(!isset($_SESSION))
{
    session_start();
}

    $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $db=dbConnect();
    $req = $db->prepare("INSERT INTO admin(lastName, firstName, email, mdp) VALUES(:lastName, :firstName, :email, :mdp)");

    $req->execute([
        'lastName'=> $_POST['lastName'],
        'firstName' => $_POST['firstName'],
        'email'=> $_POST['email'],
        'mdp'=> $pass_hache
    ]);

    return true;
}

function getSensorsList(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM catalogue ORDER BY (typeProduct)");
    return $req;
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

function deletedSensors($idProduit){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM catalogue WHERE idProduit=:idProduct");
    $req->bindParam("idProduct",$idProduit);
    $req->execute();
    return $req;
}

function insertSensors(){
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO catalogue(typeProduct,consumption,price) VALUES(:typeProduct,:consumption,:price)");
    $req->execute([
        'typeProduct'=> $_POST['typeProduct'],
        'consumption' => $_POST['consumption'],
        'price'=> $_POST['price'],
    ]);
    header("location: indexAdmin.php?action=catalogueAdmin");
}

function getSensorsGestionList(){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM alerte");
    $req->execute();
    return $req;
}

function getClientId($idRoom){
    $db =dbConnect();
    $req = $db->prepare("SELECT * FROM house JOIN room ON house.idHouse=room.idHouse  WHERE room.idRoom= :idRoom ");
    $req->bindParam("idRoom", $idRoom);
    $req->execute();
    return $req;
}

function supAlerte($idAlerte){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM alerte WHERE idAlert = :idAlerte");
    $req->bindParam("idAlerte", $idAlerte);
    $req->execute();
    $req->closeCursor();
}


function insertQuestionReponse($question,$reponse) {

    $db = dbConnect();
    $req = $db->prepare("INSERT INTO faq VALUES('',:question, :reponse)");
    $req->bindParam("question", $question);
    $req->bindParam("reponse", $reponse);
    $req->execute();
    
}

function getQuestionList(){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM faq ");
	$req->execute();
    return $req;
}

function getTopicList(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM forumtopic ");
    return $req;
}

function getMessage($id){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM forummessage WHERE idTopic= :id ");
    $req->bindParam("id", $id);
    $req->execute();
    return $req;
}

function insertMessage($idTopic,$pseudo,$message){
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO forummessage VALUES ('', :idTopic, :pseudo, :message, now())");
    $req->bindParam("idTopic", $idTopic);
    $req->bindParam("pseudo", $pseudo);
    $req->bindParam("message", $message);
    $req->execute();
    $req->closeCursor();
}

function insertTopic($subject){
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO forumtopic VALUES ('', :name, now())");
    $req->bindParam("name", $subject);
    $req->execute();
    $req->closeCursor();
}

function getIdTopic($sujet){
    $db = dbConnect();
    $req2 = $db->prepare("SELECT * FROM forumtopic WHERE name= :sujet ");
    $req2->bindParam("sujet", $sujet);
    $req2->execute();
    return $req2;
}

function suppMessage($idMessage){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM forummessage WHERE idMessage = :idMessage");
    $req->bindParam("idMessage", $idMessage);
    $req->execute();
    $req->closeCursor();
}

function suppTopic($idTopic){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM forumtopic WHERE idTopic = :idTopic");
    $req->bindParam("idTopic", $idTopic);
    $req2 = $db->prepare("DELETE FROM forummessage WHERE idTopic = :idTopic");
    $req2->bindParam("idTopic", $idTopic);
    $req2->execute();
    $req->execute();
    $req2->closeCursor();
    $req->closeCursor();
}
