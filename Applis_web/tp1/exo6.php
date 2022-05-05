<?php

# retourne le code HTML (une chaîne de caractères)
# d'une table '$n'x'$n' représentant un échiquier
# alternant cases blanches et noires
function table($n = 8)
{
	$html = "<table class='exo7'>";
	for ($i = 0; $i < $n; $i++) {
		$html .= "<tr>";
		for ($j = 0; $j < $n; $j++) {
			$html .= "<td class='";
			if (($i + $j) % 2 == 1) {
				$html .= "blanc";
			} else {
				$html .= "noir";
			}
			$html .= "'></td>";
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
	<title>TP 1 - Exo 6</title>
	<meta name="author" content="Marc Gaetano">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 6</h1>
	<hr>
	<p>
		<?php
		if (isset($_GET['n'])) {
			$n = $_GET['n'];
		} else {
			$n = 8; // Default value
		}


		echo "<h2>Echiquier " . $n . "x" . $n . "</h2>";
		echo table($n);
		?>


</body>

</html>