<?php
session_start();

?>
<?php include("isConnectedAdmin.php"); ?>
<!DOCTYPE html>
<div xmlns="http://www.w3.org/1999/html">
    <head>
        <header>
            <?php require "headerAdmin.php"?>
        </header>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="./design/css/clientProfile.css" />
        <title>Client</title>



    </head>

    <body>


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



    </div>

    <script>

        alert(tel);

        function JS(){
            var tel = "<?php echo($donnes['phone']); ?>";
            document.getElementById("demo").innerHTML = tel;
        }

    </script>





    </body>
