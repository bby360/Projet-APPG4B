<?php
session_start();
include("isConnected.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="./designs/css/editProfile.css" />
        <title>Editer votre profil</title>
    </head>

    <body>
    <header>
    <?php include("header.php"); ?>
    </header>

            <h1> Editer votre profil</h1></header>

    	<section>
        <p>Bonjour, vous pouvez <em>modifier</em> <strong>votre profil</strong> ici!</p>

        <div id=soussection>
        <div class="Contact">
            <form method="post" action="index.php?action=profileEdited.php">

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

        <div class="Photo">
    	   <form method="post" action="index.php?action=profileEdited.php" enctype="multipart/form-data">

                <fieldset>
                <legend><h2>Changer votre photo de profil</h2></legend>

    	           <p>
                    <label for="photo">Choisir votre photo (JPG, JPEG, PNG ) :</label><br />
                    <h3> <input type="file" name="newpic" /> </h3>
                    <h3><input type="submit" value="Enregistrer" /></h3>
                    </p>
                </fieldset>
            </form>
        </div>
        </div>

        </section>

    <footer>
        <?php require "footer.php"?>
    </footer>
    </body>
