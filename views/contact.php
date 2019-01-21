<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="designs/css/contact.css" />
</head>
<body>

<header>
    <?php include("header.php"); ?>

</header>

<SECTION>
	<div class='case'>
		<img src="designs/pictures/light.jpg">
		<div class="desc">
			Hotline<br>
            <?php
            session_start();
            switch ($_SESSION['lang']){
                case 'fr':
                    echo "Joignable";
                    break;

                case 'eng':
                    echo "Available";
                    break;
            }
            ?> 24h/24 - 7/7<br>
			+33 6 48 75 96 63
		</div>
	</div>

	<div class='case'>
		<img src="designs/pictures/light.jpg">
		<div class="desc">
			Mail<br>
            <?php
            session_start();
            switch ($_SESSION['lang']){
                case 'fr':
                    echo "Réponse en 24h";
                    break;

                case 'eng':
                    echo "Answer within a day";
                    break;
            }
            ?><br>
			Genius4Buildings@gmail.com
		</div>
	</div>

	<div class='case'>
		<img src="designs/pictures/light.jpg">
		<div class="desc">
            <?php
            session_start();
            switch ($_SESSION['lang']){
                case 'fr':
                    echo "Voie Postale";
                    break;

                case 'eng':
                    echo "Via mail";
                    break;
            }
            ?><br>
            <?php
            session_start();
            switch ($_SESSION['lang']){
                case 'fr':
                    echo "Réponse en une semaine";
                    break;

                case 'eng':
                    echo "Answer within a week";
                    break;
            }
            ?><br>
			1 avenue des champs Elysées<br>
			75008 Paris
		</div>
	</div>


</SECTION>
