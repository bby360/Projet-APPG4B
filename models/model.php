<?php
require "models/dbconnexion.php";

function signingup(): bool
{   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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

function existingEmail() {
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $db= dbConnect();
    $req = $db->prepare('SELECT * FROM client WHERE (email = :email)');
    $req->execute(['email' => $_POST['email']]);
    $exist = $req->fetch(PDO::FETCH_OBJ);
}

function getRoomList(){
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $db = dbConnect();
    $idHouse = $_SESSION['idHouse'];
    $req = $db->prepare("SELECT * FROM room  WHERE idHouse = :idHouse");
    $req->bindParam("idHouse", $idHouse);
    $req->execute();
    return $req;
}

function getInfoRoom($name, $idHouse){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM room WHERE roomName= :name AND idHouse= :house");
    $req->bindParam("name", $name);
    $req->bindParam("house", $idHouse);
    $req->execute();
    return $req;
}

function getTopicList(){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM forumtopic ");
	$req->execute();
    return $req;
}

function getMessage($id){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM forummessage WHERE idTopic= :id ");
    $req->bindParam("id", $id);
    $req->execute();
    return $req;
}

function insertRoom($idHouse, $roomName, $surface) {

    $db = dbConnect();
    $req = $db->prepare("INSERT INTO room(idHouse,roomName,surface, mode) VALUES(:idHouse,:roomName,:surface, 'Manuel')");
    $req->bindParam("idHouse", $idHouse);
    $req->bindParam("roomName", $roomName);
    $req->bindParam("surface", $surface);
    $req ->execute();
    $req ->CloseCursor();
}

function insertHouse() {
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $db=dbConnect();
    $req=$db->prepare("INSERT INTO house(idClient,adress) VALUES(:idClient, :adress)");
    $req2=$db->prepare('SELECT * FROM house JOIN client ON house.idClient=client.idClient');
    $req2->execute();
    $house = $req2->fetch(PDO::FETCH_OBJ);
    $req ->execute([
        'adress'=>$_POST['adress'],
        'idClient'=>$_SESSION['idClient'],
        ]);
    $_SESSION['idHouse'] = $house->idHouse;
    $req ->CloseCursor();

}

function getHouseList($idClient){
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM house WHERE idClient= :idClient");
    $req->bindParam("idClient", $idClient);
    $req->execute();
    return $req;
}

function updateMode($mode,$house,$nom) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE room SET mode= :nvmode WHERE idHouse= :idHouse AND roomName= :nvnom');

    $req->bindParam("nvmode", $mode);
    $req->bindParam("idHouse", $house);
    $req->bindParam("nvnom", $nom);
    $req->execute();
    $req->closeCursor();
}

function updateAuto($a, $b, $c, $d, $e, $f, $g){
    $db = dbConnect();
    $req = $db->prepare('UPDATE room
                            SET lumAuto=:nvLumiereAuto, blindOpenTime=:nvOuvertureVolets, blindCloseTime=:nvFermetureVolets, tempAuto=:nvTemperature, lum=:nvLum WHERE idHouse= :idHouse AND roomName= :nvNom');
    $req->bindParam("idHouse", $a);
    $req->bindParam("nvNom", $b);
    $req->bindParam("nvLumiereAuto", $c);
    $req->bindParam("nvOuvertureVolets", $d);
    $req->bindParam("nvFermetureVolets", $e);
    $req->bindParam("nvTemperature", $f);
    $req->bindParam("nvLum", $g);
    $req->execute();
    $req->closeCursor();
}

function updateManu($a, $b, $c, $d, $e, $f){
    $db = dbConnect();
    $req = $db->prepare('UPDATE room 
						SET lumManu=:nvLumiereManu, voletsManu=:nvVoletsManu, tempManu=:nvTemperature, lum=:nvLum
						 WHERE idHouse= :idHouse AND roomName= :nvNom');
    $req->bindParam("idHouse", $a);
    $req->bindParam("nvNom", $b);
    $req->bindParam("nvLumiereManu", $c);
    $req->bindParam("nvVoletsManu", $d);
    $req->bindParam("nvTemperature", $e);
    $req->bindParam("nvLum", $f);
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

function getConsumptionP(){
    $db = dbConnect();
    $req = $db->query("SELECT SUM(consommation)AS 'CSumP' FROM capteur WHERE type='Présence' ");
    return $req;
}

function getConsumptionT(){
    $db = dbConnect();
    $req = $db->query("SELECT SUM(consommation)AS 'CSumT' FROM capteur WHERE type='Température' ");
    return $req;
}

function getConsumptionL(){
    $db = dbConnect();
    $req = $db->query("SELECT SUM(consommation)AS 'CSumL' FROM capteur WHERE type='Luminosité' ");
    return $req;
}

function getCapteur($house){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM capteur JOIN room ON capteur.idRoom=room.idRoom WHERE room.idHouse= :house ");
    $req->bindParam("house", $house);
    $req->execute();
    return $req;
}

function insertAlerte($idCapteur,$idRoom, $type,$message){
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO alerte Values('',:idCapteur,:idRoom, :nvtype , :message)");
    $req->bindParam("nvtype", $type);
    $req->bindParam("message", $message);
    $req->bindParam("idCapteur", $idCapteur);
    $req->bindParam("idRoom", $idRoom);
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
function updateIDHouse()
{

    session_start();
    $maison = $_POST["maison"];

    if (isset($_POST["selectionner"])) {
        $_SESSION['idHouse'] = $maison;

    }
}

function getRoomName($room){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM room WHERE idRoom= :room ");
    $req->bindParam("room", $room);
    $req->execute();
    return $req;
}
