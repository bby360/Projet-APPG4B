<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ajouter une maison</title>
    <link rel="stylesheet" type="text/css" href="designs/css/addRoom.css" />

</head>
<body>

<header>
    <?php
    include 'header.php';
    ?>
</header>
<section>
    <h1>Ajouter une Maison</h1>

    <form method="post" action="index.php?action=addHouse">
        <p>
            <label>
                Adresse de la maison :
                <input type ="text" name = "adress" required>
            </label>
        </p>
        <p><input type = "submit" value = "Ajouter"></p>
    
    </form>

</section>
    <footer>
        <?php require "footer.php"?>
    </footer>
</body>
</html>

