<?php include("design/editProfile.css");?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../design/editProfile.css" />
        <title>Editer votre profil</title>
    </head>

    <body>
    	<header>
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="">Votre profil</a></li>
                <li><a href="">Pièces</a></li>
                <li><a href="">Urgence</a></li>
                <li><a href="">Catalogue</a></li>
                <li><a href="">Consommation</a></li>
                <li><a href="">Forum</a></li>
                <li><a href="">FAQ</a></li>
            </ul>

             <div class="deconnexion">
                 <a href="">Déconnexion</a></li>
             </div>

            <h1> Editer votre profil</h1></header>

    	<section>
        <p>Bonjour, vous pouvez <em>modifier</em> <strong>votre profil</strong> ici!</p>

        <div id=soussection>
        <div class="Contact">
            <form method="get" action="traitement.php">

                <fieldset>
                <legend><h2>Changer votre contact</h2></legend>
                <p>
                    <h3><label for="numportable">Portable</label> : <input type="tel" name="numportable" id="numportable" /></h3>
                    <h3><label for="email">E-mail</label> : <input type="email" name="email" id="email" /></h3>
                    <h3><label for="urgence">Contact d'urgence</label> : <input type="text" name="urgence" id="urgence" /></h3>

                    <h3><input type="submit" value="Enregistrer" /></h3>
                </p>
                </fieldset>
            </form>

        </div>

        <div class="Photo">
    	   <form method="post" action="page.php" enctype="multipart/form-data">

                <fieldset>
                <legend><h2>Changer votre photo de profil</h2></legend>

    	           <p>
                    <label for="photo">Choisir votre photo (JPG, PNG ) :</label><br />
                    <h3> <input type="file" name="photo" /> </h3>
                    <h3><input type="submit" value="Enregistrer" /></h3>
                    </p>
                </fieldset>
            </form>
        </div>
        </div>

        </section>

        <div class=temporaire>
            <h4> <a href="">Ajouter une profil temporaire</a></h4>
        </div>
    	<a href="https://openclassrooms.com">OpenClassrooms</a>

    <p>
    Voici une photo que j'ai prise lors de mes dernières vacances à la montagne :<br />
    <img src="montagne.jpg" alt="Photo de montagne" title="C'est beau les Alpes quand même !" />
    <img src="../design/logoca.JPG" id="logo" alt="Logo CA">
	</p>

        <footer>

            <p>
            <ul> 
                <li><a href="" id="mention">Mentions légales</a></li>
                <li><a href="" id="Apropos">A Propos</a></li>
                <li>Created by</li>
                <li><img src="..design/logo.jpg" id="logo" alt="Logo CA"></li>
                

                
            </ul>
            </p>

        </footer>
    </body>



</html>