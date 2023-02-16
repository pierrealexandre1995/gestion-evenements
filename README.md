# Gestion Evènements


## 1 - Technologies utilisés :

 - [Langage : PHP 8.1.10](https://www.php.net/releases/8.1/en.php)
 - [Framework : Symfony 6.1.12](https://symfony.com/doc/current/index.html)
 - [Base de données : PostgreSQL 15.2](https://www.postgresql.org/docs/current/index.html)


## 2 - Installation : lancer les commandes

 - Modifier le mot de passe de la base de données dans le ficher .env (Actuel mot de passe : root)
 - Créer la base de données avec la commande : php bin/console `doctrine:database:create`
 - Créer les tables de la base de données : php bin/console `doctrine:migrations:migrate`
 - Aller dans le repertoire contenant le projet
 - Lancer : `symfony serve` ou `php -S localhost:8000 -t public`
 - Puis ouvrir votre navigateur et aller dans [http://localhost:8000/api](http://localhost:8000/api) pour voir le dashboard de l'api

 




## 3 - Documentation

[Documentation](https://linktodocumentation)

CRUD Evenement et Ajout inscrition à un evenenment :
         
         - Lister tout : http://localhost:8000/api/evenement/ GET
         - Voir un évènement : http://localhost:8000/api/evenement/{id} GET
         - Ajouter évènement : http://localhost:8000/api/evenement/ POST 
           data:{
                        "dateDeDebut": date,
                        "dateDeFin": date,
                        "nombreParticipantMax": nombre,
                        "nombreInscrit": nombre
                }
         - Modifer évènement : http://localhost:8000/api/evenement/{id} PUT 
           data:{
                        "dateDeDebut": date,
                        "dateDeFin": date,
                        "nombreParticipantMax": int,
                        "nombreInscrit": int
                }
         - Voir un évènement : http://localhost:8000/api/evenement/{id} DELETE

         - Faire Inscription :
          - Ajouter une personne à un évènement : http://localhost:8000/api/evenement/faire_inscription POST 
           data:{
                        "nom": string,
                        "prenom": string,
                        "email": string,
                        "telephone": string,
                        "evenement": identifiant de l'evenement
                }
           - Liste des persones : http://localhost:8000/apifos/inscriptions GET


Remarque = Les entrés inputs POST et PUT doivent etre en format [JSON](https://developer.mozilla.org/fr/docs/Learn/JavaScript/Objects/JSON)

## 4 - Outils utilisé
 - [Doctrine](https://symfony.com/doc/current/doctrine.html)
 - [API Platform](https://api-platform.com/)
 - [FOSRestBundle](https://github.com/FriendsOfSymfony/FOSRestBundle)
## 5 - Authors

- [@rakotonindrinapierre](https://www.github.com/rakotonindrinapierre)

Quelques bugs à reporter, n'hesitez pas à me contacter : [rakotonindrinapierre@gmail.com](mailto:rakotonindrinapierre@gmail.com)

## 6 - Outils IDE et Tests

 - Visual Studio Code
 - PostMan
## 7 - Quelques Captures d'écrans

Liste des evenements
![Liste des evenements](https://raw.githubusercontent.com/pierrealexandre1995/gestion-evenements/main/screenshots/1.png)


Evenements ajouter à la base de données
![Evenements ajouter à la base de données](https://raw.githubusercontent.com/pierrealexandre1995/gestion-evenements/main/screenshots/2.png)

![Faire Inscription](https://raw.githubusercontent.com/pierrealexandre1995/gestion-evenements/main/screenshots/4.png)


Liste des inscriptions
![Liste des inscriptions](https://raw.githubusercontent.com/pierrealexandre1995/gestion-evenements/main/screenshots/5.png)


Erreur inscription car l'evenement est complet
![Erreur inscription car l'evenement est complet](https://raw.githubusercontent.com/pierrealexandre1995/gestion-evenements/main/screenshots/6.png)



