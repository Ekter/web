<?php

	# si '$N' est premier, retourne '$N'
	# sinon retourne le plus petit diviseur
	# de '$N'. Par exemple :
	# - premier(13) -> 13
	# - premier(35) -> 5
	function premier($N) {
		for ($i=2; $i <= $N; $i++) { 
			if ($N%$i==0){
				return $i;
			}
		}
		return $N;
	}

	# retourne une chaîne de caractères du type :
	# - "Le nombre N est premier" si '$N' est premier
	# - "Le nombre N n'est pas premier car multiple de D"
	#   si '$N' est divisible par un nombre D (et donc, pas premier)
	function resultat($N) {
		$D = premier($N);
		if ($D == $N) {
			return "Le nombre $N est premier";
		} else {
			return "Le nombre $N n'est pas premier car multiple de $D";
		}

	}

?>