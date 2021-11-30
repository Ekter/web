1)
Si le padding a : `padding: 10px 20px 30px 40px` , alors la longueur totale de boite est de 20+40 pixels de padding + 2\*2 pixels de border + 0 de margin + 200 pixel de contenu = 264 pixels de longueur.

Pour la hauteur, on a : 10+30+2\*2+20=64 pixels.

2)
Avec un margin de 100 pixels vers le bas, un grand espace apparait entre la boite et la suite de l'article.

3)
Les boites sont déjà en block, donc faire un `display: block` ne change pas leur affichage.
Les mettre en inline leur fait occuper uniquement l'espace nécessaire pour leur contenu, et donc les fait rétrécir, de plus, un nouvelle ligne n'est pas créée pour chaque boite.

Les passer en inline-block permet de les mettre sur la même ligne, comme pour inline, mais en conservant leur taille.

5)
Chaque block crée une nouvelle ligne, donc la combinaison {block, inline et inline-block} donne une boite puis deux sur la ligne d'en dessous.
{inline-block, inline et block} met les trois boites sur la même ligne.
{inline, block et inline-block} met deux boites sur la première ligne, et la dernière boite sur une autre ligne.