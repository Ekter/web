window.onload = function() {

    // le "handler" du setTimeout
    let chrono = null;

    // si 'ok' est 'true', alors l'utilisateur
    // a choisi la bonne réponse
    let ok = false;

    // affiche le message 'm' avec la couleur 'c'
    // dans l'élément prévu à cet effet
    function msg(m, c = null) {
        let el = document.getElementById('message');
        el.innerHTML = m;
        if (c) {
            el.style.color = c;
        }
    }

    // cette fonction est appelée à l'issue
    // du setTimeout
    function stop() {
        clearTimeout(chrono);
        chrono = null;
        msg("<b>Temps écoulé!</b>");
    }

    // traite le "clic" sur un bouton radio
    function verifier() {
        if (chrono == null) {
            msg('<b>Fin du chrono</b>');
            return;
        }

        if (this.hasAttribute('data-ok')) {
            msg('Bonne réponse', 'green');
        } else {
            msg('Mauvaise réponse', 'red');
        }
    }

    // ici, on lance le setTimeout et stocke
    // le "handler" dans la variable 'chrono'
    chrono = setTimeout(stop, 5000);
    var arrinput = document.getElementsByTagName('input');
    for (var i = 0; i < arrinput.length; i++) {
        arrinput[i].onclick = verifier;
    }
    msg("", "red");


};