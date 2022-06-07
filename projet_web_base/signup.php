<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <meta name="author" content="Marc Gaetano">
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <link rel="stylesheet" href="../css/tp3.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Inscription</h1>
        <hr>
        <form id="log" action="dosignup.php" method="post">
            Choisissez votre login (uniquement des lettres minuscules ou majuscules)
            <br>
            <input type="text" name="login">
            <br><br>
            Choisissez votre mot de passe (minimum 4 caractères)
            <br>
            <input type="password" name="password1">
            <br>
            Répétez votre mot de passe
            <br>
            <input type="password" name="password2">
            <br><br>
            <input type="submit" value="S'inscrire">
            <input type="reset" value="Annuler">
        </form>
        <?php
            if (isset($_GET['badsignup'])) {
                $badsignup = $_GET['badsignup'];
                switch ($badsignup) {
                    case 1:
                        echo '<p class="error">Le login ne contient pas que des lettres</p>';
                        break;
                    case 2:
                        echo '<p class="error">Le login est déjà utilisé</p>';
                        break;
                    case 3:
                        echo '<p class="error">Le mot de passe a moins de 4 caractères</p>';
                        break;
                    case 4:
                        echo '<p class="error">Le mot de passe et la vérification sont différents</p>';
                        break;
                }
            }

        ?>
        <!-- button to redirect to signin.php if the user has already an account -->
        <a href="signin.php">Déjà inscrit ?</a>
    </body>
</html>
