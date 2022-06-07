<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Authentification</title>
	<meta name="author" content="Marc Gaetano">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<h1>Authentification</h1>
	<hr>

	<form id="log" action="dosignin.php" method="post">
		Votre login
		<br>
		<input type="text" name="login">
		<br><br>
		Votre mot de passe
		<br>
		<input type="password" name="password">
		<br><br>
		<input type="submit" value="Se connecter">
		<input type="reset" value="Annuler">
		<!-- bouton to redirect to signup -->
	</form>
	<a href="signup.php">Pas encore inscrit ?</a>
	<?php
	if (isset($_GET["badlogin"]))
		echo "<h2>Mauvais login/mot de passe </h2>";
	?>
</body>

</html>