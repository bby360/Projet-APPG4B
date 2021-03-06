<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>

<html>
<head>
<body>
<?php require 'isConnectedAdmin.php';
?>
    <meta charset="utf-8" />
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/forumMessageAdmin.css" />
</head>

<header>
    <?php include("headerAdmin.php"); ?>
</header>
<form method="post" action="indexAdmin.php?action=supMessage" name="supprimer">
<table>
    <?php foreach($messages as $message) { ?>
         <tr id='info'> 
            <td class="select">
            </td>
            <td class="tab1">
                <p><?= $message["author"];?></p>
            </td>
            <td class="tab3">
                <p><?= $message["date"];?></p>
            </td>
        </tr>
        <tr class="tab2">
            <td class="select">
               <input type="checkbox" name="select" value="<?= $message["idMessage"];?>" id="select">
            </td> 
            <td id="message">
                <p><?= $message["message"];?></p>
            </td>
             <td class="tab3">
            </td> 
        </tr>
    <?php } ?>
    <tr>
            <td id="supprimer">
            <input type='button' value='Supprimer' onClick='Confirmer()'>
            </td>


        </tr>

    </table>

</form>

<table>
    <tr>
        <td>
            <p id='ajouter'>Répondre à la discussion </p>
        </td>
    </tr>
    <tr>
        <form method="post" action="indexAdmin.php?action=addMessage&amp;idTopic=<?= $message["idTopic"];?>">
        
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
</form>
</body>

<script language='javascript'>
    function Confirmer()
    {
        if (confirm("Souhaitez-vous vraiment supprimer ce message ?"))
        {
            supprimer.submit();
        }
    }

</script>
