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
            <p id='ajouter'>Répondre à la discussion </p>
        </td>
    </tr>
    <tr>
        <form method="post" action="index.php?action=addMessage&amp;idTopic=<?= $message["idTopic"];?>">
        <td>
            <p>
                <label for="pseudo">Votre pseudo</label> : <input type="text" name="pseudo" id="pseudo" />
            </p>
        </td>
    </tr>
    <tr>

        <td>

                <p>
                    <label for="message">Votre message</label><br />
                    <textarea name="message" id="message" rows="10" cols="50"></textarea>
                </p>
        </td>
    </tr>
    <tr>
        <td>
            <div id="repondre">
                <input type="submit" value="Répondre" />
            </div>
        </td>
    </tr>
</table>


