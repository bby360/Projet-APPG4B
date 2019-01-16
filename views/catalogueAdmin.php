<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Catalogue Administrateur</title>
    <link rel="stylesheet" type="text/css" href="designs/css/catalogueAdmin.css" />
</head>
<body>
<header>
    <?php require "headerAdmin.php"?>
</header>


<section>
        <h1> Catalogue</h1>

    <a href="indexAdmin.php?action=addSensors">
        <button class="button" id="ad"> Ajouter un capteur </button>
    </a>

    <form method="post" action="indexAdmin.php?action=deleteSensors">
        <table>

            <thead>
            <tr>
                <td><h3>Référence</h3></td>
                <td><h3>Type de produit</h3></td>
                <td><h3>Consommation</h3></td>
                <td><h3>Prix</h3></td>
                <td><h3>Supprimer</h3></td>
            </tr>
            </thead>

            <tbody>
            <?php foreach($sensors as $sensors) { ?>
                <tr>
                    <td>
                        <a href="index.php?action=detailedSensors&id=<?=$sensors["idProduit"];?>"><?= $sensors["idProduit"];?>
                    </td>
                    <td>
                        <?= $sensors["typeProduct"];?>
                    </td>
                    <td>
                        <?= $sensors["consumption"];?>
                    </td>
                    <td>
                        <?= $sensors["price"];?>
                    </td>
                    <td>
                        <input type="checkbox" name="delete" id="delete" value=<?= $sensors["idProduit"];?>><br>
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
            <input type="submit" value="Supprimer">
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
