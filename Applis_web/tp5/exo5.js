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
        document.getElementById("show").src = "images/" + sources[indice];
    }


    setInterval(next, 2000);





};