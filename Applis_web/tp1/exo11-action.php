<?php

	# retourne une chaîne de caractères indiquant
	# le résultat, où '$i' et '$j' sont les nombres
	# dont il fallait deviner la valeur du produit
	# et '$n' la valeur proposée par l'utilisateur
	function resultatoperation($n,$i,$j) {
		if ($n == $i*$j) {
			return "Bravo, vous avez trouvé le résultat! $i i $j = $n";
		} elseif ($n < $i*$j) {
			return "C'est plus! $i x $j = ".$i*$j;
		} else {
			return "C'est moins! $i x $j = ".$i*$j;
		}
	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 11</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 11</h1>
		<hr>
		<p>
			<?php echo resultatoperation($_GET["n"],$_GET["i"],$_GET["j"]); ?>
		</p>
		<p>
			<a class="bouton" href="exo11-formulaire.php">Autre multiplication</a>
		</p>
	</body>
</html>
