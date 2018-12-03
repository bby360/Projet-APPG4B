<!DOCTYPE html>
<html>
 <meta charset="utf-8" />
 <title>Page d'accueil</title>

 <style> 
 header {
position: relative;
 }

 ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: #333;
}



li {
	float: left;
}

li a {
	display: block;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
}

li:last-child{
	float:right;
}

li a:hover {
	background-color: #111;
}

nav li:hover .submenu{
	display: inline-block;
	position: absolute;
	top:100%;
	left: 0px;
	padding: 0px;
	z-index: 100000;
}

.submenu li {
	border-bottom: 1px solid #CCC;
}

.submenu li a {
	padding: 15px 30px;
	width: 270px;
}

nav ul li:hover a{
	padding: 15px 30px 20px 30px;
}
#logo{
	width: 100px;
	height: 10px;

}

li:first-child{
	width: 50px;
	height:50px;
}

.active {
	background-color: #303030;
}

.submenu{
	display:none;
}

@media screen and (max-width: 600px){
	ul.topnav li.right,
	ul.topnav li {float: none;}
}

 </style>
<body>
 <header>
  <nav>
   <ul>
	<li><a href="#"><img src="logonou.png" id="logo"></a></li>
	<li><a href="index.php?action=see_home">Accueil</a></li>
	<li><a href="#">Votre profil</a></li>
	<li><a href="index.php?action=rooms">Pièces</a>
	<ul class="submenu">
	<li> <a href="#"> Ajouter une pièce</li>
	<li> <a href="#">Voir mes pièces</li>
	</ul>
	<li><a href="#">Urgence</a></li>
	<li><a href="#">Catalogue</a></li>
	<li><a href="#">Consommation</a></li>
	<li><a href="#">Forum</a></li>
	<li><a href="#">FAQ</a></li>
	<li><a href="">Déconnexion</a></li>
  </ul>
</nav>
</header>
</body>
