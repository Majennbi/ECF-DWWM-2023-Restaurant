
# Le quai antique - restaurant web app

Le Chef Arnaud Michant aime passionnément les produits - et producteurs - de la Savoie.
C’est pourquoi il a décidé d’ouvrir son troisième restaurant dans ce département : Le Quai Antique.

Cette application a donc été conçue pour permettre au Chef Michant de promouvoir son nouveau restaurant ainsi que d'inciter les clients à venir découvrir sa succulente cuisine. 


## Lien vers la version en ligne de l'application

https://restaurant-app-majennbidev.herokuapp.com
## Lien vers le GitHub de l'application

https://github.com/Majennbi/ECF-DWWM-2023-Restaurant
### Vérifiez que pouvez utiliser symfony sur votre machine

    symfony check:requirements
## Installation en local

Dans votre terminal de commande, vérifiez que vous pouvez utiliser symfony sur votre machine :

    symfony check:requirements

Créez ensuite votre dossier : 

    mkdir VotreDossier

Puis accédez à ce dossier : 

    cd VotreDossier

Vous pouvez alors cloner le dépôt git : 

    git clone https://github.com/Majennbi/ECF-DWWM-2023-Restaurant.git

Vous pouvez maintenant accéder aux fichiers en faisant : 

    cd ECF-DWWM-2023-Restaurant
### Installation des dépendances

    composer install
### Création de la base de données en local

Commencez par décommenter la ligne 33 du fichier .env dans le dossier /vendor
Ensuite, vous pouvez créer la base de données :

    php bin/console doctrine:database:create

Puis effectuez les migrations : 

    php bin/console doctrine:migrations:migrate

Et générez les fixtures : 

    php bin/console doctrine:fixtures:load

Si vous le souhaitez vous pouvez également importer directement la base de données en utilisant
le fichier le_quai_antique.sql
### Lancement du serveur symfony

Pour accéder à l'application, vous n'avez plus qu'à lancer symfony :

    symfony server:start
## Utilisation de l'application

Maintenant que vous avez accès au site en local, vous avez la possibilité de vous inscrire en renseignant les informations du formulaire sur la page dédiée. Vous faites maintenant partie des utilisateurs du site. De prochaines fonctionnalités arrivent !
## Créer un administrateur

L'administrateur se connecte via le formulaire de connexion avec ses identifiants. La création d'un profil administrateur n'est pas possible depuis le FRONT. 
Pour la création, il faut renseigner dans votre terminal : 

    php bin/console app:create-administrator

Une fois les informations renseignées, vous pouvez vous rendre sur la page de connexion et utiliser vos identifiants de connexion. 
Lorsque vous êtes connecté, cliquez sur votre nom dans le menu pour accéder au panneau d'administration ! 
## Fonctionnalités administrateur

Via le panneau d'administration, l'administrateur peut gérer le contenu de l'application : 

- Gérer les utilisateurs
- Gérer les plats de la carte
- Gérer les réservations
- Gérer les horaires d'ouverture
## Note de fin

Des nouvelles fonctionnalités vont être développées prochainement afin de rendre cette application la plus pertinente possible. 

Stay tuned! :) 