Exercice 1)

2) Les boites qui doivent changer sont les boites `body` et `section` pour la taille (passage à 100% de largeur), et `.cols` pour ne mettre qu'une colonne sur l'écran(enlever la flottabilité).

3) La media query à utiliser est : ```@media screen and (max-width: 800px)```


Exercice 2)

1) On doit insérer la feuille de style css avec sa requete associée dans un attibut `media=`

2) Les boites qui changeront de style sont les boites du menu de navigation(menu caché par défaut, et rendu visible par survolement de la souris), et la division `#twitterfeed` (placement en bas de l'écran).

3) Le sous-menu se place pile au bon endroit car chaque bloc li fait 18 (taille des blocs ) + 4(2\*2 de border)=22px. Il faut donc faire 22\* numéro de ligne _2 de border pour que le sous-menu soit au bon endroit. Ainsi, pour un sous-menu de la deuxieme entrée, il faut 42, et pour la troisième, 64.

