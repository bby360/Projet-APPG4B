<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/signin.css" />
</head>
<body>
<header>
    <h1>VOTRE MAISON A PORTEE DE MAIN</h1>

</header>
<section>

    <div class = "connexion">

        <form method="POST" action="">

            <table align="center">
                <tr>
                    <td>
                        <label>Mail</label>
                    </td>
                    <td>
                        <input type="email" name="email" placeholder="Ex: jean.dupont@gmail.com" id="email" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mot de passe</label>
                    </td>
                    <td>
                        <input type="password" name="mdp" id="mdp" required>
                    </td>
                </tr>
                
                <tr>
                <td>
                <label><input type="checkbox" name="invite">Je suis un invité</label>
                </td>
                </tr>

            </table>

            <input type="submit" value="valider" name="connexion" class="form-button">
        </form>
        <p>
                <button href="index.php?action=signup" class="button"> S'inscrire </button>
                <button class="button"> Mot de passe oublié</button>
            </p>
    </div>



</section>


<footer>
        <p> Mentions légales
            <img src="designs/pictures/Creaweb.jpg" id="creambition">
        </p>
    <p>Created by</p>
</footer>
</body>
</html>

