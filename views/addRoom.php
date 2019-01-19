<!DOCTYPE html>
<?php include("isConnected.php"); ?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ajouter une pièce</title>
    <link rel="stylesheet" type="text/css" href="designs/css/addRoom.css" />

</head>
<body>

<header>
    <?php
    include 'header.php';
    ?>
</header>
<section>
    <h1>Ajouter une pièce</h1>

    <form method="post" action="index.php?action=addRoom">


        <p>
            <label>
                Nom de la pièce :
                <input type ="text" name = "name" required>
            </label>
        </p>
        <p>
            <label>
                Surface de la pièce :
                <input type = "number" name = "area" min="0" required>
            </label>
        </p>
        <p>

                Choix de la maison :
                <select name="idHouse" id="idHouse" >
                    <?php foreach($houses as $house){ ?>
                    <option  value="<?=$house['idHouse']; ?>"> <?=$house['adress']; ?> et <?=$house['idHouse']; ?></option>
                    <?php } ?>
                </select>

        </p>



        <p><input type = "submit" value = "Ajouter"></p>
    </form>

</section>
</body>
</html>

