window.onload = function() {
    // Complétez le fichier js/edit.js de façon que le script gallery.php (fourni) produise une galerie d'images des personnages de la série télévisée Les Simpsons qui se comporte comme suit : en cliquant sur une photo, on veut invoquer le script PHP info.php (fourni) via AJAX pour récupérer et afficher les informations relatives au personnage dont on a cliqué l'image.

    // Dans le code HTML produit par le script gallery.php, l'élément div d'identifiant info est l'élément qui va contenir les informations d'un personnage. Dans l'élément d'identifiant gallery, chaque élément img possède un attribut id qui identifie de façon unique le personnage correspondant. Tous les personnages et leurs caractéristiques sont décrits dans le fichier CSV gallery.csv (fourni) dont voici un extrait :

    // 	simpson1,homer.gif,Homer,Simpson,masculin,57,Inspecteur de sécurité à la centrale nucléaire de Springfield
    // 	simpson2,marge.gif,Simpson,Marge,féminin,47,Femme au foyer
    // 	simpson3,bart.gif,Simpson,Bart,masculin,10,Élève à l'école élémentaire de Springfield
    // 	....


    // Le script PHP info.php (fourni) est invoqué avec le paramètre GET id, et retourne les données relatives au personnage correspondant à cet id au format JSON. Si par exemple on invoque le script info.php avec le paramètre id valant simpson2, il retourne la chaîne de caractères suivante :

    // 	{"nom":"Simpson", "prenom":"Marge", "sexe":"féminin", "age":"47", "activite":"Femme au foyer"}


    // Cet objet JSON décrit le personnage de Marge Simpson à l'aide des attributs nom, prenom, sexe, age et activite, personnage identifié par l'attribut id de valeur simpson2. 

    // l'élément d'id 'info' qui contient les
    // informations pour un personnage donné
    let info = document.querySelector("#info");

    // cette fonction place les données regroupées
    // dans le JSON 'data' dans les éléments adéquats, ainsi
    // que le 'src' comme valeur de l'attribut 'src' de
    // l'image adéquate
    function update(data, src) {
        console.log(data);
        data = JSON.parse(data.response);
        console.log(data);
        info.querySelector("#nom").innerHTML = data.nom;
        info.querySelector("#prenom").innerHTML = data.prenom;
        info.querySelector("#sexe").innerHTML = data.sexe;
        info.querySelector("#age").innerHTML = data.age;
        info.querySelector("#activite").innerHTML = data.activite;
        info.querySelector("img").src = "images/" + data.img;
        info.style.visibility = "visible";
    }

    // cette fonction est appelée lorsqu'on clique sur une image.
    // Elle récupère la valeur de l'attribut 'id' et effectue une
    // requête AJAX au script 'info.php' avec cette valeur en paramètre.
    // Elle mets à jour le contenu des éléments adéquat avec les valeurs
    // retournées par le script. en utilisant simpleAjax:
    // function simpleAjax(url,method,parameters,onSuccess,onFailure)
    function showinfo() {
        let id = this.getAttribute("id");
        console.log(id);
        simpleAjax("info.php", "get", "id=" + id, update, null);
    }



    // ici, on ajoute l'évènement 'onclick' sur toutes les images
    // et on lie la fonction 'showInfo' à cet évènement
    let imgs = document.querySelectorAll("img");
    for (let i = 0; i < imgs.length; i++) {
        imgs[i].onclick = showinfo;
    }



    // ici, on ajoute l'évènement 'onclick' sur l'élément
    // d'id 'info' et on lie à cet évènement la fonction
    // qui cache cet élément
    let info_elem = document.querySelector("#info");
    info_elem.onclick = function() {
        info_elem.style.display = "none";
    }

};