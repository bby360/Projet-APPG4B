<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/dashboard.css" />
</head>
<body>
<img id="fond" src="./designs/pictures/photo.jpg">
<header>
    <?php include("headerAdmin.php"); ?>

</header>

<section>


    <div class="piece"><a href="indexAdmin.php?action=clients">
            <div class="text">
                <p>CLIENTS</p>
            </div>
        </a>
    </div>

    <div class="profil"><a href="indexAdmin.php?action=faqAdmin.php">
            <div class="text">
                <p>FAQ</p>
            </div>
        </a>
    </div>

    <div class="catalogue"><a href="indexAdmin.php?action=forumAdmin">
            <div class="text">
                <p>Forum</p>
            </div>
        </a>
    </div>

    <div class="consommation"><a href="indexAdmin.php?action=alertesAdmin">
            <div class="text">
                <p>Gestion Alertes</p>
            </div>
        </a>
    </div>

</section>

<footer>
    <?php include("footer.php"); ?>
</footer>
</body>
</html>
