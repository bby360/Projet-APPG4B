<?php
require "models/modelAdmin.php";

function notFound() {
    require "views/notFound.php";
}

function signupAdmin(){

    if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email'])
        && isset($_POST['mdp'])){

        if (empty($_POST['lastName']) || empty($_POST['firstName']) ||
            empty($_POST['email']) || empty($_POST['mdp']) || $_POST['mdp'] != $_POST['confirm_mdp']) {

            $alerte = "Veuillez remplir tous les champs correctement.";
            echo "Veuillez remplir tous les champs correctement.";
        } else {
            signingup();
            header('Location: indexAdmin.php?action=dashboardAdmin');

            exit();

        }
    }

    require "views/signupAdmin.php";
}

function signinAdmin(){


        if (!empty($_POST['email']) && !empty($_POST['mdp'])) {

            $db = dbConnect();
            $req = $db->prepare('SELECT * FROM admin WHERE (email = :email)');
            $req->execute(['email' => $_POST['email']]);
            $admin = $req->fetch(PDO::FETCH_OBJ);
    
            if($admin) {

            if(password_verify($_POST['mdp'], $admin->mdp)) {
                session_start();

                $_SESSION['email'] = $admin->email;

                echo 'Vous êtes maintenant connecté';


                header('Location: indexAdmin.php?action=dashboardAdmin');
                exit();
            }
        else {
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
            echo 'Vous avez tapé le mauvais mdp';
        }
    }
    else {
        echo "Identifiant ou mot de passe incorrecte";
    }
    }
    require 'views/signinAdmin.php';
}


function dashboardAdmin(){
    require"views/dashboardAdmin.php";
}

function clients(){
    require "views/clients.php";
}

function catalogue(){
    $sensors = getSensorsList()->fetchAll();
    require"views/catalogueAdmin.php";
}

function addSensors(){
    require"views/addSensors.php";
}

function welcome(){
    require "views/welcome.php";
}

function lightSensorsUnlog(){
    $sensors = getLightSensors()->fetchAll();
    require "views/lightSensorsUnlog.php";
}

function presenceSensorsUnlog(){
    $sensors = getPresenceSensors()->fetchAll();
    require "views/presenceSensorsUnlog.php";
}

function temperatureSensorsUnlog(){
    $sensors = getTemperatureSensors()->fetchAll();
    require "views/temperatureSensorsUnlog.php";
}

function sensorsGestion(){
    //$client = getClientId()->fetchAll();
    $sensorsG = getSensorsGestionList()->fetchAll();
    require"views/sensorsGestion.php";
}

function deleteSensors(){
    $delete = deletedSensors();
    require "views/catalogueAdmin.php";
}

function addedSensors(){

    if (isset($_POST['typeProduct']) && isset($_POST['consumption']) && isset($_POST['price'])) {
        insertSensors();
        exit();
    }

    require "views/catalogueAdmin.php";

}


function addQuestionReponse(){
    $question=$_POST['question'];
    $reponse=$_POST['reponse'];

    if (!(empty($_POST['question'])) && !(empty($_POST['reponse']))) {
    insertQuestionReponse($question,$reponse);
    }
    require "views/faqAdmin.php";
}

function seeQuestion()
 {
    $questions=getQuestionList()->fetchAll();

    require "views/faq.php";
 }

function seeForum()
 {
    $topics =getTopicList()->fetchAll();

    require "views/forumAdmin.php";
 }

function seeMessageForum()
{
    $id= $_GET["idTopic"];
    $messages =getMessage($id)->fetchAll();
    require "views/forumMessageAdmin.php";
}

function addMessage(){

        $pseudo="Balavoine";
        $message=$_POST["message"];
        $idTopic=$_GET["idTopic"];
        insertMessage($idTopic,$pseudo,$message);
        seeMessageForum();

}

function addTopic(){
        $subject=$_POST["subject"];
        $pseudo="Balavoine";
        $message=$_POST["message"];
        insertTopic($subject);
        addMessageTopic($subject,$pseudo,$message);
        seeForum();
}

function addMessageTopic($subject,$pseudo,$message){
    $ids =getIdTopic($subject) -> fetchAll();
    foreach($ids as $id) {
        $idTopic=$id['idTopic'];
    }
    insertMessage($idTopic,$pseudo,$message);
}

function supMessage(){
    $idMessage=$_POST['select'];
    suppMessage($idMessage);
    seeForum();
}

function supTopic(){
    $idTopic=$_POST['select'];
    suppTopic($idTopic);
    seeForum();
}

function deconnexion(){
    require "views/welcome.php";
}
