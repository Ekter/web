// étant donnée la moyenne 'm'
// retourne l'appréciation correspondante
// (une chaîne de caractères)

// "très insuffisant" si la moyenne est strictement inférieure à 6
// "insuffisant" si la moyenne est supérieure ou égale à 6 et strictement inférieure à 10
// "moyen" si la moyenne est supérieure ou égale à 10 et strictement inférieure à 13
// "bien" si la moyenne est supérieure ou égale à 13 et strictement inférieure à 16
// "très bien" si la moyenne est supérieure ou égale à 16 et strictement inférieure à 19
// "excellent" si la moyenne est supérieure ou égale à 19
function appreciation(m) {
    var appreciation = "";
    if (m < 6) {
        appreciation = "très insuffisant";
    } else if (m >= 6 && m < 10) {
        appreciation = "insuffisant";
    } else if (m >= 10 && m < 13) {
        appreciation = "moyen";
    } else if (m >= 13 && m < 16) {
        appreciation = "bien";
    } else if (m >= 16 && m < 19) {
        appreciation = "très bien";
    } else if (m >= 19) {
        appreciation = "excellent";
    }
    return appreciation;
}

// calcule la moyenne à partir des trois notes
// et affiche la moyenne et l'appréciation correspondante
// modifie le html avec l'id "resultat" pour y mettre le resultat et le rendre visible
function calculer() {
    var note1 = parseFloat(document.getElementById("note1").value);
    var note2 = parseFloat(document.getElementById("note2").value);
    var note3 = parseFloat(document.getElementById("note3").value);
    var moyenne = (note1 + note2 + note3) / 3;
    console.log("La moyenne est de " + moyenne + " et l'appréciation est " + appreciation(moyenne));
    document.getElementById("resultat").innerHTML = "La moyenne est de " + moyenne + " et l'appréciation est " + appreciation(moyenne);
    document.getElementById("resultat").style = "block";
}