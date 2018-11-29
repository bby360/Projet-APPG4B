<?php

function Update(){
$db -> exec('UPDATE Room INNER JOIN House ON "Room.idHouse"="House.idHouse" 
			SET mode=$_POST["mode"] WHERE "House.idClient"=$_SESSION["id"] AND "Room.nom"=$_GET["piece"]') //GET le nom de la piece

if($_POST['mode']=='automatique'){
	$db -> exec('UPDATE Room INNER JOIN House ON "Room.idHouse"="House.idHouse" 
					SET lumiereManu=$_POST["lumiere_manuel"], ouvertureVolets=$_POST["ouverture_volets"], 
					fermetureVolets=$_POST["fermeture_volets"], temperature=$_POST["temperature"]
					WHERE "House.idClient"=$_SESSION["id"] AND "Room.nom"=$_GET["piece"]')
}
else{
	$db -> exec('UPDATE Room INNER JOIN House ON "Room.idHouse"="House.idHouse" 
					SET lumiereAuto=$_POST["lumiere_auto"], ouvertureVolets=$_POST["ouverture_volets"], 
					fermetureVolets=$_POST["fermeture_volets"], temperature=$_POST["temperature"]
					WHERE "House.idClient"=$_SESSION["id"] AND "Room.nom"=$_GET["piece"]')
}

?>

