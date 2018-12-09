<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/addRoom.css" />

</head>
<body>
<img id="fond" src="../designs/css/photo.jpg">
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
            <label>
                Id de la maison :
                <input type = "number" name = "idHouse" min="0" required>
            </label>
        </p>

        <p>
            <label> Le mode de la pièce :
                <select name="Mode">
                    <option value="Auto">Automatique
                    <option value="Manu">manuel
                </select name="Mode">
            </label>
        </p>

        <p>
            <label>
                Température manuelle :
                <input type = "number" name = "tempManu" min="0" required>
            </label>
        </p>

        <p>
            <label>
                Température automatique:
                <input type = "number" name = "tempAuto" min="0" required>
            </label>
        </p>

        <p>
            <label>
                Lumière automatique :
                <input type = "number" name="tempAuto" min="0" required>
            </label>
        </p>
        <p>
            <label>
                Lumière manuelle :
                <input type = "number" name = "tempManu" min="0" required>
            </label>
        </p>

        <p>
            <label>
                Heure de ouverture des volets :
                <input type = "number" name = "blindOpenTime" min="0" required>
            </label>
        </p>

        <p>
            <label>
                Heure de fermeture des volets :
                <input type = "number" name = "blindCloseTime" min="0" required>
            </label>
        </p>

        <p><input type = "submit" value = "Ajouter"></p>
    </form>

</section>
</body>
</html
