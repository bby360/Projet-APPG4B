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

function inscription()
{
    if (isset($_POST['lastName']) and isset($_POST['firstName']) and isset($_POST['email']) 
    and isset($_POST['password']) and isset($_POST['phone']) and isset($_POST['adress'])) {

        if (!empty($_POST['lastName']) and !empty($_POST['firstName']) and 
        !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['phone']) and 
        !empty($_POST['adress'])) {

            $lastName=$_POST['lastName'];
            $firstName=$_POST['firstName'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $phone=$_POST['phone'];
            $adress=$_POST['adress'];

            mysql_select_db("Domisep");
            $requete= "INSERT INTO Client VALUES('','$lastName','$firstName','$email','$password','$phone','$adress')";
        }
    }
    else { 
        $notification;
        include('index.php?action=inscription');

    }
}
function connexion()
{
    if ( !empty($_POST['email']) and isset($_POST['password']) )
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        mysql_select_db('Domisep');
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
function Update(){
$req = $db -> prepare('UPDATE rooms JOIN house ON rooms.idHouse=house.idHouse SET mode= :nvmode WHERE house.idClient="1" AND nom="salon"'); 
	$req -> execute(array(
		'nvmode'=>$_POST['mode']));
	$req->closeCursor();
	if($_POST['mode']=='automatique'){
		$req = $db -> prepare('UPDATE rooms JOIN house ON rooms.idHouse=house.idHouse SET lumiereAuto=:nvlumiereAuto, ouvertureVolets=:nvouvertureVolets, fermetureVolets=:nvfermetureVolets, temperature=:nvtemperature, ventilateur=:nvventilateur WHERE house.idClient="1" AND nom="salon"');
		$req -> execute(array(
			'nvlumiereAuto'=>$_POST['lumiere_auto'],
			'nvouvertureVolets'=>$_POST['ouverture_volets'],
			'nvfermetureVolets'=>$_POST['fermeture_volets'],
			'nvtemperature'=>$_POST['temperature'],			
			));
	}
	else{
		$req = $db -> prepare('UPDATE rooms JOIN house ON rooms.idHouse=house.idHouse
						SET lumiereManu=:nvlumiereManu, voletsManu=:nvvoletsManu, temperature=:nvtemperature, ventilateur=:nvventilateur
						WHERE house.idClient="1" AND nom="salon"');
		$req -> execute(array(
			'nvlumiereManu'=>$_POST['lumiere_manuel'],
			'nvvoletsManu'=>$_POST['volets_manuel'],
			'nvtemperature'=>$_POST['temperature'],
			
		));
	}
}
?>
