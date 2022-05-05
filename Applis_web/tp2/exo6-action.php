<?php

	include("exo6.inc.php");
	$STUDENTS=student_array($STUDENT_FILE);
	$SCORES=score_array($SCORE_FILE);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 2 - Exo 6</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/tp2.css">
	</head>
	<body>
		<h1>TP 2 - Exo 6</h1>
        <hr>

		<table>
			<tr>
				<th>ID</th><th>Prénom</th><th>Nom</th><th>Trimestre 1</th><th>Trimestre 2</th><th>Trimestre 3</th><th>Moyenne</th>
			</tr>
<?php
	echo table_content($_GET["nom"],$STUDENTS,$SCORES);

?>
        </table>
        
		<a class="bouton" href="exo6-formulaire.html">Nouvelle recherche</a>
	</body>
</html>
