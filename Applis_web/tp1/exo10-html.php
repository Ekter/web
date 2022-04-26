<?php

# retourne le code HTML (une chaîne de caractères)
# correspondant à un élément SELECT dont l'attriobut
# 'name' vaut '$name' et contenant '$max' éléments
# OPTION
function select($name, $max)
{
	$html = "<select name='$name'>";
	for ($i = 0; $i < $max; $i++) {
		$html .= "<option value='$i'>" . ($i + 1) . "</option>";
	}
	$html .= "</select>";
	return $html;
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
	<h1>TP 1 - Exo 8</h1>
	<hr>
	<form action="exo10.php" method="get">
		Jour :
		<?php
		echo select("jour", 31);
		?>
		<br><br>
		Mois :
		<?php
		echo select("mois", 12);
		?>
		<br><br>
		Année : <input type="text" name="annee" />
		<br><br>
		<input type="submit" value="Envoyer" />
	</form>
</body>

</html>