<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>



<html>
<head>
    <meta charset="utf-8" />
    <title><?php

        switch ($_SESSION['lang']){
            case 'fr':
                echo 'Choix de la maison';
                break;

            case 'eng':
                echo 'House choice';
                break;
        }
        ?></title>
    <link rel="stylesheet" type="text/css" href="./designs/css/houseList.css" />
</head>

<img src="./designs/pictures/photo.jpg" id="fond">
<body>

<header>
    <?php include "header.php"; ?>
</header>

<h1> <?php

    switch ($_SESSION['lang']){
        case 'fr':
            echo "Choix de l'habitation";
            break;

        case 'eng':
            echo 'House choice';
            break;
    }
    ?> </h1><br />

<p><?php

    switch ($_SESSION['lang']){
        case 'fr':
            echo "L'habitation que vous gérez actuellement possède l'ID :";
            break;

        case 'eng':
            echo 'The house you are currently managing has the ID:';
            break;
    }
    ?> <?php echo $_SESSION['idHouse'];?></p> <br/><br />

<form method="post" action="index.php?action=setHouse">

    <label for="house"><?php

        switch ($_SESSION['lang']){
            case 'fr':
                echo 'Quelle habitation voulez vous gérer ?';
                break;

            case 'eng':
                echo 'Which house would you like to manage ?';
                break;
        }
        ?></label><br /><br />
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
                echo "<option>--------------</option>";
            }

            ?>
    </select> <br/> <br/>


    <input type="submit"  name="selectionner" value="<?php

    switch ($_SESSION['lang']){
        case 'fr':
            echo 'Sélectionner';
            break;

        case 'eng':
            echo 'Select';
            break;
    }
    ?>">


</form>

<footer>
    <?php require"footer.php"; ?>
</footer>

</body>
</html>
