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
            <p>Sujet</p>
        </td>
        <td class="date">
            <p>Date de création</p>
        </td>
        <td class="date">
            <p>Crée par</p>
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
            <p id='sujet'>Ajouter un topic </p>
        </td>
    </tr>
    <tr>
        <form method="post" action="index.php?action=addTopic">
            <td>
                <p>
                    <label for="subject">Sujet du topic</label> : <input type="text" name="subject" id="subject" />
                </p>
            </td>
        </tr>
        <tr>
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
                    <input type="submit" value="Ajouter" />
                </div>
            </td>
        </tr>
    </table>



</body>