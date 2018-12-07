<?php session_start()?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/inscription.css" />
</head>
<body>

<header>
    
    <?php require "header.php"?>
    <h1>VOTRE MAISON A PORTEE DE MAIN</h1>
    
</header>

<section>
    
    <form method="post" action="index.php?action=inscription">

        <table align="center">
            
            <tr>
                <td>
                    <label>Nom :</label>
                </td>
                
                <td>
                    <input type="text" name="name" autofocus>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label>Prénom : </label>
                </td>
                
                <td>
                    <input type="text" name="first_name" required>
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
                    <input type="text" name="password" required>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label>Confirmation mot de passe : </label>
                </td>
                
                <td>
                    <input type="text" name="confirm_password" required>
                </td>
            </tr>

        </table>
        
        <p>
            <input type="reset" value="Retour"></a>
            <input type="submit" value="Suivant">
        </p>
    
</section>
    
</form>

<footer>
    
   <?php require "footer.php"?>
    
</footer>

</form>

</body>

</html>
