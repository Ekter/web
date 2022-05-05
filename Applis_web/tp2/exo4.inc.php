<?php
    
    // remplit les tableaux '$day', '$month' et '$lang'
    // à partir des informations contenues dans les fichiers
    // '*.csv' contenus dans le répertoire '$folderpath'
    function fillArrays($folderpath,&$day,&$month,&$lang) {
        $files = scandir($folderpath);
        foreach ($files as $file) {
            if (substr($file, -4) == '.csv') {
                $filepath = $folderpath . '/' . $file;
                $filecontents = file($filepath);


                // echo $filecontent;
                // $filecontents = explode('\n', join('/n', $filecontent));
                $lang[] = trim($filecontents[0]);
                // foreach ($filecontents as $l) {
                //     echo $l;
                // }
                // echo $filecontents[1];
                $day[trim($filecontents[0])]=explode(',',trim($filecontents[1]));
                $month[trim($filecontents[0])]=explode(',',trim($filecontents[2]));
            }
        }
    }

    // pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
	function makeRadio($keyval,$name) {
        $radio="<div>";
        // echo "b";
        foreach ($keyval as $val) {
            $radio .= '<input type="radio" name="' . $name . '" value="' . $val . '">' . $val . '<br>';
            $radio .= "\n";
            // echo "a";
        }

        $radio .= "</div>";
        return $radio;
    }

    // retourne une chaîne de caractères qui donne
    // la date dans la langue déterminée par le code '$langue'    
    function makeDate($langue,$jour,$mois) {
        // echo $jour[$langue][date("w")];
		return $jour[$langue][date("w")] ." ".date("d") ." " . $mois[$langue][date("n")-1] . " " . date("Y");
    }

    $LANGUE = [];
    $JOUR = [];
    $MOIS = [];
    fillArrays("exo4/",$JOUR,$MOIS,$LANGUE);
?>