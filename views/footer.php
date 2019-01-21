<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="./designs/css/footer.css" />
    <title>footer</title>
</head>
<body>

<footer>

    <p>
    <ul>
        <li><a href="" id="mention"><?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo 'Mentions légales';
                        break;

                    case 'eng':
                        echo 'Legal mentions';
                        break;
                }
                ?></a> </li>
        <li><a href="" id="Apropos"><?php

                switch ($_SESSION['lang']){
                    case 'fr':
                        echo 'A propos';
                        break;

                    case 'eng':
                        echo 'About us';
                        break;
                }
                ?></a></li>
        <li>Created by <img src="designs/pictures/logo.jpg" class="logo"></li>
    </ul>
    </p>

</footer>


</body>

</html>
