// le tableau qui contient le chemin
// du fichier image pour chaque image
var array = [];

// si clicked[i] == true alors array[i] est visible
var clicked = [];

// pour décider si un clic est
// un premier clic ou non
var first_click = true;

// l'indice de la première image cliquée
var first_index = 0;

// le nombre total de paires de clics
var clicks_number = 0;

// the nombre de paires de clics réussis
// (les paires de clics qui ont découvert
// des images identiques)
var good_clicks_number = 0;

// affecte à l'attribut src des deux images d'indice i et j
// le source de l'image "point d'interrogation"
function hide(i, j) {
    console.log("hidden");
    console.log(i);
    console.log(j);
    document.getElementsByTagName('img')[i].src = "images/question-mark.png";
    document.getElementsByTagName('img')[j].src = "images/question-mark.png";
}

// gère le clic sur l'image d'indice n
function on_click(n) {
    n = n.target.getAttribute('alt');
    console.log(array);
    this.src = this.name;
    if (first_click) {
        first_click = false;
        first_index = n;
    } else {
        if (array[n] == array[first_index] && n != first_index) {
            good_clicks_number++;
            clicked[n] = true;
            clicked[first_index] = true;
            first_click = true;
            clicks_number++;
            if (good_clicks_number == array.length / 2) {
                alert("Bravo, vous avez gagné!");
            }
        } else {
            setTimeout(hide, 2000, n, first_index);
            first_click = true;
            clicks_number++;
        }
    }
}

// rempli le tableau array avec la valeur de
// l'attribut 'name' des images
function init() {
    var arrimg = document.getElementsByTagName('img');
    for (var i = 0; i < arrimg.length; i++) {
        array[i] = arrimg[i].getAttribute('name');
        arrimg[i].onclick = on_click;
        arrimg[i].alt = i;
    }
}

window.onload = init;