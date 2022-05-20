window.onload = function() {

    // les noms des fichiers images
    var sources = ["paysage-1.jpg", "paysage-2.jpg", "paysage-3.jpg",
        "paysage-4.jpg", "paysage-5.jpg", "paysage-6.jpg",
        "paysage-7.jpg", "paysage-8.jpg", "paysage-9.jpg"
    ];

    // l'indice de l'image actuellement visible
    var indice = 0;

    // affiche l'image suivante
    function next() {
        indice = (indice + 1) % sources.length;
        document.getElementById("show").src = "images/" + sources[indice];;
    }

    // affiche l'image précédente
    function previous() {
        indice = (indice - 1 + sources.length) % sources.length;
        document.getElementById("show").src = "images/" + sources[indice];
    }

    // ici, il faut relier le JS à l'évènement "onclick" sur
    // les deux "flèches" (les images)
    // voici leur code html:
    // 	<p id="image">
    // 	<img class="arrow" src="images/arrow-left.jpg" alt="flèche" />
    // 	<img id="show" src="images/paysage-1.jpg" alt="Paysage" />
    // 	<img class="arrow" src="images/arrow-right.jpg" alt="flèche" />
    // </p>
    document.getElementById("image").onclick = function(event) {
        var target = event.target;
        if (target.className == "arrow") {
            if (target.src.match("left")) {
                previous();
            } else {
                next();
            }
        }
    }
};