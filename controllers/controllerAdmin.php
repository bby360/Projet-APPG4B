<?php
require "models/modelAdmin.php";

function notFound() {
    require "views/notFound.php";
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
    $clients[] = Array();
    $idCapteurs[] = Array();
    $typeAlertes[] = Array();
    $idAlertes[] = Array();
    $idProducts[] = Array();
    $messages[] = Array();
    $sensorsGs = getSensorsGestionList()->fetchAll();
    foreach ($sensorsGs as $sensorsG) {
        $idCapteurs[] = $sensorsG['idCapteur'];
        $typeAlertes[] = $sensorsG['typeAlerte'];
        $messages[] = $sensorsG['message'];
        $idAlertes[] = $sensorsG['idAlert'];

        $idRoom=$sensorsG['idRoom'];
        $typeProduit= getIdProduct($sensorsG['idCapteur']) -> fetchAll();
        foreach ($typeProduit as $t) {
            $idProducts[] = $t['idProduit'];
        }
        $client = getClientId($idRoom)->fetchAll();
        foreach ($client as $c) {
        $clients[] = $c['idClient'];
        }

    }
   
    require"views/sensorsGestion.php";
}

function deleteAlerte()
{
    $idAlerte = $_POST['delete'];
    supAlerte($idAlerte);
    sensorsGestion();
}
    function deleteSensors()
    {
        $idSensor = $_POST['delete'];
        deletedSensors($idSensor);
        catalogue();
    }

    function addedSensors()
    {

        if (isset($_POST['typeProduct']) && isset($_POST['consumption']) && isset($_POST['price'])) {
            insertSensors();
            exit();
        }

        require "views/catalogueAdmin.php";

    }


    function addQuestionReponse()
    {
        if (isset($_POST['question']) && isset($_POST['reponse'])) {
        $question = $_POST['question'];
        $reponse = $_POST['reponse'];

        if (!(empty($_POST['question'])) && !(empty($_POST['reponse']))) {
            insertQuestionReponse($question, $reponse);
        }
    }
        require "views/faqAdmin.php";
    
}

    function seeQuestion()
    {
        $questions = getQuestionList()->fetchAll();

        require "views/faq.php";
    }

    function seeForum()
    {
        $topics = getTopicList()->fetchAll();

        require "views/forumAdmin.php";
    }

    function seeMessageForum()
    {
        $id = $_GET["idTopic"];
        $messages = getMessage($id)->fetchAll();
        require "views/forumMessageAdmin.php";
    }

    function addMessage()
    {

        $pseudo = "Admin";
        $message = $_POST["message"];
        $idTopic = $_GET["idTopic"];
        insertMessage($idTopic, $pseudo, $message);
        seeMessageForum();

    }

    function addTopic()
    {
        $subject = $_POST["subject"];
        $pseudo = "Admin";
        $message = $_POST["message"];
        insertTopic($subject);
        addMessageTopic($subject, $pseudo, $message);
        seeForum();
    }

    function addMessageTopic($subject, $pseudo, $message)
    {
        $ids = getIdTopic($subject)->fetchAll();
        foreach ($ids as $id) {
            $idTopic = $id['idTopic'];
        }
        insertMessage($idTopic, $pseudo, $message);
    }

    function supMessage()
    {
        $idMessage = $_POST['select'];
        suppMessage($idMessage);
        seeForum();
    }

    function supTopic()
    {
        $idTopic = $_POST['select'];
        suppTopic($idTopic);
        seeForum();
    }

    function deconnexion()
    {
        require "views/welcome.php";
    }

    function infoClient()
    {
        require "views/clientProfile.php";
    }

