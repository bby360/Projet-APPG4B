<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/seeRoom.css" />
</head>
<body>
<header>
    <?php
    include 'header.php';
    ?>
</header>
<section>

    <h1>Liste des pièces</h1>

    <table>
        <?php foreach($rooms as $room) { ?>

            <tr>
                <td align="right">
                    <?= 'Nom de la pièce :';?>
                </td>
                <td>
                    <?=$room["roomName"];?>
                </td>
            </tr>
        <tr>
            <td align="right">
            <?= 'Numéro de la pièce :';?>
            </td>
            <td>
                <?=$room["idRoom"];?>
            </td>
        </tr>

        <tr>
            <td align="right">
                <?= 'Mode de la pièce :'; ?>
            </td>
            <td>
                <?= $room["mode"]; ?>
            </td>
        </tr>
        <tr>
            <td align="right">
                <?= 'Surface de la pièce :';?>
            </td>
            <td>
                <?=$room["surface"],'  ','m²';?>
            </td>
        </tr>
            <tr>
                <td align="right">
                    <?= 'Température manuelle :';?>
                </td>
                <td>
                    <?=$room["tempManu"],'  ','degré';?>
                </td>
            </tr>        <tr>
                <td align="right">
                    <?= 'Température automatique :';?>
                </td>
                <td>
                    <?=$room["tempAuto"],'  ','degré';?>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <?= 'Lumière manuelle :';?>
                </td>
                <td>
                    <?=$room["lumManu"],'  ','lumen';?>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <?= 'Lumière automatique :';?>
                </td>
                <td>
                    <?=$room["lumAuto"],'  ','lumen';?>
                </td>
            </tr>

            <tr>
                <td align="right">
                    <?= '';?>
                </td>
                <td>
                    <?='';?>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <?= '';?>
                </td>
                <td>
                    <?='';?>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <?= '';?>
                </td>
                <td>
                    <?='';?>
                </td>
            </tr>

        <?php } ?>



    </table>


</section>

</body>

</html>