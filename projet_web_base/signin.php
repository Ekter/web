<?php
// à compléter
// Ici, on doit définir correctement la variable $action
// utilisée plus bas :
// si on passe le paramètre "goto" au script, l'action
// doit être "dosignin.php" avec ce même paramètre "goto"
// sinon l'action doit être le script "goto" sans paramètre

$action = "dosignin.php";


?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 3 - Exo 3</title>
	<meta name="author" content="Marc Gaetano">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<h1>Authentification</h1>
	<hr>

	<form action="<?php echo $action; ?>" method="post">
		Votre login
		<br>
		<input type="text" name="login">
		<br><br>
		votre mot de passe
		<br>
		<input type="password" name="password">
		<br><br>
		<input type="submit" value="Se connecter">
		<input type="reset" value="Annuler">
	</form>
	<?php
	if (isset($_GET["badlogin"]))
		echo "<h2>Mauvais login/mot de passe </h2>";
	?>
</body>

</html>