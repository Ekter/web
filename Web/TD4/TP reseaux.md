1)
Les interfaces sont lo et enp0s3. l'IPv4 de enp0s3 est : 10.0.2.15

2)
Avec la commande `host www.i3s.unice.fr`, on trouve que l'IP du site est : 134.59.130.2

3)
Les adresses www.univ-cotedazur.fr et www.mit.edu renvoient respectivement vers https://univ-cotedazur.fr/ et https://www.mit.edu/

4)
https://\<nom du serveur + domaine> / \<chemin> / \<nom de la ressource>

5)
`nmap www.univ-cotedazur.fr` : 5.59sec

`nmap www.mit.edu` : 5.07sec

`nmap www.njcu.edu` : 5.07sec

`nmap ufrj.br` : 32.62sec

Nous remarquons que les serveurs plus proches sont cencés répondre plus vite, mais les serveurs éloignés peuvent répondre tout aussi rapidement en créant des copies de leurs données à différents endroits de la planète.
