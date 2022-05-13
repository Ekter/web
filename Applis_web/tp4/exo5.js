
// le nombre d'essais dans la partie courante
var essais = 0;
// le nombre total d'essais de toutes les parties
var nbEssais = 0;
// le nombre de paties jouées et terminées
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

}

// si 'encore' est vrai, démarre une nouvelle partie
// sinon termine le jeu en affichant le message adéquat
function jouerEncore( encore ) {

}

// affiche un message dans une couleur donnée
// dans l'élément prévu à cet effet
function afficher( message, couleur ) {

}

// met à jour les statistiques
function afficherStat() {

}

// retourne un nombre aléatoire dans l'intervalle [1, 100]
function generer() {

}
