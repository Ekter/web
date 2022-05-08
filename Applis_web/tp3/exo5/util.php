<?php
	
	
	// Etant donnés la langue ($lang qui vaut "fr", "en" ou "it")
	// et la page ($page qui vaut "index", "products" ou "contact")
	// cette fonction retourne un tableau associatif contenant tous
	// les couples (clef,information) contenus dans le fichier
	// correspondant
	function get_content($lang,$page)
	{
		$content = array();
		foreach( file("$lang/$page.txt") as $line )
		{
			$line = trim($line);
			if( $line != "" )
			{
				$line = explode("#",$line);
				$content[ $line[0] ] = $line[1];
				print_r($content);
				print("\n");
			}
		}
		return $content;
	}

	session_start();

	// à compléter
	// Dans cette partie, il faut
	// - démarrer/reprendre une session
	// - stocker dans le tableau $_SESSION
	//   la langue
	// Par défaut, la langue est le français
	isset($_GET["lang"]) ? $lang = $_GET["lang"] : $lang = "fr";
	$_SESSION["lang"]=$lang;
