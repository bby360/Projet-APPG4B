<?php

function dbConnect(){
	try{
		$db = new PDO('mysql:host=localhost;dbname=fakeprojet;charset=utf8','root','');
		return $db;
	}
	
	catch(Exception $e){
		die('erreur : '.$e->getMessage());
	}
}
