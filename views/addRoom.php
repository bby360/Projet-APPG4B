<!DOCTYPE html>
<?php include("isConnected.php"); ?>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php

        switch ($_SESSION['lang']){
            case 'fr':
                echo 'Ajouter une pièce';
                break;

            case 'eng':
                echo 'Add a room';
                break;
        }
        ?></title>
    <link rel="stylesheet" type="text/css" href="designs/css/addRoom.css" />

</head>
<body>

<header>
    <?php
    include 'header.php';
    ?>
</header>
<section>
    <h1><?php

        switch ($_SESSION['lang']){
            case 'fr':
                echo 'Ajouter une Pièce';
                break;

            case 'eng':
                echo 'Add a Room';
                break;
        }
        ?></h1>

    <form method="post" action="index.php?action=addRoom">


        <p>
            <label>
                <?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo 'Nom de la pièce :';
                        break;

                    case 'eng':
                        echo "Room's name :";
                        break;
                }
                ?>
                <input type ="text" name = "name" required>
            </label>
        </p>
        <p>
            <label>
                <?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo 'Surface de la pièce';
                        break;

                    case 'eng':
                        echo "Room's surface :";
                        break;
                }
                ?>
                <input type = "number" name = "area" min="0" required>
            </label>
        </p>
        <p>

            <?php

            switch ($_SESSION['lang']){
                case 'fr':
                    echo 'A quelle maison voulez vous ajouter cette pièce ?';
                    break;

                case 'eng':
                    echo 'Which house do you want to add this room to ?';
                    break;
            }
            ?>
                <select name="idHouse" id="idHouse" >
                    <?php foreach($houses as $house){ ?>
                    <option  value="<?=$house['idHouse']; ?>"> <?=$house['adress']; ?> </option>
                    <?php } ?>
                </select>

        </p>



        <p><input type = "submit" value = "<?php

            switch ($_SESSION['lang']){
                case 'fr':
                    echo 'Ajouter ';
                    break;

                case 'eng':
                    echo 'Add';
                    break;
            }
            ?>"></p>
    </form>

</section>
</body>
</html>

