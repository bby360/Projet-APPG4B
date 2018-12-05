<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Pièce</title>
	<link rel="stylesheet" type="text/css" href="piece.css" />
</head>
<body>
	 <img id="fond" src="photo.jpg"> 
	<header class="header">
		 <?php include("header.php"); ?>
	</header>
	<section>
		
	
			<ul id="menuvertical">           
            <li id="salon"><a href="#">SALON</a>
                <ul>
                    <li id="bureau"><a href="index.php?action=salon&amp;piece=bureau">BUREAU</a></li>
                    <li><a href="index.php?action=salon&amp;piece=cuisine">CUISINE</a></li>
                    <li><a href="index.php?action=salon&amp;piece=chambre1">CHAMBRE 1 </a></li>
                    <li><a href="index.php?action=salon&amp;piece=chambre2">CHAMBRE 2</a></li>
                </ul>
            </li>                       
        </ul>
	<form action="./model.php" method="post"> 
		<div id="mode"> 
			<p>Mode de gestion de la pièce : </br></p>
			<input type="radio" name="mode" value="automatique" id="automatique" checked="checked" /> <label for="automatique">Automatique</label>
			<input type="radio" name="mode" value="manuel" id="manuel" /> <label for="manuel">Manuel</label>
		</div>

		<div id="lumiere_auto">
			luminosité &nbsp &nbsp
			0% <input type="range" name="lumiere_auto" value="15" max="100" min="0" step="5"> 100%
			<div id="lumiere_manuel">
				luminosité &nbsp &nbsp
    			0% <input type="range" name="lumiere_manuel" value="15" max="100" min="0" step="5">100%
    		</div>
		</div>

		<div id="ouverture_volets">
			<label for="ouverture_volets">horaire ouverture volets &nbsp &nbsp</label>
			<input type="time" name="ouverture_volets">
			<div id="volets_manuel">
				volets &nbsp &nbsp
    			0% <input type="range" name="volets_manuel" value="15" max="100" min="0" step="5">100%
    		</div>
		</div>

		<div id="fermeture_volets">
			<label for="fermeture_volets">horaire fermeture volets &nbsp &nbsp</label>
			<input type="time" name="fermeture_volets">
		</div>

		

		<div id="temperature">	
    		Temperature &nbsp <input type="number" name="temperature" placeholder="°C"  />
    	</div>

    	<div id="valider">
    		<input type="submit" value="Valider" />
    	</div>

    </form>
	</section>
		


	
</body>
</html>
