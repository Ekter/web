<?php

	# retourne le nom du jour de la semaine
	# correspondant à '$week', le  numéro du
	# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
	function jour($week) {
		$jour = [ "dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi" ];
		return $jour[$week];
	}


?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 10</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 10</h1>
		<hr>
		<h2> <?php $j=$_GET["jour"];
			$m=$_GET["mois"];
			$a=$_GET["annee"];
		echo "Le $j/$m/$a est un " . jour(date("N", mktime(0, 0, 0, $m, $j, $a)));?></h2>
	</body>
</html>
