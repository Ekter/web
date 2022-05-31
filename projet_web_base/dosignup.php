<?php
    // à compléter
    // Ce script vérifie les paramètres envoyés par l'utilisateur
    // et, si ces paramètres sont corrects, réalise le signup puis
    // redirige l'utilisateur vers le script "signup.php",
    // sinon, redirige directement l'utilisateur vers le script
    // "signup.php" avec le bon message d'erreur en paramètre

    // on vérifie que les paramètres ont bien été envoyés
    function verify_password(string $login, string $password)
    {
        //check if the login has only letters
        if (!preg_match("/^[a-zA-Z]*$/", $login)) {
            header("Location: signup.php?badsignup=1");
            exit();
        }
        //check if the password has more than 4 characters
        if (strlen($password) < 4) {
            header('Location: signup.php?badsignup=3');
            exit();
        }

        return true;
    }

    if (isset($_POST['login']) && isset($_POST['password1']) && isset($_POST['password2'])) {

        // on vérifie que les paramètres ne sont pas vides
        if (!empty($_POST['login']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
            if (!($_POST['password1'] == $_POST['password2'])) {
                header('Location: signup.php?badsignup=4');
                exit();
            }
            // on vérifie que les paramètres sont corrects
            if (verify_password($_POST['login'], $_POST['password1'])) {
                // on réalise le signup
                foreach (file('database/userlist.csv') as $line) {
                    $user = explode(',', $line);
                    if ($user[0] == $_POST['login']) {
                        header('Location: signup.php?badsignup=2');
                        exit();
                    }
                }

                $file = fopen('database/userlist.csv', 'a');
                fwrite($file, $_POST['login'] . ',' . hash("md5",$_POST['password1']) . "\n");
                fclose($file);


                // on redirige l'utilisateur vers le script "signup.php"
                header('Location: signin.php');
            }
        }
    } else {
        header('Location: signup.php');
    }
