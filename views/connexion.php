<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="./designs/css/connexion.css" /> 
</head>
<body>
    <header>
        <h1>VOTRE MAISON A PORTEE DE MAIN</h1>
        <div class="image1"></div>
    </header>
    <section>

        <div>

           
</div> 

<!-- /La boite -->

<div class = "connexion">

   <form method="POST" action="./views/model.php">

<table align="center">
    <tr>
        <td>
           <label>login</label> 
       </td>
       <td>
           <input type="text" name="login" id="login"autofocus>
       </td>
   </tr>
   <tr>
    <td>
       <label>password</label>
   </td>
   <td>
       <input type="text" name="password" id="password" required>
   </td>
</tr>

</table>

</form>

</div>

<img src="">

<div class="sinscrire">
    <a href="inscription.html">S'inscrire</a>
</div>

<div class="mdp_oublie">
    <a href="mdp_oublie.html">Mot de passe oublié</a>
</div>

<div class="catalogue">
    <a href="catalogue.html">Catalogue</a>
</div>

</section>

<footer>
    <ul>
        <li><a href="mentionlegal.php" id="mention">Mentions légales</a></li>
        <li><a href="" id="Apropos">A Propos</a></li>
        <li> Created by</li>
    </ul>
    <div id="triangle"></div>
    <img id="image2" src="logonou.png">
</footer>  
</body>
</html>