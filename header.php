
<!DOCTYPE html>
<html>
<head>
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
            background-color: #00497A;
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

        @media screen and (max-width: 600px){
            ul.topnav li.right,
            ul.topnav li {float: none;}
        }

    </style>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="#"><img src="designs/pictures/G4B.png" id="logo"></a></li>
            <li><a href="index.php?action=see_home">Accueil</a></li>
            <li><a href="index.php?action=profil">Votre profil</a></li>
            <li><a href="index.php?action=rooms">Pièces</a></li>
            <li><a href="#">Urgence</a></li>
            <li><a href="#">Catalogue</a></li>
            <li><a href="#">Consommation</a></li>
            <li><a href="index.php?action=inscription">Forum</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="">Déconnexion</a></li>
        </ul>
    </nav>
</header>
</body>