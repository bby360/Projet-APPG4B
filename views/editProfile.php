<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <?php

    include 'header.php';
    ?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="./designs/css/editProfile.css" />
    <title>Editer votre profil</title>
</head>

<body>


<h1> Editer votre profil</h1>

<section>
    <p>Bonjour, vous pouvez <em>modifier</em> <strong>votre profil</strong> ici!</p>

    <div id=soussection>
        <div class="Contact">
            <form method="post" index.php?action="clientProfil">

                <fieldset>
                    <legend><h2>Changer votre contact</h2></legend>
                    <p>
                    <h3><label for="phone">Portable</label> : <input type="tel" name="phone" id="phone" /></h3>
                    <h3><label for="email">E-mail</label> : <input type="email" name="email" id="email" /></h3>
                    <h3><label for="emergency">Contact d'urgence</label> : <input type="text" name="emergency" id="emergency" /></h3>

                    <h3><input type="submit" value="Enregistrer" /></h3>
                    </p>
                </fieldset>
            </form>

        </div>
    </div>

</section>


</body>



</html>