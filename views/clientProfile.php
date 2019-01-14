<?php
session_start();

?>

<!DOCTYPE html>

    <head>
        <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="./designs/css/clientProfile.css" />
        <title>Client</title>



    </head>

    
    
    <body>
    <header>
        <?php require 'headerAdmin.php'?>
    </header>

    <div class="card">

        <?php
    $bdd = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');

    $idProfil=$_GET['idProfil'];


    $req = $bdd-> prepare("SELECT lastName, firstName, email, phone, adress, postalcode FROM client WHERE idClient = ?");
    $res=$req->execute(array(
            $idProfil
    ));

    $donnes=$req->fetch();


    echo "
        <h1>".$donnes['lastName']." " .$donnes["firstName"]. "</h1>
        <p class=\"email\"> ".$donnes['email']."</p>
        <p class=\"adress\">".$donnes['adress']."</p>
        <p class=\"postalcode\">".$donnes['postalcode']."</p>
        <p><button onclick=\"JS()\">Contact</button></p>
        <p id=\"demo\"></p>";

    ?>


    <script>

        alert(tel);

        function JS(){
            var tel = "<?php echo($donnes['phone']); ?>";
            document.getElementById("demo").innerHTML = tel;
        }

    </script>

    <footer>
        <?php require "footer.php"?>
    </footer>


    </body>
