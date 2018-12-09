<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/dashboard.css" />
</head>
<body>

<header>
    <?php include("header.php"); ?>

</header>

<section>


    <div class="piece"><a href="index.php?action=room&amp;piece=salon">
            <div class="text">
                <p>PIECES</p>
            </div>
        </a>
    </div>

    <div class="profil"><a href="index.php?action=profil">
            <div class="text">
                <p>PROFIL</p>
            </div>
        </a>
    </div>

    <div class="catalogue"><a href="index.php?action=catalogue">
            <div class="text">
                <p>CATALOGUE</p>
            </div>
        </a>
    </div>

    <div class="consommation"><a href="index.php?action=consommation">
            <div class="text">
                <p>CONSOMMATION</p>
            </div>
        </a>
    </div>

</section>

<footer>
    <?php include("footer.php"); ?>
</footer>
</body>
</html>
