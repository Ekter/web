//  On veut réaliser une page HTML qui permette de jouer au jeu "deviner un nombre". Le jeu s'effectue dans la page HTML : l'utilisateur saisit ses propositions dans un élément INPUT et le résultat est affiché sur la page elle-même. Il est possible de jouer plusieurs parties de suite et d'afficher les statistiques après chaque partie :

//  le nombre total de parties jouées
//  le nombre moyen d'essais sur toutes les parties jouées
//  le nombre d'essais de la meilleure partie (de la partie dans laquelle l'utilisateur a deviné le nombre avec le moins d'essais)

// Ces statistiques doivent être mise à jour :

//  dans la page HTML elle-même
//  après chaque partie

// Après chaque partie, une fenêtre de confirmation (affichée par la fonction confirm) demande à l'utilisateur s'il veut jouer une nouvelle partie. 

// le nombre d'essais dans la partie courante
var essais = 0;
// le nombre total d'essais de toutes les parties
var nbEssais = 0;
// le nombre de parties jouées et terminées
var nbParties = 0;
// indique si on est en train de jouer une partie
var partieEnCours = true;
// le nombre à deviner
var secret = generer();
// le nombre d'essais du meilleur jeu
// Number.MAX_SAFE_INTEGER est la plus grande valeur
// entière possible
var meilleurJeu = Number.MAX_SAFE_INTEGER;


// vérifie la proposition de l'utilisateur et :
// - si la proposition est incorrecte, affiche la bonne
//   indication (trop petit ou trop grand)
// - sinon affiche le nombre d'essais qui ont été nécessaires
//   et mets à jour les statistiques
function verifier() {
    var proposition = document.getElementById("proposition").value;
    essais++;
    nbEssais++;
    if (proposition < secret) {
        afficher("C'est plus !", "red");
    } else if (proposition > secret) {
        afficher("C'est moins !", "red");
    } else {
        afficher("Bravo !", "green");
        document.getElementById("question").style.visibility = "visible";
        nbParties++;
        if (meilleurJeu > essais) {
            meilleurJeu = essais;
        }
    }
    afficherStat();
}

// si 'encore' est vrai, démarre une nouvelle partie
// sinon termine le jeu en affichant le message adéquat
function jouerEncore(encore) {
    if (encore) {
        partieEnCours = true;
        secret = generer();
        essais = 0;
        document.getElementById("proposition").value = "";
        document.getElementById("message").innerHTML = "";
        document.getElementById("question").style.visibility = "hidden";
    } else {
        partieEnCours = false;
        document.getElementById("proposition").disabled = true;
        document.getElementById("valider").disabled = true;
        afficher("Vous avez gagné en " + essais + " essais !", "green");
        nbEssais += essais;
        nbParties++;
        if (essais < meilleurJeu) {
            meilleurJeu = essais;
        }
    }
}

// affiche un message dans une couleur donnée
// dans l'élément prévu à cet effet avec id=message
function afficher(message, couleur) {
    document.getElementById("message").innerHTML = message;
    document.getElementById("message").style.color = couleur;
}

// met à jour les statistiques sous cette forme: 
/* <p id="stat">
Nombre de parties : <span id="nbParties">0</span>
<br />
Nombre moyen d'essais : <span id="nbMoyenEssais">0</span>
<br />
Meilleur jeu : <span id="meilleurJeu">0</span>
</p> */
function afficherStat() {
    document.getElementById("nbParties").innerHTML = nbParties;
    document.getElementById("nbMoyenEssais").innerHTML = nbEssais / nbParties;
    document.getElementById("meilleurJeu").innerHTML = meilleurJeu;
}

// retourne un nombre aléatoire dans l'intervalle [1, 100]
function generer() {
    var nombre = Math.floor(Math.random() * 100) + 1;
    console.log(nombre);
    return nombre;
}