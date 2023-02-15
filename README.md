Ce projet est un projet pour un test de Bocasay
Auteur : Rakotonindrina Pierre Alexandre

1 - Technologies utilisés : 
        - Langage : PHP 8.1.10
        - Framework : Symfony 6.1.12
        - Base de données : PostgreSQL 15.2

2 - Installation : lancer les commandes
        - Modifier le mot de passe de la base de données dans le ficher .env (Actuel mot de passe : root)
        - Créer la base de données avec la commande : php bin/console doctrine:database:create
        - Créer les tables de la base de données : php bin/console doctrine:migrations:migrate
        - Aller dans le repertoire contenant le projet
        - Lancer : `symfony serve` ou `php -S localhost:8000 -t public`
        - Puis ouvrir votre navigateur et aller dans http://localhost:8000/api pour voir le dashboard de l'API

4 - Les fonctionnalités
        - CRUD Evenement :
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
          - Ajouter évènement : http://localhost:8000/api/inscription/ POST 
           data:{
                        "nom": string,
                        "prenom": string,
                        "email": string,
                        "telephone": string,
                        "id_evenement": string,
                }

5 - Outils utilisé : 
        Doctrine 2.0
        API Platform pour le rest
