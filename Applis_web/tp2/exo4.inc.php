<?php
    
    // remplit les tableaux '$day', '$month' et '$lang'
    // à partir des informations contenues dans les fichiers
    // '*.txt' contenus dans le répertoire '$folderpath'
    function fillArrays($folderpath,&$day,&$month,&$lang) {
        $files = scandir($folderpath);
        foreach ($files as $file) {
            if (substr($file, -4) == '.txt') {
                $filepath = $folderpath . '/' . $file;
                $filecontent = file_get_contents($filepath);
                $filecontent = explode(';', $filecontent);
                $day[] = $filecontent[0];
                $month[] = $filecontent[1];
                $lang[] = $filecontent[2];
            }
        }
        echo "c";
    }

    // pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
	function makeRadio($keyval,$name) {
        $radio="<div>";
        echo "b";
        foreach ($keyval as $key => $val) {
            $radio .= '<input type="radio" name="' . $name . '" value="' . $key . '">' . $val . '<br>';
            $radio .= "\n";
            echo "a";
        }
        $radio .= "</div>";
        return $radio;
    }

    // retourne une chaîne de caractères qui donne
    // la date dans la langue déterminée par le code '$langue'    
    function makeDate($langue,$jour,$mois) {
		return $jour[$langue][date("w")] ." ".date("d") ." " . $mois[$langue][date("n")] . " " . date("Y");
    }

    $LANGUE = [];
    $JOUR = [];
    $MOIS = [];

    fillArrays("exo4",$JOUR,$MOIS,$LANGUE);
?>
