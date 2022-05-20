window.onload = function() {

    // affiche la source de l'image cliquée dans l'image
    // d'id "realsize" et le texte dans l'élément d'id "text"
    function show() {
        console.log("a");
        document.getElementById("realsize").src = this.src;

    }

    // ici, il faut relier la fonction "show" à l'évènement "onmouseover"
    // sur toutes les images ayant la classe "miniature"
    var images = document.getElementsByClassName("miniature");
    for (var i = 0; i < images.length; i++) {
        images[i].onmouseover = show;
    };
};