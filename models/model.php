<?php

require "models/dbconnexion.php";

function getRooms(){
	$db = dbConnect();

}

function connection()
{
    if (isset($_POST['pseudo']) && !empty($_POST["Nom d'utilisateur"])
        && !empty($_POST['password'])) {

        if ($_POST['pseudo'] == 'test' &&
            $_POST['password'] == '1234') {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = 'test';

            echo 'Bon pseudo et mot de passe';
        } else {
            $msg = 'Mauvais pseudo ou mot de passe';
        }
    }
}
