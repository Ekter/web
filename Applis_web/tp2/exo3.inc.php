<?php

// pour comprendre ce que cette fonction doit générer
// regardez le code source HTML du fichier exemple fourni
function makeRadio($keyval, $name)
{
	$s = "<div>";
	foreach ($keyval as $key => $val) {
		$s .= "<fieldset><input type=\"radio\" name=\"$name\" value=\"$key\">$val[0]<br></fieldset>";
	}
	return $s . "</div>";
}

// retourne le nom du pays de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'
function getCountryName($key, $info)
{
	return $info[$key][0];
}

// retourne le nom de la capitale de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'	
function getCapitalName($key, $info)
{
	return $info[$key][2];
}

// retourne l'élément HTML IMG qui est l'image
// du pays de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'	
function getCountryImage($key, $info)
{
	return "<img class='exo2-3' src=\"exo2-3/" . $info[$key][1] . "\" alt=\"" . $info[$key][0] . "\">";
}

// retourne l'élément HTML IMG qui est l'image
// de la capitale de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'
function getCapitalImage($key, $info)
{
	return "<img class='exo2-3' src=\"exo2-3/" . $info[$key][3] . "\" alt=\"" . $info[$key][2] . "\">";
}

$INFO = [];
//// ici on doit remplir le tableau $INFO à partir des données contenues dans le fichier 'exo2-3/data.csv'
foreach (file('exo2-3/data.csv') as $line) {
	$line = trim($line);
	$line = explode(',', $line);
	$INFO[$line[0]] = $line;
}
