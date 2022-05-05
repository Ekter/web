<?php

	// retiourne une chaîne de caractères identique
	// à '$nom' mais avec tous les caractères en
	// minuscule et avec la première lettre en majuscule
	function normalize($nom) {
		$nom = strtolower($nom);
		$nom = ucfirst($nom);
		return $nom;
    }
    
	// lit le fichier '$student_file' et retourne un tableau
	// associatif de la forme [ ID => [ PRENOM , NOM ], ... ]
	// où ID est l'identifiant, PRENOM le prénom et
	// NOM le nom de l'étudiant
	function student_array($student_file) {
		$students = [];
		$file = fopen($student_file, "r");
		while (!feof($file)) {
			$line = fgets($file);
			$line = trim($line);
			if ($line != "") {
				$line = explode(";", $line);
				$students[$line[0]] = [normalize($line[1]), normalize($line[2])];
			}
		}
		fclose($file);
		return $students;
		
	}
	
	// lit le fichier '$score_file' et retourne un tableau
	// associatif de la forme [ ID => [ NOTE1, NOTE2, NOTE3 ], ... ]
	// où ID est l'identifiant, et NOTE1, NOTE2 et NOTE3 les trois
	// notes obtenues par l'étudiant
	function score_array($score_file) {
		$scores = [];
		$file = fopen($score_file, "r");
		while (!feof($file)) {
			$line = fgets($file);
			$line = trim($line);
			if ($line != "") {
				$line = explode(";", $line);
				$scores[$line[0]] = [$line[1], $line[2], $line[3]];
			}
		}
		fclose($file);
		return $scores;
		
	}
	
	// retourne la moyenne des valeurs
	// contenues dans le tableau '$tabnotes'
	function average($tabnotes) {
		$sum = 0;
		foreach ($tabnotes as $note) {
			$sum += $note;
		}
		return $sum / count($tabnotes);
    }
    
    // retourne le TR adéquat qui contient successivement dans
	// les sept TD successifs l'identifiant, le prénom, le nom,
	// les trois notes et la moyenne de ces notes
	function student_score($id,$info,$score) {
		$s = "<tr>";
		$s.= "<td>$id</td>";
		$s.= "<td>".$info[$id][0]."</td>";
		$s.= "<td>".$info[$id][1]."</td>";
		$s.= "<td>".$score[$id][0]."</td>";
		$s.= "<td>".$score[$id][1]."</td>";
		$s.= "<td>".$score[$id][2]."</td>";
		$s.= "<td>".average($score[$id])."</td>";
		$s.= "</tr>";
		return $s;
    }
    
    // retourne les TR adéquats qui contiennent successivement
    // les informations des étudiants sélectionnés suivant la
    // valeur de '$name' :
    // - si '$name' est le prénom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est le nom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est la chaîne vide, l'étudiant est sélectionné
    function table_content($name,$students,$scores) {
		$s = "";
		foreach ($students as $id => $info) {
			if ($name == "" || in_array(normalize($name), $info)) {
				$s.= student_score($id,$students,$scores);
			}
		}
		return $s;
    }

	// retourne le contenu de l'élément HTML FORM
	// pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
    function form_content($id,$students,$scores) {
		echo "<form class='exo6' action='exo6-mod-action.php' method='post'><table><tr><th>ID</th><th>Prénom</th><th>Nom</th><th>Trimestre 1</th><th>Trimestre 2</th><th>Trimestre 3</th><th>Moyenne</th><th>Validation</th></tr><tr>";
		echo student_score($id,$students,$scores);
		echo "</tr></table><input type='submit' value='Valider'></form>";
    }

    // sauve le tableau associatif '$array' dans le
	// fichier '$file' au format CSV. Le tableau est de
	// la forme [ ID => INFO ] où INFO est un tableau de
	// valeurs (associatif ou pas)
	function save_array($array, $file) {
		$file = fopen($file, "w");
		foreach ($array as $id => $info) {
			$line = $id . ";";
			foreach ($info as $value) {
				$line .= $value . ";";
			}
			$line = substr($line, 0, -1);
			fwrite($file, $line . "\n");
		}
		fclose($file);
	}

	// modifie le contenu du tableau '$students' en associant les
	// valeurs '$firstnme' et '$lastname' aux clefs 'prenom' et 'nom'
	// pour la clef '$id'
    function update_student_array(&$students,$id,$firstname,$lastname) {
		$students[$id] = [normalize($firstname), normalize($lastname)];
    }

	// modifie le contenu du tableau '$scores' en associant les
	// valeurs '$score1', '$score2' et '$score3' à la clef '$id'	
    function update_score_array(&$scores,$id,$score1,$score2,$score3) {
		$scores[$id] = [$score1, $score2, $score3];
    }
    
    $STUDENT_FILE = "exo5-6/students.csv";
    $SCORE_FILE = "exo5-6/scores.csv";

?>
