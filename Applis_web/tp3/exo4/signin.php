<?php
    // à compléter
    // Ici, on doit définir correctement la variable $action
    // utilisée plus bas :
    // si on passe le paramètre "goto" au script, l'action
    // doit être "dosignin.php" avec ce même paramètre "goto"
    // sinon l'action doit être le script "goto" sans paramètre


    $redirect = $_GET['goto'] ?? "";
    if($redirect == ""){
        $action = "dosignin.php";
    }else{
        $action = "dosignin.php?goto=".$redirect;
    }

    
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 3 - Exo 3</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="../css/tp3.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>TP 3 - Exo 3</h1>
		<hr>	

		<h2>Authentification</h2>
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
	if ( isset( $_GET[ "badlogin" ] ) )
		echo "<h2>Mauvais login/mot de passe </h2>";
?>
	</body>
</html>