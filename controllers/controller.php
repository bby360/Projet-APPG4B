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
                $_SESSION['lang']= 'fr';

                echo 'Vous êtes maintenant connecté';

                $nbHouse=countHouse();
                if($nbHouse==0){
                    header('Location: index.php?action=addHouse');
                }
                else{
                header('Location: index.php?action=dashboard');
                exit();
                }
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

function countHouse(){
    if(!isset($_SESSION)) {
        session_start();
    }
    $House= nbHouse($_SESSION['idClient']) -> fetchAll();
    foreach ($House as $key => $H){
        $nb=$H[$key];
    }
    if($nb==0){
        return 0;
    }
    else{
        $idHouse= idHouse($_SESSION['idClient']) -> fetchAll();
        foreach ($idHouse as $i){
            $id=$i['idHouse'];
        }
        $_SESSION['idHouse']=$id;
        return 1;
    }
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
    if(!isset($_SESSION)) {
        session_start();
    }
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
    if(!isset($_SESSION)) {
        session_start();
    }
    $nom=$_GET['piece'];
    $idHouse= $_SESSION['idHouse'];
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

function  seeAddRoom(){
    if(!isset($_SESSION)) {
        session_start();
    }
    $idClient=$_SESSION['idClient'];
    $houses = getHouseList($idClient) -> fetchAll();
    require "views/addRoom.php";
}

function addRoom(){
    $idHouse= $_POST['idHouse'];
    $roomName = $_POST['name'];
    $surface= $_POST['area'];
    insertRoom($idHouse, $roomName, $surface);

    seeAddRoom();
}

function rooms(){
    require "views/rooms.php";
}

function updateRoom(){
    if(!isset($_SESSION)) {
     session_start();
}
    if(isset($_POST["onOff"])) {
        $lum=$_POST['onOff'];
    }
    else{
        $lum="2";   //2 = eteint
    }
    $idClient=$_SESSION['idClient'];
    $idHouse= $_SESSION['idHouse'];
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
        updateAuto($idHouse, $nom, $nvLumiereAuto, $nvOuvertureVolets, $nvFermetureVolets, $nvTemperature, $lum);
    }
    else{
        updateManu($idHouse, $nom, $nvLumiereManu, $nvVoletsManu, $nvTemperature, $lum);
    }
    var_dump('onOff');
    $a = createTrame(01,$lum); //type, val
    $a1='';
    foreach ($a as $ligne)
    {
        $a1.=$ligne;
    } 
    echo $a1;
    $url = 'http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=004B&TRAME=' .$a1 ;
    echo $url;
?>
    <script>

     var window_handle;  // variable globale du script, à ne surtout pas modifier !!!
     var url2 = '<?php echo $url; ?>';

     function open_window() // on défini la fonction qui va ouvrir la fenêtre
     {
        window_handle = window.open(url2); // ici c'est l'URL complète de la page à ouvrir attention de ne pas supprimer les guillemets
     } // on ferme la fonction open_window()
     
     function close_window() // on défini la fonction qui va fermer la fenêtre qu'on a ouvert précédemment
     {
        window_handle.close(); // on ferme la page comme window.close() à part que dans notre cas, on fermer une variable donc window_nomdelavariable.close()
     } // on ferme la fonction close_window()

    </script>

    <script>
    
        open_window();
        window.setInterval(" window_handle.close();", 100, "JavaScript"); // 20000 est le temps y EN MILISECONDE
    
    </script>
<?php
    //header ("Location: http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=004B&TRAME=1004Btest2") ;

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
    if(!isset($_SESSION)) {
        session_start();
    }
        $pseudo=$_SESSION["firstName"];
        $message=$_POST["message"];
        $idTopic=$_GET["idTopic"];
        insertMessage($idTopic,$pseudo,$message);
        seeMessageForum();

}

function addTopic(){
    if(!isset($_SESSION)) {
        session_start();
    }
        $pseudo=$_SESSION["firstName"];
        $subject=$_POST["subject"];
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
    $house = $_SESSION['idHouse'];
    $capteurs = getCapteur($house) -> fetchAll();
    $roomNames = Array();
    $typeCapteurs = Array();
    $idCapteurs = Array();
    $idRooms = Array();
    foreach ($capteurs as $capteur){
        $typeCapteurs[]= $capteur['type'];
        $idCapteurs[]= $capteur['idCapteur'];
        $idRooms[]= $capteur['idRoom'];
        $room=$capteur['idRoom'];
        $roomName = getRoomName($room)-> fetchAll();
        foreach ($roomName as $r){
        $roomNames[]=$r['roomName'];
       }
    }
    require "views/declarerAlerte.php";
}

function commenterAlerte(){
    require "views/commenterAlerte.php";
}

function posterAlerte(){
    $idCapteur = $_GET['idCapteur'];
    $idRoom = $_GET['idRoom'];
    $type = $_POST['typeAlerte'];
    $message = $_POST['commentaire'];
    insertAlerte($idCapteur,$idRoom,$type,$message);
    declarerAlerte();
}

function showHouse(){
    if(!isset($_SESSION)) {
        session_start();
    }
    require 'views/houseList.php';
}

function setHouse(){
    if(!isset($_SESSION)) {
        session_start();
    }
   updateIDHouse();
   require 'views/houseList.php';
}

function changeLang()
{
    session_start();
    switch ($_SESSION['lang']) {
        case 'fr':
            $_SESSION['lang'] = 'eng';
            break;

        case 'eng':
            $_SESSION['lang'] = 'fr';
            break;
    }

    require 'views/dashboard.php';
}

function logs() {
    require "views/logs.php";
    }

function createTrame($typeCapt, $valcapt){
    
    $TrameEnvoi = ''; // buffer pour envoyer une trame vers la passerelle
    // Partie constante de la trame
    $TrameEnvoi[0] = '1'; // le champ TRA. choisir toujours "Trame courante = 1"
    // le champ OBJ (4 octets) = numero de groupe. ex 007A 007B ...
    $TrameEnvoi[1] = '0'; // mettre le chiffre du numero de groupe (0)
    $TrameEnvoi[2] = '0'; // mettre le chiffre du numero de groupe (0)
    $TrameEnvoi[3] = '4'; // mettre le chiffre du numero de groupe (7)

    $TrameEnvoi[4] = 'B'; // mettre la lettre du numero de groupe (A, B, ... E)
    $TrameEnvoi[5] = '1'; // champ REQ. 1= Requete en ecriture
    // TrameEnvoi[6] = ; // champ TYP. remplir dans la boucle (voir Doc)
    $TrameEnvoi[6] = $typeCapt; // type capteur
    $TrameEnvoi[7] = '0'; // champ NUM (2 octets). Numero du capteur
    $TrameEnvoi[8] = '1'; // On choisit par exemple le numero 01.
    // TrameEnvoi[ 9] = ; // Champ VAL (4 octets) = valeur à envoyer au site web
    // TrameEnvoi[10] = ; // par exemple la valeur du capteur de lumiere
    // TrameEnvoi[11] = ;
    // TrameEnvoi[12] = ;

    //$digH, $digA; // digit (4 bits) Hexa et Ascii
    
    // convertir la valeur du capteur en 4 chiffres ASCII (poid fort en premier)
    // conversion du 1er chiffre (poid fort)
    $digH = ($valcapt >> 12) & 0x0F; // >> signifie décalage de 12 bits vers la droite
    $digA = dechex($digH);
    $TrameEnvoi[9] = $digA;
    // conversion du 2e chiffre
    $digH = ($valcapt >> 8) & 0x0F; // décalage de 8 bits vers la droite
    $digA = dechex($digH);
    $TrameEnvoi[10] = $digA;
    // conversion du 3e chiffre
    $digH = ($valcapt >> 4) & 0x0F; // décalage de 4 bits vers la droite
    $digA = dechex($digH);
    $TrameEnvoi[11] = $digA;
    // conversion du 4e chiffre (poid faible)
    $digH = $valcapt & 0x0F; // pas besoin de décalage. garder juste le dernier digit
    $digA = dechex($digH);
    $TrameEnvoi[12] = $digA;

    $TrameEnvoi[13] = 'B'; // Champ TIM (4 octets) = heure d'envoi de la trame
    $TrameEnvoi[14] = 'A'; // Ce champ n'est pas utilisé par la passerelle; donc
    $TrameEnvoi[15] = 'B'; // on peut mettre la valeur qu'on veut
    $TrameEnvoi[16] = 'A';

    
    // boucle pour envoyer une trame vers la passerelle
    $CheckSum = 0;
    // envoi des 'SIZE_ENVOI' premiers octets
    for ($n = 0; $n < 17; $n++)
    {
        $CheckSum = $CheckSum + $TrameEnvoi[$n];
    }
    $TrameEnvoi[17] = $CheckSum;
    return $TrameEnvoi;
}

