<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Login Chatroom</title>
    <meta name="author" content="Marc Gaetano">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/login.js"></script>
</head>

<body>
    <h1>Formulaire d'inscription</h1>
    <hr>


    <form action="signup.php" method="post" onsubmit="return checkform()" onreset="resetform()">
        Choisissez votre login (minimum 3 caractères, uniquement des lettres minuscules ou majuscules)
        <br>
        <input id="log" type="text" name="login">
        <br><br> Choisissez votre mot de passe (minimum 4 caractères)
        <br>
        <input id="pass1" type="password" name="password1">
        <br> Répétez votre mot de passe
        <br>
        <input id="pass2" type="password" name="password2">
        <br><br>
        <input type="submit" value="S'inscrire">
        <input type="reset" value="Annuler">
    </form>

    <div id="erreur" style="visibility: hidden">

    </div>
</body>

</html>
