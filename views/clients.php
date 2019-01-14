<?php
session_start();
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="designs/css/clients.css" />
        <title>Fichier Clients</title>
    </head>

<body>
    <header>
        <?php require 'headerAdmin.php'?>
    </header>

<section>

    <h1 id="top">Liste des clients</h1>

    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', 'root');

    if (!$bdd) {
        die("Connection failed: " . !$bdd);
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
                <td>".htmlspecialchars($row["lastName"])."</td>
                <td>".htmlspecialchars($row["firstName"])."</td>
                <td>".htmlspecialchars($row["email"])."</td>
                <td>".htmlspecialchars($row["phone"])."</td>
                <td>".htmlspecialchars($row["adress"])."</td>
                <td>".htmlspecialchars($row["postalcode"])."</td>
                <td>".htmlspecialchars($row["emergency"])."</td>
                <td>
                <form action='clientProfile.php' method='GET'>
                    <input type='text' name='idProfil' value='".$row['idClient']."' style='visibility:hidden' class='buttonHidden';>
                    <input type=\"submit\" name='VoirProfil'  value='Voir profil ".$row["idClient"]."' class='button' style=\"vertical-align:middle\">
                </form>
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
