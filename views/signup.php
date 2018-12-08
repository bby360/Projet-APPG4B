<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="inscription.css" />
</head>
<body>

<header>
    <h1>Inscris toi</h1>
</header>

<section>
    <form method="POST" action="">

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
                    <input type="text" name="firstName" id="firstName">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Mail : </label>
                </td>
                <td>
                    <input type="email" name="email" placeholder="Ex: jean.dupont@gmail.com" id="email">
                </td>
            </tr>
            
            <tr>
                <td>
                    <label>Mot de passe : </label>
                </td>
                <td>
                    <input type="password" name="mdp">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Confirmation mot de passe : </label>
                </td>
                <td>
                    <input type="password" name="confirm_mdp">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Phone : </label>
                </td>
                <td>
                    <input type="phone" name="phone">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Adress  </label>
                </td>
                <td>
                    <input type="text" name="adress">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Postal Code  </label>
                </td>
                <td>
                    <input type="text" name="postalcode">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Emergency Number  </label>
                </td>
                <td>
                    <input type="text" name="emergency">
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
