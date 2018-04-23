# Présentation des personnages de Marvel
Présentation des personnages de marvel avec l'utilisation de l'API REST. 	
- Serveur slim framework
- Client Vuejs
- Affichage de 20 personnages à partir du 100ème
- Mise en place d'un système de pagination

## Pré-requis

- PHP >= 5.5
- Composer
- GIT
- Créer un compte sur le site [https://developer.marvel.com/](https://developer.marvel.com/) puis récupérer les clefs public et privé à cette adresse [https://developer.marvel.com/account](https://developer.marvel.com/account)

## Installation

Télécharger ou cloner le dépôt 

	git clone git@github.com:anthHugo/marvel.git && cd marvel

Modifier le fichier `conf.env` en `.env`  puis affecter aux variables `MARVEL_KEY`  `PRIVATE_KEY` respectivement votre clé public et privé

Installer les dépendances

	php composer.phar install

Pour démarrer l'application en développement, lancer cette commande. 

	php composer.phar start
Ouvrir votre navigateur à l'adresse [http://localhost:8080/](http://localhost:8080/)

Lancer cette commande pour lancer les tests

	php composer.phar test


## Todo 

 - Ajout d'un système de favoris avec persistance
 -  Compiler le javascript lors du premier appel de la page
 - Importer les personnages au sein d'une base de données SQL ou NoSQL en fonction des besoins
 - Prévoir une mise en cache des données
