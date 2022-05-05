<?php
function inputbox($i, $r = 0)
{
	echo "<input type='hidden' name='i' value='$i' />";
	echo "<input type='hidden' name='r' value='" . ($r + 1) . "' />";
	echo "Votre proposition : <input type='int' name='n'/>";
	echo "<input type='submit' value='Tester'>";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 1 - Exo 12</title>
	<meta name="author" content="Marc Gaetano">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 12</h1>
	<hr>
	<!-- <form action="exo12.php" method="get"> -->
	<?php
	if (isset($_GET['r'])) {
		$r = $_GET['r'];
		$i = $_GET['i'];
		$n = $_GET['n'];
		if ($n == $i) {
			echo "<h2>Bravo, vous avez trouvé la réponse ! Vous avez eu besoin de $r essais!</h2>";
			echo "<form action='exo12.php' method='get'>";
			echo "<input type='submit' value='Recommencer'>";
		} else {
			echo "<h2>Je pense à un nombre compris entre 1 et 100... à vous de le deviner !</h2>";
			echo "<form action='exo12.php' method='get'>";
			if ($n > $i) {
				echo "<h2>$n est trop grand!</h2>";
			} else {
				echo "<h2>$n est trop petit!</h2>";
			}
			inputbox($i, $r);
			// echo $r . " essai(s)";
		}
	} else {
		echo "<h2>Je pense à un nombre compris entre 1 et 100... à vous de le deviner !</h2>";
		echo "<form action='exo12.php' method='get'>";
		inputbox(random_int(1, 100));
	} ?>
	</form>
</body>

</html>