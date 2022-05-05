<?php

	# retourne le nom du jour de la semaine
	# correspondant à '$week', le  numéro du
	# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
	function jour() {
		$var=date("N");
		switch ($var) {
			case 1:
				return "lundi";
				break;
			case 2:
				return "mardi";
				break;
			case 3:
				return "mercredi";
				break;
			case 4:
				return "jeudi";
				break;
			case 5:
				return "vendredi";
				break;
			case 6:
				return "samedi";
				break;
			case 0:
				return "dimanche";
				break;
			default:
				return "jour";
				break;
		}
	}

	# retourne le nom du mois correspondant à '$month',
	# le  numéro du mois (1 -> janvier, 2 -> février, ...)
	function mois() {
		$var=date("n");
		switch ($var) {
			case 1:
				return "janvier";
				break;
			case 2:
				return "février";
				break;
			case 3:
				return "mars";
				break;
			case 4:
				return "avril";
				break;
			case 5:
				return "mai";
				break;
			case 6:
				return "juin";
				break;
			case 7:
				return "juillet";
				break;
			case 8:
				return "août";
				break;
			case 9:
				return "septembre";
				break;
			case 10:
				return "octobre";
				break;
			case 11:
				return "novembre";
				break;
			case 12:
				return "décembre";
				break;
			default:
				return "mois";
				break;
		}
	}


?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 2</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 2</h1>
		<hr>
		<h2> <?php print "Nous sommes le ".jour()." ".date("j")." ".mois()." ".date("Y")?> </h2>
	</body>
</html>
