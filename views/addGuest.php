<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/temporary.css" />

</head>
<body>
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
    <table>
        <?php foreach($rooms as $room) { ?>
            <ul>
                <input type="checkbox" name="<?= $room["roomName"];?>">
                <label for="scales"><?= $room["roomName"];?></label>
            </ul>
        <?php } ?>



    </table>


    <div class="Valider">
        <button><a href="Valider">Valider</a></li></button>
    </div>

</section>
<footer>
    <footer>
        <?php require "footer.php"?>
    </footer>
</footer>
</body>
</html