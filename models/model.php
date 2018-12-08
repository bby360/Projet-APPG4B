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


function insertRoom($name, $area) {
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO room(name,area) VALUES(:sql_var_a, :area)");
    $req->bindParam("sql_var_a", $a);
    $req->bindParam("area", $b);
    $req->execute();
    $req->closeCursor();
}




function inscription2_(){
    $_SESSION['adress']=$_POST['Adresse'];
    $_SESSION['postalcode']=$_POST["CP"];
   if (isset($_POST['Adresse']) and isset($_POST['CP'])) {
       $db = dbConnect();
       
       $req = $db->prepare('INSERT INTO Client (lastName,firstName,email,phone,adress,password,postalcode) VALUES(:nom,:prenom,:email,:phone,:adress,:password,:postalcode)');
       $req->execute(array(
           'nom'=>$_SESSION['lastName'],
           'prenom'=>$_SESSION['firstName'],
           'email'=>$_SESSION['email'],
           'phone'=>$_SESSION['phone'],
           'adress'=>$_SESSION['adress'],
           'password'=>$_SESSION['password'],
           'postalcode'=>$_SESSION['postalcode'],
       ));
       header('location:../views/home.php');
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

$notification="Vous avez oublié de remplir un champ";

function inscrire(): bool
{
    $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $db=dbConnect();
    $req = $db->prepare("INSERT INTO client(lastName, firstName, email, phone, adress, mdp) 
    VALUES(:lastName, :firstName, :email, :phone, :adress, :mdp)");
 
    $req->execute([
    'lastName'=> $_POST['lastName'],
    'firstName' => $_POST['firstName'],
    'email'=> $_POST['email'],
    'phone'=> $_POST['phone'],
    'adress'=> $_POST['adress'],
    'mdp'=> $pass_hache
    ]);
 
    return true;
}

/*
*Vérifie si un email existe
*/

function existingEmail($email): bool
{   
    $db=dbConnect();
    $req = $db->prepare('SELECT EXISTS(SELECT * FROM client WHERE email = ?)');
    $req->execute(array($email));
    return true;
}

/**
 * Vérifie le format d'un mot de passe
 * @param $str
 * @return bool
 */
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


function connexion($email, $mdp)
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
        exit();
    } else {
		$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }
}

?>
