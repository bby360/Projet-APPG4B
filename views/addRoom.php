<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/addRoom.css" />

</head>
<body>
<img id="fond" src="photo.jpg">
<header>
    <?php
    include 'header.php';
    ?>
</header>
<section>
<h1>Ajouter une pièce</h1>

<form method="post" action="index.php?action=addroom">
    <p>
        <label>
            Nom de la pièce :
            <input type ="text" name = "a" required>
        </label>
    </p>
    <p>
        <label>
            Surface de la pièce :
            <input type = "number" name = "b" min="0" required>
        </label>
    </p>
    <p><input type = "submit" value = "Ajouter"></p>
</form>

</section>
</body>
</html