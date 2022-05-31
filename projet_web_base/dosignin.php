<?php
	session_start();
	// à compléter
	// Dans cette partie, on teste le login et le mot de passe :
	// - on teste si le login proposé existe bien 
	// - on teste si le mot de passe correspond
	// En cas de succès :
	// - si le paramètre "goto" existe, on redirige l'utilisateur vers le script
	//   qui est la valeur de ce paramètre
	// - sinon on redirige l'utilisateur vers "page1.php"
	// En cas d'échec, on redirige l'utilisateur vers la page de login
    $login = $_POST['login'];
    $password = $_POST['password'];

    foreach (file('database/userlist.csv') as $line) {
        $line = trim($line);
        $tab = explode(',', $line);
        if (strcmp($tab[0], $login) == 0 && strcmp($tab[1], hash("md5",$password)) == 0) {
            $_SESSION['user'] = $login;
			header("Location: index.php");
		exit();
        }
    }
    // echo json_encode($_SESSION);
    header('Location: signin.php?badlogin=true');
