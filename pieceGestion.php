<?php
session_start(); 

$db = new PDO('mysql:host=localhost;dbname=testsite;charset=utf8', 'root', '');


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=testsite;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

function Update(){
$db -> exec('UPDATE Room INNER JOIN House ON "Room.idHouse"="House.idHouse" 
			SET mode=$_POST["mode"] WHERE "House.idClient"=$_SESSION["id"] AND "Room.nom"=$_GET[]') //GET le nom de la piece

if($_POST['mode']=='automatique'){
	$db -> exec('UPDATE Room INNER JOIN House ON "Room.idHouse"="House.idHouse" 
					SET lumiereManu=$_POST["lumiere_manuel"], ouvertureVolets=$_POST["ouverture_volets"], 
					fermetureVolets=$_POST["fermeture_volets"], temperature=$_POST["temperature"]
					WHERE "House.idClient"=$_SESSION["id"] AND "Room.nom"=$_GET[]')
}
else{
	$db -> exec('UPDATE Room INNER JOIN House ON "Room.idHouse"="House.idHouse" 
					SET lumiereAuto=$_POST["lumiere_auto"], ouvertureVolets=$_POST["ouverture_volets"], 
					fermetureVolets=$_POST["fermeture_volets"], temperature=$_POST["temperature"]
					WHERE "House.idClient"=$_SESSION["id"] AND "Room.nom"=$_GET[]')
}

?>

