<?php

require "models/dbconnexion.php";

function getRooms(){
	$db = dbConnect();

}
$notification="Vous avez oublié de remplir un champ";

function inscriptionx()
{
    if (isset($_POST['lastName']) and isset($_POST['firstName']) and isset($_POST['login']) and isset($_POST['email']) 
    and isset($_POST['password']) and isset($_POST['phone']) and isset($_POST['adress'])) {

        if (!empty($_POST['lastName']) and !empty($_POST['firstName']) and !empty($_POST['login']) and 
        !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['phone']) and 
        !empty($_POST['adress'])) {

            $lastName=$_POST['lastName'];
            $firstName=$_POST['firstName'];
            $login=$_POST['login'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $phone=$_POST['phone'];
            $adress=$_POST['adress'];

            mysql_select_db("Domisep");
            $requete= "INSERT INTO Client VALUES('','$lastName','firstName','login';'email','password','phone','adress')";
        }
    }
    else { 
        $notification;
        include('index.php?action=inscription');

    }
}
function connexionx()
{
    if ( !empty($_POST['login']) and isset($_POST['password']) )
    {
        $login=$_POST['login'];
        $password=$_POST['password'];

        mysql_select_db('Domisep');
        $requete=$db->prepare('SELECT * FROM Client WHERE login= ? and mdp=?');
        $req ->execute(array($login,$password));

        while ($ligne=$requete->fetch()) {

            if ($ligne['login']==$login and $ligne['password']==$password){

                session_start();

                $_SESSION['login']=$ligne['login'];
                $_SESSION['password']=$ligne['password'];

                echo "Vous vous êtes bien conencté";
            }

        else{ 
            echo "Vous avez fait une erreur lors de la saisie du login/password, recommencez";

            include('index.php?action=connexion');
        }
        }
        
    }
    else {
        $notification;
        include('index.php?action=connexion');
     }
    }

function inscription2(){
    $db = dbConnect();
    $req = $db->prepare("INSERT INTO Client(adress,postalcode) VALUES (?,?)");
    $req ->execute(array($_POST['Adresse'],$_POST['CP']));

}


?>