<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/temporary.css" />

</head>
<body>
<img id="fond" src="photo.jpg">
<header>
    <?php
    include 'header.php';
    ?>
</header>
<section>

    <h1>Créer profil invité</h1>
    <form method="post" action="traitement.php">
        <table>
            <tr>
                <td align="right">
                    <label> Nom    </label>
                </td>
                <td>
                    <input type="text" name="name" autofocus>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label> Prénom    </label>
                </td>
                <td>
                    <input type="text" name="password" required>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label> Indentifiant temporaire  </label>
                </td>
                <td>
                    <input type="text" name="name" autofocus>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label> Mot de passe temporaire    </label>
                </td>
                <td>
                    <input type="text" name="name" autofocus>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label> Valable pendant    </label>
                </td>
                <td>
                    <input type="text" name="name" autofocus>
                </td>
            </tr>




        </table>

    </form>

    <p>A quelles pièces aura t'il accès ?</p>

    <div>
        <input type="checkbox" id="scales" name="scales"
               checked>
        <label for="scales">Salon</label>
    </div>

    <div>
        <input type="checkbox" id="horns" name="horns">
        <label for="horns">Bureau</label>
    </div>

    <div class="Valider">
        <button><a href="Valider">Valider</a></li></button>
    </div>

</section>
</body>
</html
