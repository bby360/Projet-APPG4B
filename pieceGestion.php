<?php

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
			'nvventilateur'=>$_POST['ventilateur']
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
			'nvventilateur'=>$_POST['ventilateur'],
		));

	}
}
?>

