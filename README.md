# Wine Shop

Dites moi si cette architecture vous va ?

## Explications de l'architecture

Le dossier public est le dossier visible sur le web. Il contient tout ce que le navigateur peut demander au serveur : html, css, images et scripts js
Le dossier app n'est pas visible sur le web. C'est le serveur lui même qui charge les fichiers dont il a besoin en fonction de ce que le navigateur lui a demandé. Exemple :

1) Le navigateur demande la page 'produits.php'
2) Le serveur interprète le 'require_once ../app/models/Wine.model.php' qui lui permet de charger les données des vins enregistrés dans la base de données
3) Le serveur injecte les données récupérées de la BDD dans 'produits.php'
4) Le serveur rend le fichier 'produits.php' au navugateur

* Pour afficher les erreurs PHP afin de debugger, il faut utiliser la fonction getDebug() qui se trouve dans ./config/config.php.

* Attention il faut toujours charger './app/app.php' parce qu'il contient les constantes de tous les chemins du projet

* env.ini est le fichier qui contient les infos de connexion à la BDD. Database.php s'occupe de récupérer ces informations et ce fichier est lui même chargé par tous les modèles pour se connecter à la BDD (c'est plus sécurisé de faire ca comme ca).

* Pour l'instant ne pas s'occuper de la partie 'controllers', c'est pas essentiel.