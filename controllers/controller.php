<?php
require "models/model.php";

function welcome(){
    require "views/welcome.php";
}

function inscrire(){
    require "views/inscription.php";
}

function inscription(){

    if ($_POST['password']!= $_POST['confirm_password']){
        echo 'mots de passe différents!';
        header('location:views/inscription.php');
    }

    else{
        echo $_POST['lastName'];
        $_SESSION['lastName']=$_POST['lastName'];
        $_SESSION['firstName']=$_POST['firstName'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['phone']=$_POST['phone'];
        $_SESSION['password']=$_POST['password'];
        header('location:views/inscription2.php');
    }
}
