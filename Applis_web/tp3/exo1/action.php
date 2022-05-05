<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 3 - Exo 1</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="../css/tp3.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>TP 3 - Exo 1</h1>
		<hr>

		<h2>Multiplication</h2>
		<p>
<?php
    // à compléter
    if ($_SESSION['result']==$_GET['utilisateur']) {
		echo "Bravo, ".$_SESSION['calcul'][0]."x".$_SESSION['calcul'][1]."=".$_SESSION['result']."!";
	} else {
		echo "Faux : ".$_SESSION['calcul'][0]."x".$_SESSION['calcul'][1]."=".$_SESSION['result'].", pas ".$_GET['utilisateur'];
	}
?>
		</p>
		<p>
			<a href="formulaire.php">Autre multiplication</a>
		</p>
	</body>
</html>
