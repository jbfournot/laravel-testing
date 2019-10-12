# Introduction

Nous sommes heureux de te savoir intéressé à vouloir travailler avec nous. Ces trois tâches te permettront de nous démontrer tes compétences en programmation, et en analyse des besoins.

Nous souhaitons voir comment tu vas réagir avec un outil et un language de programmation que tu ne connais pas. C'est donc tout à fait approprié de faire du copier/coller depuis du code trouvé sur Internet. Signale nous juste dans un commentaire les liens des sources utilisées.

Pour ces trois tâches, nous allons évaluer la clarté du code, le résultat aux problèmes (est-ce que les solutions proposées corrigent les problèmes).

# Tâches

Nous allons travailler sur une application de gestion de produits d'une entreprise. Les clients de cette entreprise peuvent passer des commandes de produits, et une API REST est disponible pour gérer les produits: `app.dev/products`. Cette API est utilisée par les clients pour connaitre le stock des produits.

## Installation

Pour installer cette application, `php` et `composer` doivent etre installés sur la machine. Lancer la commande `composer install` pour télécharger les dépendances du projet puis executer la commande `php artisan serve` pour démarrer le serveur de développement de Laravel.

## Tâche 1: Rapport des produits expirés par fournisseur

On souhaite modifier le rapport de la liste des produits expirés, c'est à dire, dont le champ `last_refresh_at` date de plus de 1 mois, regroupée par fournisseur. 
Le rapport est déjà disponible à l'adresse principale du site web mais il ne fonctionne pas correctement.

Il faut donc ajuster le fichier [`ReportingController`](app/Http/Controllers/ReportingController.php) en ajoutant le scope `expired` au model [`Product`](app/Models/Product.php). Le scope `expired` doit être créé dans le fichier [`Product`](app/Models/Product.php).

Les variables `$products` et `$suppliers` sont des collections. [Consulter la documentation](https://laravel.com/docs/5.8/collections) pour en apprendre plus sur les collections et regrouper les produits par fournisseur.

Ajuster l'affichage du rapport en modifiant la vue [`productsExpiredReport.blade.php`](resources/views/reports/productsExpiredReport.blade.php)

## Tâche 2: Calcul du stock réel des produits

Le champ `qty` de la table `products` ne prend pas en compte les produits ajoutés au panier par les utilisateurs (table `carts`). On souhaite donc calculer l'inventaire réel disponible et afficher cette information dans un nouvel attribut du modèle [`Product`](app/Models/Product.php) que l'on appellera `qty_available`. Il faudra également afficher ce nouveau champ dans les résultats de l'API en modifiant le fichier [`ProductRessource`](app/Http/Resources/Product.php).

Pour créer un nouvel attribut à un model, consulter [cette page de la documentation](https://laravel.com/docs/5.7/eloquent-mutators#defining-an-accessor). Pour calculer l'inventaire réel, il faut créer une relation entre les tables `products` et `carts`. Deux possibilités: utiliser [Eloquent relationships](https://laravel.com/docs/5.7/eloquent-relationships) ou [ajouter une relation join dans un scope du modèle](https://laravel.com/docs/5.7/eloquent#query-scopes) `Product`.

Ne pas oublier d'ajouter le champ `qty_available` dans les résultats de l'API en modifiant le fichier [ProductRessource](app/Http/Resources/Product.php).

## Tâche 3: Import des produits depuis 

Le client souhaite pouvoir importer manuellement des listes de produits fournies par ses fournisseurs dans son application de gestion. Les exemples de listes sont localisées dans le dossier [`suppliers-data`](/suppliers-data). Le client mentionne que la structure des tableaux est différente pour chaque fournisseur, et qu'il faut ajouter en base de données le nouveau fournisseur **SGO**

Le client souhaite pouvoir uploader ses listes dans le système à chaque début de mois plutôt que  rentrer manuellement les informations. Les listes contiennent des produits nouveaux et d'autres, déjà dans le système. On souhaite surtout importer dans le champ `qty` de notre base de données les inventaires de nos fournisseurs. 

La base de données de l'application est de type SQLITE et est disponible dans le dossier [`database.sqlite`](/database/database.sqlite). Une API REST est aussi disponible pour gérer les produits.

| Method      | URI           
| ----------- |:---------------------------------:
| GET         | application.dev/products
| POST        | application.dev/products
| GET         | application.dev/products/{product}
| PUT, PATCH  | application.dev/products/{product}
| DELETE      | application.dev/products/{product}

### Objectif

Développer une solution pour importer dans l'application de l'entreprise des données depuis des fichiers excels. La procédure doit être simple, et fonctionner sur les environnements PC et MAC. Aucune technologie imposée, mais la solution doit être simple pour le client et une documentation sommaire pour installer et faire fonctionner la solution est requise