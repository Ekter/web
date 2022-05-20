window.onload = function() {

    // affiche le nombre "t" dans le span "spanElt"
    // "t" a au plus deux chiffres
    function afficher(t, spanElt) {
        var s = t.toString();
        if (s.length == 1) {
            s = "0" + s;
        }
        spanElt.children[0].src = "images/" + s[0] + ".png";
        spanElt.children[1].src = "images/" + s[1] + ".png";
    }

    // met à jour les images de l'horloge
    // à chaque seconde
    function tictac() {
        var d = new Date();
        let spans = document.getElementsByTagName("span");
        afficher(d.getHours(), spans[0]);
        afficher(d.getMinutes(), spans[1]);
        afficher(d.getSeconds(), spans[2]);
    }

    // ici, il faut lancer l'horloge
    setInterval(tictac, 5);
};