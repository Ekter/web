<?php

    # retourne le code HTML (une chaîne de caractères)
    # correspondant à un élément SELECT dont l'attriobut
    # 'name' vaut '$name' et contenant '$max' éléments
    # OPTION
	function select($name,$max) {

	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 1 - Exo 8</title>
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

?>
			<br><br>
			Mois : 
<?php

?>
			<br><br>			
			Année : <input type="text" name="annee" />
			<br><br>
			<input type="submit" value="Envoyer" />
		</form>
	</body>
</html>
