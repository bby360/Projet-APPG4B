<?php
dbConnect();
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Choix de la maison</title>
    <link rel="stylesheet" type="text/css" href="../designs/css/houseList.css" />
</head>

<body>
<header>
    <?php include "header.php"; ?>
</header>

<h1> Choix de l'habitation </h1><br><br>

<p>L'habitation que vous gérez actuellement est située à l'adresse <?php echo $_SESSION['adress'];?>, <?php echo $_SESSION['postalcode']?></p> <br><br>





</body>
</html>
