<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<?php include("isConnectedAdmin.php"); ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="designs/css/forum.css" />
</head>
<body>
	<header>
      <?php include("headerAdmin.php"); ?>
  </header>
    <table>
         
    <tr>
        <td class="sujet1">
            <p>Sujet</p>
        </td>
        <td class="date">
            <p>Date de création</p>
        </td>
        
    </tr>
    </table>
  <table>
    <?php foreach($topics as $topic) { ?>
    <form method="post" action="indexAdmin.php?action=supTopic" name="supprimer">
    <tr>
        <td id="select">
               <input type="checkbox" name="select" value='<?= $topic["idTopic"];?>' id="select">
            </td> 
        <td class="sujet">
            <p><a href="indexAdmin.php?action=messageForum&amp;idTopic=<?= $topic["idTopic"];?>"><?= $topic["name"];?></a></p>
        </td>
        <td class="date">
            <p><?= $topic["creationDate"];?></p>
        </td>
       
    </tr>
    <?php } ?>


  </table>
    <div id="valider">
        <input type='button' value='Confirmer' onClick='Confirmer()'>
    </div>
    </form>
    <table id="ajout">
    <tr>
        <td>
            <p id='sujet'>Ajouter un topic </p>
        </td>
    </tr>
    <tr>
        <form method="post" action="indexAdmin.php?action=addTopic">
            <td>
                <p>
                    <label for="subject">Sujet du topic</label> : <input type="text" name="subject" id="subject" />
                </p>
            </td>
        </tr>
        <tr>

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
                    <input type="submit" value="Ajouter" />
                </div>
            </td>
        </tr>
    </table>
    </form>


</body>

<script language='javascript'>
    function Confirmer()
    {
        if (confirm("Souhaitez-vous vraiment supprimer ce topic ?"))
        {
            supprimer.submit();
        }
    }

</script>
