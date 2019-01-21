<?php
session_start();
include("isConnected.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="./designs/css/editProfile.css" />
        <title><?php
             if(!isset($_SESSION)) {
        session_start();
    }
            switch ($_SESSION['lang']){
                case 'fr':
                    echo "Editer votre profil";
                    break;

                case 'eng':
                    echo "Edit your profile";
                    break;
            }
            ?></title>
    </head>

    <body>
    <header>
    <?php include("header.php"); ?>
    </header>

            <h1> <?php
                 if(!isset($_SESSION)) {
        session_start();
    }
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Editer votre profil";
                        break;

                    case 'eng':
                        echo "Edit your profile";
                        break;
                }
                ?></h1></header>

    	<section>
        <p><?php
            if(!isset($_SESSION)) {
        session_start();
    }
            switch ($_SESSION['lang']){
                case 'fr':
                    echo "Bonjour, vous pouvez modifier votre profil ici !";
                    break;

                case 'eng':
                    echo "Hi, care to edit your profile ? It's down there ! ";
                    break;
            }
            ?></p>

        <div id=soussection>
        <div class="Contact">
            <form method="post" action="index.php?action=profileEdited">

                <fieldset>
                <legend><h2><?php
                         if(!isset($_SESSION)) {
        session_start();
    }
                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo "Changer votre contact";
                                break;

                            case 'eng':
                                echo "Change your contact information";
                                break;
                        }
                        ?></h2></legend>
                <p>
                    <h3><label for="phone"><?php
                             if(!isset($_SESSION)) {
        session_start();
    }
                            switch ($_SESSION['lang']){
                                case 'fr':
                                    echo "Portable";
                                    break;

                                case 'eng':
                                    echo "Mobile phone";
                                    break;
                            }
                            ?></label> : <input type="tel" name="phone" id="phone" /></h3>
                    <h3><label for="email">E-mail</label> : <input type="email" name="email" id="email" /></h3>
                    <h3><label for="emergency"><?php
                             if(!isset($_SESSION)) {
        session_start();
    }
                            switch ($_SESSION['lang']){
                                case 'fr':
                                    echo "Contact d'urgence";
                                    break;

                                case 'eng':
                                    echo "Emergency contact";
                                    break;
                            }
                            ?></label> : <input type="text" name="emergency" id="emergency" /></h3>

                    <h3><input type="submit" value="<?php
                         if(!isset($_SESSION)) {
        session_start();
    }
                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo "Enregistrer";
                                break;

                            case 'eng':
                                echo "Save information";
                                break;
                        }
                        ?>" /></h3>
                </p>
                </fieldset>
            </form>

        </div>



        </section>

    <footer>
        <?php require "footer.php"?>
    </footer>
    </body>
