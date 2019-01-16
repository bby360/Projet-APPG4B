<?php
require "models/model.php";

function welcome(){
    require "views/welcome.php";
}

function notFound() {
require "views/notFound.php";
}

function signup(){

    if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email']) 
    && isset($_POST['mdp']) && isset($_POST['phone']) && isset($_POST['adress']) && isset($_POST['confirm_mdp']) && isset($_POST['pays'])) {

        if (empty($_POST['lastName']) || empty($_POST['firstName'])  || empty($_POST['pays'])  || 
        empty($_POST['email'])  || empty($_POST['mdp'])  ||  empty($_POST['phone']) && 
        empty($_POST['adress'])  || $_POST['mdp']!=$_POST['confirm_mdp']) {
 
                $alerte = "Veuillez remplir tous les champs correctement.";
                echo "Veuillez remplir tous les champs correctement.";
            }   else {
                signingup();                
                header('Location: index.php?action=signin');

                exit();
                
            }
        }

        require "views/signup.php";
}

function signin() {
    
    if(!empty($_POST['email']) && !empty($_POST['mdp'])){

        $db=dbConnect();
        $req = $db->prepare('SELECT * FROM client WHERE (email = :email)');
        $req->execute(['email' => $_POST['email']]);
        $client = $req->fetch(PDO::FETCH_OBJ);
        if($client) {

            if(password_verify($_POST['mdp'], $client->mdp)) {
                session_start();
                $_SESSION['lastName'] = $client->lastName;
                $_SESSION['firstName'] = $client->firstName;
                $_SESSION['email'] = $client->email;
                $_SESSION['adress'] = $client->adress;
                $_SESSION['phone'] = $client->phone;
                $_SESSION['postalcode']=$client->postalcode;
                $_SESSION['pays']=$client->pays;
                $_SESSION['idClient']=$client->idClient;

                echo 'Vous êtes maintenant connecté';

                
                header('Location: index.php?action=dashboard');
                exit();
            }
        
        else{
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
            echo 'Identifiant ou mot de passe incorrecte';
        }
    }
    else{
        echo "Identifiant ou mot de passe incorrecte";
    }
    }
    require 'views/signin.php';

}



function viewAddGuest(){
    $rooms = getRoomList()->fetchAll();
    require"views/addGuest.php";
}

function catalogue(){
    require"views/catalogue.php";
}

function dashboard(){
    require"views/dashboard.php";
}

function roomList()
{
    $rooms = getRoomList()->fetchAll();

    require "views/roomList.php";
}

/* function houseList()
{
    $houses = getHouseList()->fetchAll();

    require "views/houseList.php";
}
 */
function roomList2()
{
    $nom=$_GET['piece'];
    $idHouse= '5';//$_SESSION['idHouse'];
    $infos = getInfoRoom($nom, $idHouse)->fetchAll();
    $rooms = getRoomList()->fetchAll();
    require "views/rooms.php";
}

function seeForum()
 {
    $topics =getTopicList()->fetchAll();

    require "views/forum.php";
 }

function seeMessageForum()
{
    $id= $_GET["idTopic"];
    $messages =getMessage($id)->fetchAll();
    require "views/forumMessage.php";
}

function addRoom(){


        if (isset($_POST['name']) && isset($_POST['area']) && isset($_POST['idHouse'])
            && isset($_POST['tempManu']) && isset($_POST['tempAuto']) && isset($_POST['lumAuto'])
            && isset($_POST['lumManu'])&& isset($_POST['blindOpenTime'])&& isset($_POST['blindCloseTime'])) {


                insertRoom();
                header('Location: index.php?action=roomList');

                exit();

        }
  require "views/addRoom.php";
}

function rooms(){
    require "views/rooms.php";
}

function updateRoom(){
    if(!isset($_SESSION)) {
     session_start();
}
    $idClient=$_SESSION['idClient'];
    $idHouse= '5';//$_SESSION['idHouse'];
    $nom =$_GET['piece'];
    $nvMode=$_POST['mode'];
    $nvLumiereAuto=$_POST['lumiere_auto'];
    $nvOuvertureVolets=$_POST['ouverture_volets'];
    $nvFermetureVolets=$_POST['fermeture_volets'];
    $nvVoletsManu=$_POST['volets_manuel'];
    $nvTemperature=$_POST['temperature'];
    $nvLumiereManu=$_POST['lumiere_manuel'];

    updateMode($nvMode, $idHouse, $nom);

    if($nvMode =='Auto'){
        updateAuto($idHouse, $nom, $nvLumiereAuto, $nvOuvertureVolets, $nvFermetureVolets, $nvTemperature);
    }
    else{
        updateManu($idHouse, $nom, $nvLumiereManu, $nvVoletsManu, $nvTemperature);
    }

    roomList2();
}


function editProfile() {
    require "views/editProfile.php";
}

function profileEdited() {
    require "views/profileEdited.php";
}

function catalogueunlog() {
    require "views/catalogueUnlog.php";
}

function deconnexion(){
    require "views/deconnexion.php";
}

function addHouse(){
    if (isset($_POST['adress'])) {
    insertHouse();
    }
    require "views/addHouse.php";
    
}

function lightSensors(){
    $sensors = getLightSensors()->fetchAll();
    require "views/lightSensors.php";
}

function presenceSensors(){
    $sensors = getPresenceSensors()->fetchAll();
    require "views/presenceSensors.php";
}

function temperatureSensors(){
    $sensors = getTemperatureSensors()->fetchAll();
    require "views/temperatureSensors.php";
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

function urgence(){
    require "views/urgence.php";
}

function contactUrgence(){
    require "views/contact.php";
}

function addMessage(){
        $pseudo=$_POST["pseudo"];
        $message=$_POST["message"];
        $idTopic=$_GET["idTopic"];
        insertMessage($idTopic,$pseudo,$message);
        seeMessageForum();
}

function addTopic(){
        $subject=$_POST["subject"];
        $pseudo=$_POST["pseudo"];
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

function consumption(){
    $capteursP = getConsumptionP()->fetchAll();
    $capteursT = getConsumptionT()->fetchAll();
    $capteursL = getConsumptionL()->fetchAll();
    require "views/consumption.php";
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
    $questions =getQuestionList()->fetchAll();

    require "views/faq.php";
 }


function declarerAlerte(){
    if(!isset($_SESSION)) {
        session_start();
    }
    $house = "5";//$_SESSION['idHouse'];
    $capteurs = getCapteur($house) -> fetchAll();
    require "views/declarerAlerte.php";
}

function commenterAlerte(){
    require "views/commenterAlerte.php";
}

function posterAlerte(){
    $idCapteur = $_GET['capteur'];
    $type = $_POST['typeAlerte'];
    $message = $_POST['commentaire'];
    insertAlerte($idCapteur,$type,$message);
    declarerAlerte();
}

function showHouse(){

    require 'views/houseList.php';
}

