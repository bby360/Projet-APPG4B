<?php
session_start();
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="designs/css/clients.css" />
        <title>Fichier Clients</title>
    </head>

    <header>
        <?php require 'headerAdmin.php'?>
    </header>

<section>

    <h1 id="top">Liste des clients</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "domisep";
    $bdd = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT idClient, lastName, firstName, email, phone, adress, postalcode, emergency FROM client";
    $result = $bdd->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='clients'>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>E-mail</th>
            <th>Numéro de téléphone</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Numéro d'urgence</th>
            <th>Voir le profil</th>
        </tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "
               <tr>
                <td>".$row["idClient"]."</td>
                <td>".$row["lastName"]."</td>
                <td>".$row["firstName"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["phone"]."</td>
                <td>".$row["adress"]."</td>
                <td>".$row["postalcode"]."</td>
                <td>".$row["emergency"]."</td>
                <td><a href='clientProfile.php'>
                    <input type=\"submit\" name='VoirProfil' value=\"Voir profil ".$row["idClient"]."\" class='button' style=\"vertical-align:middle\">
                    </a>
                </td>
               </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>
    <a href="#top">Go to top</a>
</section>



    <footer>
        <?php require "footer.php"?>
    </footer>

    </body>
</html>
