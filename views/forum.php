<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="designs/css/forum.css" />
</head>
<body>
	<header>
      <?php include("header.php"); ?>
  </header>
    <table>
    <tr>
        <td class="sujet1">
            <p><?php
                session_start();
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Sujet";
                        break;

                    case 'eng':
                        echo "Topic";
                        break;
                }
                ?></p>
        </td>
        <td class="date">
            <p><?php
                session_start();
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Date de création";
                        break;

                    case 'eng':
                        echo "Creation date";
                        break;
                }
                ?></p>
        </td>
        <td class="date">
            <p><?php
                session_start();
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Créé par :";
                        break;

                    case 'eng':
                        echo "Created by :";
                        break;
                }
                ?></p>
        </td>
    </tr>
    </table>
  <table>
    <?php foreach($topics as $topic) { ?>

    <tr>
        <td class="sujet">
            <p><a href="index.php?action=messageForum&amp;idTopic=<?= $topic["idTopic"];?>"><?= $topic["name"];?></a></p>
        </td>
        <td class="date">
            <p><?= $topic["creationDate"];?></p>
        </td>
        <td class="date">
            <p><?= $topic["creationDate"];?></p>
        </td>
    </tr>
    <?php } ?>
  </table>
    <table id="ajout">
    <tr>
        <td>
            <p id='sujet'><?php
                session_start();
                switch ($_SESSION['lang']){
                    case 'fr':
                        echo "Ajouter un topic";
                        break;

                    case 'eng':
                        echo "Write about a new subject";
                        break;
                }
                ?> </p>
        </td>
    </tr>
    <tr>
        <form method="post" name="topic" action="index.php?action=addTopic" onsubmit="return Confirmer();">

            <td>
                <p>
                    <label for="subject"><?php
                        session_start();
                        switch ($_SESSION['lang']){
                            case 'fr':
                                echo "Sujet du topic";
                                break;

                            case 'eng':
                                echo "Topic's subject";
                                break;
                        }
                        ?></label>
                    <input type="text" name="subject" id="subject" />
                </p>
            </td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td>
                <p>
                    <label for="message"><?php
                        session_start();
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
                    <input type="submit" value="<?php
                    session_start();
                    switch ($_SESSION['lang']){
                        case 'fr':
                            echo "Envoyer";
                            break;

                        case 'eng':
                            echo "Send";
                            break;
                    }
                    ?>" />
                </div>
            </td>
        </tr>
    </table>



</body>

<script language='javascript'>
    function Confirmer()
    {
        if (document.topic.subject.value == "") {

            alert("Veuillez ajouter un sujet");
            return false;
        }
        else if (document.topic.message.value == "") {

            alert("Veuillez ajouter un message");
            return false;
        }
        else
        {
            topic.submit();
        }
    }

</script>
