<?php 
session_start();

$req = $bdd -> prepare('SELECT * FROM client WHERE email=?');    /*on recupere l'id du l'utilisateur pour le mettre dans SESSION[id]*/
$req -> execute(array($_POST['email']));
while($data = $req->fetch()){
  $_Session['id']=$data['idClient'];
  $_Session['lastName']=$data['lastName'];
  $_Session['firstName']=$data['firstName'];
  $_Session['email']=$data['email'];
  $_Session['phone']=$data['phone'];
}
 ?>