<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>DeclarerAlerte</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/declarerAlerte.css" />
</head>
<body>
<header>
    <?php include("header.php"); ?>
</header>

<table>
    <?php foreach($capteurs as $capteur) { ?>
    
         <tr id='info'> 
            <td id="select">  
            </td>  
            <td class="tab1">
                <p><?= $capteur["idRoom"];?></p>
            </td>
            <td class="tab3">
                <p><?= $capteur["type"];?></p>
            </td>
            <td class="tab4">
                <a href="index.php?action=commenterAlerte&capteur=<?= $capteur["type"];?>&idCapteur=<?= $capteur["idCapteur"];?>" > <input type="button" value="declarer alerte"> </a>

            </td>
        </tr>
    <?php } ?>
   
</table>




