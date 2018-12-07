<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="inscription.css" />
</head>
<body>

<header>
    <h1>VOTRE MAISON A PORTEE DE MAIN</h1>
</header>

<section>
    <form method="POST" action="index.php?action=inscription">

        <table align="center">
            <tr>
                <td>
                    <label>Nom :</label>
                </td>
                <td>
                    <input type="text" name="lastName" id="lastName"autofocus>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Prenom : </label>
                </td>
                <td>
                    <input type="text" name="firstName" id="firstName" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Mail : </label>
                </td>
                <td>
                    <input type="email" name="email" placeholder="Ex: jean.dupont@gmail.com" id="email" required>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label>Mot de passe : </label>
                </td>
                <td>
                    <input type="password" name="password" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Confirmation mot de passe : </label>
                </td>
                <td>
                    <input type="password" name="confirm_password" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Phone : </label>
                </td>
                <td>
                    <input type="phone" name="phone" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Adress  </label>
                </td>
                <td>
                    <input type="text" name="adress" required>
                </td>
            </tr>

        </table>
        <p>
            <input type="reset" value="Retour">
            <input type="submit" value="valider" name="inscription" class="form-button">
        </p>
    </form>
    <p><a href="index.php?action=connexion">Déjà inscrit ?</a></p>


</section>
<footer>
    <div id="triangle"></div>
    <p>Copyright - Tous droits réservés<br/>
</footer>
</body>
</html>
