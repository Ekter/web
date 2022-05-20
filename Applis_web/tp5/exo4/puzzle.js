window.onload = function() {
    var images = document.getElementById("puzzle").getElementsByTagName("img");

    // pour distinguer les premiers clics
    // des seconds clics
    let first_click = true;

    // pour stocker la première image cliquée
    let first_image;

    // si "not_finished" est vrai, alors
    // il reste des images à permuter
    let not_finished = true;

    // traîte le clic sur une image
    // echange les images si firstclick est false
    function click_on_image() {
        if (first_click) {
            first_image = this;
            first_click = false;
            this.style.opacity = "0.5";

        } else {
            first_image.style.opacity = "1";
            var tmp = this.src;
            var tmp2 = this.name;
            this.src = first_image.src;
            this.name = first_image.name;
            first_image.src = tmp;
            first_image.name = tmp2;
            first_click = true;

            //refresh images
            images = document.getElementById("puzzle").getElementsByTagName("img");
            if (is_finished()) {
                alert("Bravo !");
            }
        }
    }

    // teste si le puzzle est terminé
    function is_finished() {
        let s = "";
        for (let i = 0; i < images.length; i++) {
            s += images[i].name;
        }
        console.log(s);
        return s == "abcdefghijkl";
    }


    // ici, il faut relier la fonction "clic_on" à l'évènement "onclick"
    // sur toutes les images contenues dans l'élément d'id "puzzle"
    var images = document.getElementById("puzzle").getElementsByTagName("img");
    for (var i = 0; i < images.length; i++) {
        images[i].onclick = click_on_image;
        console.log(images[i]);
    }
    console.log("a");

};