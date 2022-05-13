// calcule le prix TTC à partir du prix hors-taxe
// et de la TVA
// affiche une alerte avec un message d'erreur si les
// valeurs fournies ne sont pas des nombres
function prixTTC() {
    var prixHT = parseFloat(document.getElementById("pht").value);
    var tauxTVA = parseFloat(document.getElementById("tva").value);
    var prixTTC = 0;
    if (isNaN(prixHT) || isNaN(tauxTVA)) {
        alert("Veuillez entrer des nombres");
        console.log("Veuillez entrer des nombres");
    } else {
        prixTTC = prixHT + (prixHT * tauxTVA / 100);
        alert("Le prix TTC est de " + prixTTC);
        console.log("Le prix TTC est de " + prixTTC);
    }
}