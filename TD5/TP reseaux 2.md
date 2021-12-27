1)
On observe la requête HTTP envoyée par le navigateur: 
```http
GET / HTTP/1.1
Host: localhost:1234
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:92.0) Gecko/20100101 Firefox/92.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
Accept-Language: fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3
Accept-Encoding: gzip, deflate
Connection: keep-alive
Upgrade-Insecure-Requests: 1
Sec-Fetch-Dest: document
Sec-Fetch-Mode: navigate
Sec-Fetch-Site: none
Sec-Fetch-User: ?1
```

2)
La seule différence est la ligne `GET`: elle devient 
```http
GET /dir1/page1.html HTTP/1.1
```

3)
De nouveau, la ligne `GET` est modifiée:
```http
GET /dir1/page1.html?var1=1&var2 HTTP/1.1
```

4)
Avec la réponse HTTP:
```http
HTTP/1.1 200 OK
Content-type: text/plain
Content-length: 7

bonjour
```
on observe le mot `bonjour` apparaitre dans le navigateur.

5)
La commande à utiliser est `openssl s_client -crlf www.i3s.unice.fr:443` car le port https est le 443, et l'adresse est www.i3s.unice.fr.
La requete HTTP appropriée pour récupérer la page `/~lopezpac/` est:
```http
GET /~lopezpac/ HTTP/1.1
Host: www.i3s.unice.fr
```
Les navigateurs doivent faire un `GET` pour chaque ressource externe.

En passant à la requète HTTP:
```http
GET /~lopezpac HTTP/1.1
Host: www.i3s.unice.fr
```
On reçoit comme réponse un document html nous indiquant que la ressource a été déplacée.

En demandant une page inexistante, la page recue est une page d'erreur 404 Not Found.

6)
L'URL que j'ai pour ouvrir la page `form.html` est `file:///tmp/form.html` (j'ai fait ouvrir et pas enregister).

Les données sont envoyées sur le `localhost` au port 1234.

Voici la réponse HTTP à l'envoi de données:
```http
HTTP/1.1 200 OK
Content-type: text/html
Connection: close

<!DOCTYPE HTML>
<html>
<head></head>
<body><img src="file:///test.png"/></body>
</html>
```
Malheureusement, je n'arrive pas à faire en sorte que le navigateur affiche l'image.

7)
La différence est que la requête est un `POST` et pas un `GET`.

Voici la réponse que j'ai envoyé:
```http
HTTP/1.1 200 OK
Content-type: text/plain
Content-length: 7

bonjour
```

8)
Le navigateur envoie une requête `GET` au port 1235:
```http
GET /test.jpg HTTP/1.1
Host: localhost:1235
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:92.0) Gecko/20100101 Firefox/92.0
Accept: image/webp,*/*
Accept-Language: fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3
Accept-Encoding: gzip, deflate
Connection: keep-alive
Referer: http://localhost:1234/
Sec-Fetch-Dest: image
Sec-Fetch-Mode: no-cors
Sec-Fetch-Site: cross-site
```
