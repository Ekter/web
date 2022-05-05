<?php

	# retourne le code HTML (une chaîne de caractères)
	# d'une table 10x10 contenant les 10 tables de
	# multiplication
	function table() {
		$html = "<table class='exo6'>";
		for ($i=1; $i <= 10; $i++) { 
			$html .= "<tr>";
			for ($j=1; $j <= 10; $j++) { 
				$html .= "<td><strong>$i</strong> x $j = ".($i*$j)."</td>";
			}
			$html .= "</tr>";
		}
		$html .= "</table>";
		return $html;
	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>TP 1 - Exo 5</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp1.css">
	</head>
	<body>
		<h1>TP 1 - Exo 5</h1>
		<hr>
		<?php print table(); ?>
	</body>
</html>
