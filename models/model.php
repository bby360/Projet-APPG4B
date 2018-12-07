<?php

require "models/dbconnexion.php";

function getRooms(){
	$db = dbConnect();
	$req = $db->query("SELECT * FROM rooms");
    	return $req;
}
$notification="Vous avez oublier de remplir un champs";

function getRoom($id_room){
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM rooms WHERE id = :id_room");
    $req->bindParam("id_room", $id_room);
}




function insertRoom($a, $b) {
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO rooms(name,area) VALUES(:sql_var_a, :area)");
    $req->bindParam("sql_var_a", $a);
    $req->bindParam("area", $b);
    $req->execute();
    $req->closeCursor();

	
}

function adduser()
{
	    $db = dbConnect();
            $requete= "INSERT INTO Client VALUES('','$lastName','$firstName','$email','$password','$phone','$adress')";
}

function connexion()
{
    if ( !empty($_POST['email']) and isset($_POST['password']) )
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

	$db = dbConnect();
        $requete=$db->prepare('SELECT * FROM Client WHERE email= ? and mdp=?');
        $req ->execute(array($email,$password));

        while ($ligne=$requete->fetch()) {

            if ($ligne['email']==$email and $ligne['password']==$password){

                session_start();

                $_SESSION['email']=$ligne['email'];
                $_SESSION['password']=$ligne['password'];

                echo "Vous vous êtes bien conenctés";         
            }

        else{ 
            echo "Vous avez fait une erreur lors de la saisie du email/password, recommencez";

            include('index.php?action=connexion');
        }
        }
        
    }
    else {
        $notification;
        include('index.php?action=connexion');
     }
    }

function inscription2{

    if (isset($_POST['Adresse']) and isset($_POST['CP']){

        $_SESSION['adress']=$_POST['Adresse'];

        $_SESSION['postalcode']=$_POST["CP"];


        $db = dbConnect();
        $req = $db-> prepare("INSERT INTO Client VALUES ('',:nom,:prenom,:email,:phone,:adress,:password,:postalcode)");
        $req -> execute(array(
            'nom' => $_SESSION['lastName'],
            'prenom' => $_SESSION['firstName'],
            'email' => $_SESSION['email'],
            'phone' => $_SESSION['phone'],
            'adress' => $_SESSION['adress'],
            'password' => $_SESSION['password'],
            'postalcode' => $_SESSION['postalcode'],

        ));
    }

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
?>
