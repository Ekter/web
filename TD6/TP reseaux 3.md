Exercice 1: APIs REST et JSON

1)
Création de cours:
```http
POST /cours HTTP/1.1
Host: www.rest-exemple.fr/
nom_cours : peinture
```

2)
Modification du nom d'un cours:
```http
PUT /123456789A/name HTTP/1.1
Host: www.rest-exemple.fr/
nom_cours : arts-plasiques
id_cours : 123456789A
```

3)
Obtention des informations du cours:
```http
GET /cours HTTP/1.1
Host: www.rest-exemple.fr/
id_cours : 123456789A
```

4)
Obtention de la liste des cours:
```http
GET /cours HTTP/1.1
Host: www.rest-exemple.fr/
```

Réponse serveur:
```http
HTTP/1.1 200 OK
Content-Type: application/json

{"cours":
    [
      {
        "id_cours": "123456789A",
        "nom_cours": "arts-plasiques",
        "nombre_participants": 0,
        "facultatif": true
      },
        {
            "id_cours": "123456789B",
            "nom_cours": "peinture",
            "nombre_participants": 100,
            "facultatif": false
        }
    ]
}
```

Exercice 2: Manipulation d'objets JSON en Java

J'ai choisi d'indenter l'affichage pour que ce soit plus lisible lorsque les JSONArray sont imbriqués.
