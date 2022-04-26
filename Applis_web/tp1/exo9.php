<?php

# retourne la chaîne '$s' normalisée
# (toutes les lettres en minuscule sauf la première)
function normalize($s)
{
	$s = strtolower($s);
	$s = ucfirst($s);
	return $s;
}

# Teste si les prénom et nom sont bien renseignés et
# retourne le tableau des messages d'erreurs
# (tableau vide s'il n'y a pas d'erreur)
function check_input()
{
	$messages = [];
	if (empty($_GET['prenom'])) {
		$messages[] = "Veuillez renseigner votre prénom";
	}
	if (empty($_GET['nom'])) {
		$messages[] = "Veuillez renseigner votre nom";
	}
	if (empty($_GET['civilite'])) {
		$messages[] = "Veuillez renseigner votre civilité";
	}
	return $messages;
}

# retourne le code HTML (une chaîne de caractères) 
# d'une liste "<ul><li>..</li>..</ul>", les
# éléments de liste contenant les erreurs
# contenues dans le tableau '$errors' 
function display_errors($errors)
{
	$html = "<ul>";
	foreach ($errors as $error) {
		$html .= "<li>$error</li>";
	}
	$html .= "</ul>";
	return $html;
}

# retourne le code HTML (une chaîne de caractères)
# d'un heading "<h2>...</h2>" contenant le message
# de bienvenue en anglais
function display_welcome($h, $c, $p, $n)
{
	$greeting = array(
		0 => "Good morning",
		1 => "Good morning",
		2 => "Good afternoon",
		3 => "Good evening"
	);
	$civ = array(
		"Monsieur" => "Mister",
		"Madame" => "Madam",
		"Mademoiselle" => "Miss"
	);
	return "<h2>" . $greeting[intdiv($h, 6)] . " $civ[$c] $p $n, welcome to Polytech!</h2>";
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>TP 1 - Exo 9</title>
	<meta name="author" content="Marc Gaetano">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 9</h1>
	<hr>
	<?php
	$errors = check_input();
	if (empty($errors)) {
		$prenom = normalize($_GET['prenom']);
		$nom = normalize($_GET['nom']);
		$civilite = $_GET['civilite'];
		echo display_welcome(date("H"), $civilite, $prenom, $nom);
	} else {
		echo display_errors($errors);
	}


	?>
</body>

</html>