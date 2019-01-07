<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Consommation</title>
    <link rel="stylesheet" type="text/css"  href="designs/css/consumption.css" />
</head>
<body>
<header>
    <?php require "header.php"?>
</header>

<section>

    <script>
        function move1() {
            var elem = document.getElementById("myBar1");
            var width = 1;
            var id = setInterval(frame, 10);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                } else {
                    width++;
                    elem.style.width = width + '%';
                }
            }
        }

        function move2() {
            var elem = document.getElementById("myBar2");
            var width = 1;
            var id = setInterval(frame, 10);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                } else {
                    width++;
                    elem.style.width = width + '%';
                }
            }
        }

        function move3() {
            var elem = document.getElementById("myBar3");
            var width = 1;
            var id = setInterval(frame, 10);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                } else {
                    width++;
                    elem.style.width = width + '%';
                }
            }
        }
    </script>

    <table>
        <h1> Consommation des capteurs de présence</h1>
        <?php foreach($capteursP as $capteur) { ?>
            <ul>
                <li><?= $capteur["CSumP"];?></li>
            </ul>
        <?php } ?>

        <div id="myProgress">
            <div id="myBar1"></div>
        </div>
        <button onclick="move1()">Click Me</button>

        <h1> Consommation de capteurs de Température</h1>
        <?php foreach($capteursT as $capteur) { ?>
            <ul>
                <li><?= $capteur["CSumT"];?></li>
            </ul>
        <?php } ?>

        <div id="myProgress">
            <div id="myBar2"></div>
        </div>
        <button onclick="move2()">Click Me</button>

        <h1> Consommation des capteurs de Luminosité </h1>
        <?php foreach($capteursL as $capteur) { ?>
            <ul>
                <li><?= $capteur["CSumL"];?></li>
            </ul>
        <?php } ?>

        <div id="myProgress">
            <div id="myBar3"></div>
        </div>
        <button onclick="move3()">Click Me</button>


    </table>

</section>
<footer>
    <?php require "footer.php"?>
</footer>
</body>
</html>
