<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<title>Page d'accueil</title>

<style>
    header {
        position: relative;
    }
    header ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #00497A;
    }
    header li {
        float: left;
    }
    header li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    header li:last-child{
        float:right;
    }
    header li a:hover {
        background-color: #77B5FE;
    }
    header nav li:hover .submenu{
        display: inline-block;
        position: absolute;

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
        width: 30px;
        height: 30px;
    }
    li:first-child{
        width: 70px;
        height:50px;
    }
    .active {
        background-color: #303030;
    }
    .subMenu{
        display none;
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
            <li><a href="index.php?action=see_home"><img src="./designs/pictures/G4B.png" id="logo"></a></li>
            <li><a href="index.php?action=see_home">Accueil</a></li>
            <li><a href="index.php?action=profil">Votre profil</a></li>
            <ul class="subMenu">
                <li> <a href="index.php?action=profil"> Voir mon profil</li>
                <li> <a href="index.php?action=seeRoom">Ajouter un profil temporaire</li>
            </ul>
            <li><a href="index.php?action=rooms">Pièces</a>
                <ul class="submenu">
                    <li> <a href="#"> Ajouter une pièce</li>
                    <li> <a href="index.php?action=temporaryGuest">Voir mes pièces</li>
                </ul>
            <li><a href="#">Urgence</a></li>
            <li><a href="index.php?action=catalogue">Catalogue</a></li>
            <li><a href="#">Consommation</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
        </ul>
    </nav>
</header>
</body>
