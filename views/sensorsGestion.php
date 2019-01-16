<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Gestion des capteurs</title>
    <link rel="stylesheet" type="text/css" href="designs/css/sensorsGestion.css" />
</head>
<body>
<header>
    <?php require "headerAdmin.php"?>
</header>


<section>
    <h1> Gestion des capteurs </h1>

    <form method="post" action="indexAdmin.php?action=deleteAlert">
    <table>

        <thead>
        <tr>
            <td><h3>Client</h3></td>
            <td><h3>Référence capteurs</h3></td>
            <td><h3>Type capteur</h3></td>
            <td><h3>Type d'alerte</h3></td>
            <td><h3>Message</h3></td>
            <td><h3>Pris en charge</h3></td>
        </tr>
        </thead>

        <tbody>
        <?php foreach($sensorsG as $sensorsG) { ?>
            <tr>
                <td>
                    <a href="index.php?action=detailedSensors&id=<?=$client["idClient"];?>">
                </td>
                <td>
                    <a href="index.php?action=detailedSensors&id=<?=$sensorsG["idCapteur"];?>"><?= $sensorsG["idCapteur"];?>
                </td>
                <td>
                    <?= $sensorsG["type"];?>
                </td>
                <td>
                    <?= $sensorsG["typeAlerte"];?>
                </td>
                <td>
                    <?= $sensorsG["message"];?>
                </td>
                <td>
                    <input type="checkbox" name="delete" id="delete" value="sensors"><br>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>
    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Supprimer les capteurs séléctionnés</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <p>Attention, vous allez supprimer tous les capteurs!</p>
            <p> En êtes-vous sûr?</p>
            <span class="cancel"><button id="bouton">Annuler</button></span>
            <a href="indexAdmin.php?action=deleteSensors"><button id="bouton">Supprimer</button></a>
        </div>

    </div>
    </form>

    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("cancel")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</section>

<footer>
    <?php require "footer.php"?>
</footer>

</body>
</html>
