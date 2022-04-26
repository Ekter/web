<?php

	// retourne une chaîne de caractères identique
	// à '$nom' mais avec tous les caractères en
	// minuscule et avec la première lettre en majuscule
	function normalize($nom) {
		
    }
    
	// lit le fichier '$student_file' et retourne un tableau
	// associatif de la forme [ ID => [ PRENOM , NOM ], ... ]
	// où ID est l'identifiant, PRENOM le prénom et
	// NOM le nom de l'étudiant
	function student_array($student_file) {
		
	}
	
	// lit le fichier '$score_file' et retourne un tableau
	// associatif de la forme [ ID => [ NOTE1, NOTE2, NOTE3 ], ... ]
	// où ID est l'identifiant, et NOTE1, NOTE2 et NOTE3 les trois
	// notes obtenues par l'étudiant
	function score_array($score_file) {
		
	}
	
	// retourne la moyenne des valeurs
	// contenues dans le tableau '$tabnotes'
	function average($tabnotes) {
		
    }
    
    // retourne le TR adéquat qui contient successivement dans
	// les sept TD successifs l'identifiant, le prénom, le nom,
    // les trois notes, la moyenne de ces notes et le lien
    // pour pouvoir modifier les informations de l'étudiant
	function student_score($id,$info,$score) {
		
    }
    
    // retourne les TR adéquats qui contiennent successivement
    // les informations des étudiants sélectionnés suivant la
    // valeur de '$name' :
    // - si '$name' est le prénom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est le nom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est la chaîne vide, l'étudiant est sélectionné
    function table_content($name,$students,$scores) {
       
    }

	// retourne le contenu de l'élément HTML FORM
	// pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
    function form_content($id,$students,$scores) {
       
    }

    // sauve le tableau associatif '$array' dans le
	// fichier '$file' au format CSV. Le tableau est de
	// la forme [ ID => INFO ] où INFO est un tableau de
	// valeurs (associatif ou pas)
	function save_array($array, $file) {
		
	}

	// modifie le contenu du tableau '$students' en associant les
	// valeurs '$firstnme' et '$lastname' aux clefs 'prenom' et 'nom'
	// pour la clef '$id'
    function update_student_array(&$students,$id,$firstname,$lastname) {
      
    }

	// modifie le contenu du tableau '$scores' en associant les
	// valeurs '$score1', '$score2' et '$score3' à la clef '$id'	
    function update_score_array(&$scores,$id,$score1,$score2,$score3) {
	  
    }
    
    $STUDENT_FILE = "exo5-6/students.csv";
    $SCORE_FILE = "exo5-6/scores.csv";

?>
