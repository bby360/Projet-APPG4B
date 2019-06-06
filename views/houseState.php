<!DOCTYPE html>
<html lang="fr">
<?php
if(!isset($_SESSION)) {
session_start();
} ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Etat de la Maison</title>
</head>
<body>

<?php 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=004B");
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$data = curl_exec($ch);
	curl_close($ch);

	$data_tab = str_split($data,33);
	echo "Données des capteurs :<br />";
	$size=count($data_tab);
	for($i=0 ;$i<$size-1;$i++){
		$trame = $data_tab[$i];   // décodage avec des substring
		$t = substr($trame,0,1);
		$o = substr($trame,1,4);  // ...// décodage avec sscanf
        list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        if $c = 51 {
            echo "A $hour votre capteur de température indiquait $v degrée(s)"
        }
		echo("Trame ".($i+1)." : $c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br/>");
    }
    
    
?>
</body>
</html>