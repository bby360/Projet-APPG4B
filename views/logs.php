<!DOCTYPE html>
<html lang="fr">
<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./designs/css/logs.css" />
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="./designs/css/logs.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log</title>
</head>

<header>
<?php include("header.php"); ?>
</header>

<body class="body">
    <div id="affichage">
	<?php 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=004B");
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$data = curl_exec($ch);
	curl_close($ch);

	$data_tab = str_split($data,33);
	?>
	<div data-splitting>Les données des capteurs</div>
	<?php
	$size=count($data_tab);
	for($i=$size-4 ;$i<$size-1;$i++){
		$trame = $data_tab[$i];  // décodage avec sscanf
		list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
		if ($c=='3') {
            echo "À $hour h$min votre capteur de température indiquait " .round(hexdec($v)). " degrée(s):<br />";
		}
		else if($c=='5' & $v=='1') {
			echo "À $hour h$min votre capteur de luminosité indique qu'il fait clair:<br />";
		}
		else if($c=='5' & $v=='0') {
			echo "À $hour h$min votre capteur de luminosité indique qu'il fait sombre:<br />"; 
		}
		else if($c=='7' & $v=='1') {
			echo "À $hour h$min votre capteur de presence  indique qu'il y a quelqu'un:<br />"; 
		}
		else if($c=='7' & $v=='0') {
			echo "À $hour h$min votre capteur de presence  indique qu'il n'y a personne:<br />"; 
		}
		else { echo"Pas de valeur <br />";}
		//echo("Trame ".($i+1)." : $c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br/>");
    }   
?>
</div>
<footer>
    <?php require "footer.php"?>
</footer>
</body>

</html>