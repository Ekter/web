// teste si les champs du formulaire sont corrects et :
// - si ils le sont, retourne 'true'
// - sinon, affiche le message d'erreur adéquat dans
//   l'emplacement prévu à cet effet, et retourne 'false'
function checkform() {
    var log = document.getElementById("log").value;
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    if (log.length < 3) {
        errormsg("Le nom d'utilisateur doit contenir au moins 3 caractères");
        return false;
    }
    const regex = /[a-zA-Z]/gm;
    while ((m = regex.exec(user)) !== null) {
        // This is necessary to avoid infinite loops with zero-width matches
        if (m.index === regex.lastIndex) {
            regex.lastIndex++;
        }

        // The result can be accessed through the m-variable.
        m.forEach((match, groupIndex) => {
            c++;
        });
    }
    if (c < log.length) {
        errormsg("Le nom d'utilisateur doit contenir seulement des lettres");
        return false;
    }
    if (pass1.length < 4) {
        errormsg("Le mot de passe doit contenir au moins 4 caractères");
        return false;
    }
    if (pass1 != pass2) {
        errormsg("Les mots de passe ne correspondent pas");
        return false;
    }
    return true;
}

// efface le contenu de l'élément où on affiche
// les messages d'erreur et cache cet élément.
// Le form est:
/* <form action="exo4-action.php" method="post" onsubmit="return checkform()" onreset="resetform()">
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
</form> */
function resetform() {
    document.getElementById("log").value = "";
    document.getElementById("pass1").value = "";
    document.getElementById("pass2").value = "";
    document.getElementById("log").focus();
    document.getElementById("erreur").innerHTML = "";
    document.getElementById("erreur").style = "visibility: hidden";
}

// écrit 'msg' dans l'élément où on affiche
// les messages d'erreur et montre cet élément
function errormsg(msg) {
    document.getElementById("erreur").innerHTML = msg;
    document.getElementById("erreur").style = "block";

}