<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ajouter un capteur</title>
    <link rel="stylesheet" type="text/css" href="designs/css/catalogueAdmin.css" />

</head>
<body>

<header>
    <?php require 'headerAdmin.php';?>
</header>

<section>
    <h1>Ajouter un capteur</h1>

    <form method="post" action="indexAdmin.php?action=addedSensors">
        <p>
            <label>
                Type de Produit :
                <select name="typeProduct">
                    <option value="Luminosité">Luminosité</option>
                    <option value="Présence">Présence</option>
                    <option value="Température"> Température</option>
                </select name="Mode">
            </label>
        </p>

        <p>
            <label>
                Consommation :
                <input type = "number" name = "consumption" min="0" required>
            </label>
        </p>

        <p>
            <label>
                Prix :
                <input type = "number" name = "price" min="0" required>
            </label>
        </p>

        <p><input type = "submit" value = "Ajouter"></p>

    </form>

</section>

<footer>
    <?php require 'footer.php'?>
</footer>

</body>
</html>
