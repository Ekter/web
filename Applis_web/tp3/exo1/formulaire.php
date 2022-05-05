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
	</head>
<?php
    // à compléter
    $x=rand(1,10);
	$y=rand(1,10);
	$result=$x*$y;
	$_SESSION['result']=$result;
	$_SESSION['calcul']=[$x,$y];
?>
	<body>
		<h1>TP 3 - Exo 1</h1>
		<hr>

		<h2>Multiplication</h2>
			
		<form action="action.php" method="get">
			<?php echo $x; ?> x <?php echo $y; ?> = <input type="text" name="utilisateur">
			<br><br>
			<input type="submit" value="Envoyer">
		</form>

	</body>
</html>
