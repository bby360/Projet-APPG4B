<?php

function dbConnect(){
	try{
		$db = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8','root','root');
		return $db;
	}
	
	catch(Exception $e){
		die('erreur : '.$e->getMessage());
	}
}
