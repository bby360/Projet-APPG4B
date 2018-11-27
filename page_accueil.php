
<?php 
session_start();

$req = $bdd -> prepare('SELECT id_client FROM clients WHERE email=?');    /*on recupere l'id du l'utilisateur pour le mettre dans SESSION[id]*/
$req -> execute(array($_POST['email'])):
while($data = $req->fetch()){
  $_Session['id']=$data['id_client'] ;
}
 ?>

<!DOCTYPE html>

<html>
<head>
 <meta charset="utf-8" />
 <title>Page d'accueil</title>
 <link rel="stylesheet" type="text/css" href="page_accueil.css" />
</head>
<body>
  <img id="fond" src="photo.jpg">
 <header>  
   <ul>
    <li><a href="">Accueil</a></li>
    <li><a href="">Votre profil</a></li>
    <li><a href="">Pièces</a></li>
    <li><a href="">Catalogue</a></li>
    <li><a href="">Consommation</a></li>
    <li><a href="">Forum</a></li>
    <li><a href="">FAQ</a></li>
    <li><a href="">Urgence</a></li>
  </ul>
  <div class="deconnexion">
   <a href="">Déconnexion</a>
 </div>

</header>

<section>

 <div class="en-tete">
   <div class="info">
    <ul>
      <li>Jean Dupond</li>
      <li>3 Avenue de Genève</li>
      <li> Annecy 74000</li>
    </ul>           	 
  </div>
  <div class="photo">

  </div>
</div>
<div class="salon"><a href="piece.html">
  <div class="text">
    <p>SALON</p>            
  </div>
</a>
</div>
<div class="bureau"><a href="bureau.html">            
  <div class="text">
    <p>BUREAU</p>            
  </div>
</a>
</div>
</section>

<footer>
  <ul>
   <li><a href="">Mentions légales</a></li>
   <li><a href="">A Propos</a></li>
   <li><a href="">Created by</a></li>
 </ul>
</footer>  
</body>
</html>
