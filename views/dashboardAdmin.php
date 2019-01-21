<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="designs/css/dashboardAdmin.css" />
</head>
<body>
<img id="fond" src="./designs/pictures/fondAdmin.jpg">
<header>
    <?php include("headerAdmin.php"); ?>

    <?php require 'isConnectedAdmin.php';
?>
</header>

<section>


    <div class="clients"><a href="indexAdmin.php?action=clients">
            <div class="text">
                <p>CLIENTS</p>
            </div>
        </a>
    </div>

    <div class="faq"><a href="indexAdmin.php?action=faqAdmin">
            <div class="text">
                <p>FAQ</p>
            </div>
        </a>
    </div>

    <div class="forum"><a href="indexAdmin.php?action=forum">
            <div class="text">
                <p>FORUM</p>
            </div>
        </a>
    </div>

    <div class="alertes"><a href="indexAdmin.php?action=sensorsGestion">
            <div class="text">
                <p>ALERTES</p>
            </div>
        </a>
    </div>

</section>

<footer>
    <?php include("footer.php"); ?>
</footer>
</body>
</html>
