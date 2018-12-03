<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/connexion.css" />
</head>
<body>
<header>
    <h1>VOTRE MAISON A PORTEE DE MAIN</h1>

</header>
<section>

    <div class = "connexion">

        <form method="POST" action="../models/model.php">

            <table align="center">
                <tr>
                    <td>
                        <label>login</label>
                    </td>
                    <td>
                        <input type="text" name="login" id="login"autofocus>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>password</label>
                    </td>
                    <td>
                        <input type="text" name="password" id="password" required>
                    </td>
                </tr>

            </table>
            <p>
                <input type="submit" value="S'inscrire">
                <input type="submit" value="Mot de passe oublié">
            </p>

        </form>

    </div>

    <div class="catalogue">
        <a href="catalogue.html">Catalogue</a>
    </div>

</section>


<footer>
        <p> Mentions légales
            <img src="designs/pictures/Creaweb.jpg" id="creambition">
        </p>
    <p>Created by</p>
    <img id="image2" src="designs/pictures/Creaweb.jpg">
</footer>
</body>
</html>

