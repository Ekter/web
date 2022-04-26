<?php

	$JOUR = [
		"lang1" => [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ],
		"lang2" => [ "Domenica", "Lunedì",	"Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato" ],
		"lang3" => [ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" ]
	];
	
	$MOIS = [
		"lang1" => [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
		"lang2" => [ "Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre" ],
		"lang3" => [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]
    ];
    
    $LANGUE = [ "lang1" => "français", "lang2" => "italien", "lang3" => "anglais" ];

    // pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
	function makeRadio($keyval,$name) {
		$s="<div>";
		foreach($keyval as $key => $val) {
			$s.="<fieldset><input type=\"radio\" name=\"$name\" value=\"$key\">$val<br></fieldset>";
		}
		return $s."</div>";
    }

    // retourne une chaîne de caractères qui donne
    // la date dans la langue déterminée par le code '$langue'
    function makeDate($langue,$jour,$mois) {
		return $jour[$langue][date("w")] ." ".date("d") ." " . $mois[$langue][date("n")] . " " . date("Y");
    }
?>