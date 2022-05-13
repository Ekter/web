var x; // le premier nombre de la multiplication
var y; // le deuxième nombre de la multiplication

// donne le rôle du bouton :
// si 'verifier' est 'true' alors le prochain clic sur le bouton
// est destiné à vérifier la réponse de l'utilisateur, sinon,
// le clic est destiné à proposer une nouvelle multiplication
var verifier = true;

// génére une nouvelle multiplication, autrement dit :
// - génère deux entiers au hasard dans l'intervalle [1,9]
// - les affiche dans les éléments HTML nombre1 et nombre2
function nouvelle() {
    x = Math.floor(Math.random() * 9) + 1;
    y = Math.floor(Math.random() * 9) + 1;
    document.getElementById("nombre1").innerHTML = x;
    document.getElementById("nombre2").innerHTML = y;
    document.getElementById("bouton").value = "Vérifier";
    document.getElementById("resultat").style = "visibility: hidden";
}

// cette fonction est appelée quand l'utilisateur clique
// sur le bouton. La fonction a deux rôles alternatifs :
// - vérifier que la proposition de l'utilisateur est correcte
// - générer une nouvelle multiplication
// Cette alternance est gérée à l'aide de la variable 'verifier'
function valider() {
    if (verifier) {
        var proposition = parseInt(document.getElementById("proposition").value);
        if (proposition == x * y) {
            document.getElementById("resultat").innerHTML = "Bravo, la bonne réponse était " + x + " * " + y + " = " + proposition;
        } else {
            document.getElementById("resultat").innerHTML = "Désolé, la bonne réponse était " + x + " * " + y + " = " + proposition;
        }
        document.getElementById("resultat").style = "block";
        verifier = false;
    } else {
        nouvelle();
        verifier = true;
    }
}

console.log("a")