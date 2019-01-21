<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<?php include("isConnected.php"); ?>

<html>
<head>
    <meta charset="utf-8" />
    <title><?php

        switch ($_SESSION['lang']){
            case 'fr':
                echo 'Ajouter une maison';
                break;

            case 'eng':
                echo 'Add a house';
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
                echo 'Ajouter une Maison';
                break;

            case 'eng':
                echo 'Add a House';
                break;
        }
        ?></h1>

    <form method="post" action="index.php?action=addHouse">
        <p>
            <label>
                <?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo 'Adresse de la maison :';
                        break;

                    case 'eng':
                        echo "Houses' adress :";
                        break;
                }
                ?>
                <input type ="text" name = "adress" required>
            </label>
        </p>
        <p><input type = "submit" value = "<?php

            switch ($_SESSION['lang']){
                case 'fr':
                    echo 'Ajouter';
                    break;

                case 'eng':
                    echo 'Add';
                    break;
            }
            ?>"></p>
    
    </form>

</section>
    <footer>
        <?php require "footer.php"?>
    </footer>
</body>
</html>

