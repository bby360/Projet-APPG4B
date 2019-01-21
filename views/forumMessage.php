<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="designs/css/forumMessage.css" />
</head>
<body>
<header>
    <?php include("header.php"); ?>
</header>

<table>
    <?php foreach($messages as $message) { ?>
         <tr id='info'>   
            <td class="tab1">
                <p><?= $message["author"];?></p>
            </td>
            <td class="tab3">
                <p><?= $message["date"];?></p>
            </td>
        </tr>
        <tr class="tab2">
            <td id="message">
                <p><?= $message["message"];?></p>
            </td>
        </tr>
    <?php } ?>
</table>
<table>
    <tr>
        <td>
            <p id='ajouter'><?php
                 if(!isset($_SESSION)) {
        session_start();
    }
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Répondre";
                        break;

                    case 'eng':
                        echo "Answer";
                        break;
                }
                ?> </p>
        </td>
    </tr>
    <tr>
        <form method="post"  name="message" action="index.php?action=addMessage&amp;idTopic=<?= $message['idTopic'];?>" onsubmit="return Confirmer();">


    </tr>
    <tr>

        <td>

                <p>
                    <label for="message"><?php
                         if(!isset($_SESSION)) {
        session_start();
    }
                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo "Votre message";
                                break;

                            case 'eng':
                                echo "Your message";
                                break;
                        }
                        ?></label><br />
                    <textarea name="message" id="message" rows="10" cols="50"></textarea>
                </p>
        </td>
    </tr>
    <tr>
        <td>
            <div id="repondre">
                <input type='submit' value='<?php
                 if(!isset($_SESSION)) {
        session_start();
    }
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Envoyer";
                        break;

                    case 'eng':
                        echo "Send";
                        break;
                }
                ?>'>
            </div>
        </td>
    </tr>
    </form>
</table>

<script language='javascript'>
    function Confirmer()
    {
        if (document.message.message.value == "") {
            alert("Veuillez ajouter un message");
            return false;
        }
        else
        {
            message.submit();
        }
    }

</script>

