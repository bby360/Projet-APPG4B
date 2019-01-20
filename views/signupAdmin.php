<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>InscriptionAdmin</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/signup.css" />
    <script type="text/javascript" src="./designs/css/signup.js"></script>
</head>
<body>

<header>
    <h1>Cette page n'est la que pour la démonstration</h1>
</header>

<section>
    <form method="POST" action="">

        <table align="center">
            <tr>
                <td>
                    <label>Nom </label>
                </td>
                <td>
                    <input type="text" name="lastName" id="lastName" autofocus>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Prenom  </label>
                </td>
                <td>
                    <input type="text" name="firstName" id="firstName">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Mail  </label>
                </td>
                <td>
                    <input type="email" name="email" placeholder="Ex: jean.dupont@gmail.com" id="email">
                </td>
            </tr>

            <tr>
                <td>
                    <label>Mot de passe  </label>
                </td>
                <td>
                    <input type="password" id="mdp" name="mdp" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Il doit y avoir au moins 8 caractères des lettres des chiffres et un caractère spécial" onclick="showmdp()" required>
                    <div id="message">
                        <h3>Le mot de passe doit contenir</h3>
                        <p id="letter" class="invalid">A <b>lettre</b> minuscule</p>
                        <p id="capital" class="invalid">A <b>lettre</b> majuscule</p>
                        <p id="number" class="invalid">A <b>nombre</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characterès</b></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Confirmation mot de passe  </label>
                </td>
                <td>
                    <input type="password" name="confirm_mdp">
                </td>
            </tr>
            <input type="reset" value="Retour" class="form-button">
            <input type="submit" value="valider" name="inscription" class="form-button">
        </p>
        </table>
    </form>



</section>
<footer>
    <?php require "footer.php"?>
</footer>
</body>
</html>
