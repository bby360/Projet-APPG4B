?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../designs/css/inscription2.css">
    <title>Inscription</title>
</head>

<body>
<header><h1>Inscription</h1></header>

<section>
    <form method="post" action="/index.php?action=inscription2">


        <p><label for="CP">Code postal</label> : <input type="text" name="CP" id="CP" required=""></p>


        <p>Veuillez consulter notre catalogue afin de selectionner les produits correspondants à vos besoins
            <a href="catalogue.php"><input type="button" name="catalogue" value="Catalogue"></p></a>

        <p>Une fois votre choix effectué, merci de prendre rendez-vous avec l'un de nos installateurs. <br>Celui-ci se rendra à votre domicile pour procéder à l'installation de votre system G4B.</p>


        <p><label for="RDV">Prendre rendez-vous avec un technicien</label>  <input type="date" name="RDV" id="RDV"></p>

        <p class="NotaBene">NB: La durée de l'installation varie en fonction du nombre de capteurs sélectionnés</p>

        <a href="inscription.php"><input type="button" value="Retour"></a>
        <input type="submit" value="Valider">
    </form>
</section>

</body>
</html>