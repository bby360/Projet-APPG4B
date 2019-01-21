<!DOCTYPE html>
<?php include("isConnected.php"); ?>


<html>
<head>
    <meta charset="utf-8" />
    <title>Choix de la maison</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/houseList.css" />
</head>

<img src="./designs/pictures/photo.jpg" id="fond">
<body>

<header>
    <?php include "header.php"; ?>
</header>

<h1> Choix de l'habitation </h1><br />

<p>L'habitation que vous gérez actuellement possède l'ID: <?php echo $_SESSION['idHouse'];?></p> <br/><br />

<form method="post" action="index.php?action=setHouse">

    <label for="house">Quelle habitation voulez vous gérer ?</label><br /><br />
    <select id="maison" name="maison">

    <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "domisep";
            $bdd = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $id = $_SESSION['idClient'];
            $sql = "SELECT * FROM house where idClient = $id";
            $result = $bdd->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo"
            <option value=$row[idHouse]>".$row["idHouse"]." - " .$row['adress']."</option>";
                }
            }
            else{
                echo "<option>Pas de maison trouvée</option>";
            }

            ?>
    </select> <br/> <br/>


    <input type="submit"  name="selectionner" value="Selectionner">


</form>





</body>
</html>
