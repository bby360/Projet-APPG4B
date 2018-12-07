<?php
session_start();

require "dbconnexion.php";

function getRooms(){
	$db = dbConnect();

}
$notification="Vous avez oublier de remplir un champs";


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


function inscription(){

    

        if ($_POST['password']!= $_POST['confirm_password']){

            echo 'mots de passe différents!';

            header('location:../views/inscription.php');

        }

        

        else{


            echo $_POST['lastName'];

            $_SESSION['lastName']=$_POST['lastName'];
            $_SESSION['firstName']=$_POST['firstName'];
            $_SESSION['email']=$_POST['email'];
            $_SESSION['phone']=$_POST['phone'];
            $_SESSION['password']=$_POST['password'];

            header('location:../views/inscription2.php');

        }

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

          echo $_SESSION['phone'];




           header('location:../views/home.php');



       }



}
?>
