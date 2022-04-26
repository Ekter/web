<?php

function inputbox()
{
	$i = random_int(2, 10);
	$j = random_int(2, 10);
	echo "Quel est le résultat de l'opération $i x $j ? <input type='int' name='n'/>";
	echo "<input type='hidden' name='i' value='$i' />";
	echo "<input type='hidden' name='j' value='$j' />";
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
	<form action="exo11-action.php" method="get">
		<?php inputbox() ?>
	</form>

</body>

</html>