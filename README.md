# MVC : Architecture du projet et dépendances

*Niveau de difficulté : 2/5*

Maintenant que nous avons vu l'architecture MVC et ce qui caractérise un framework, il est temps de s'attaquer au développement du nôtre 🤩

## Structure du projet

On va commencer par créer tous les dossiers de base dont on aura besoin ainsi que quelques fichiers !

Créez donc un nouveau projet `/mvc` à la racine du dossier `/www`, puis ajoutez-y la structure de dossier suivante :

- `/app` : Excepté les templates pour nos vues, tout ce qui constitue chacune de nos applications se trouvera juste ici
  - `/Controllers` : Contrôleurs de notre application (logique métier, lien entre les modèles et les vues)
  - `/Models` : Modèles de notre application (accès aux données en BDD / Pas de SQL, c'est promis)
  - `/Middlewares` : Classes qui pourront être affectées à nos routes afin de filtrer les requêtes HTTP (pratique pour gérer les pages réservées aux utilisateurs authentifiés par exemple)
  - `/functions.php` : Fichier contenant quelques fonctions utiles à notre applications (on appelle ce type de fonctions des **helpers**)
- `/public` : Seul dossier accessible publiquement depuis l'extérieur du serveur (c'est ici que toutes les requêtes vont atterir)
- `/resources` : Dossier contenant des ressources utiles à notre application
  - `/views` : Templates permettant de générer nos vues
  - `/validation.php` : Fichier PHP qui contiendra un tableau pour associer les noms des champs de nos formulaires à des labels appropriés pour les messages d'erreur (on y reviendra plus tard)
- `/src` : Le coeur de notre framework. Cette partie ne variera pas d'un projet à l'autre excepté si on souhaite faire évoluer le framework !

# Installation des dépendances

Heureusement pour nous, on ne va pas tout coder de A à Z 😥

Vous avez appris à utiliser Composer récemment ! Il est temps de le mettre en pratique sur notre nouveau projet 🥳

Ci-dessous, vous allez avoir un listing de dépendances à installer (dans leurs dernières versions majeures). Vous allez devoir non seulement les installer mais aussi résumer leurs rôles (à la place du texte en italique) :

- symfony/http-foundation : Ce package fournit une couche orientée objet pour la spécification HTTP. Il définit les classes de base pour les requêtes et les réponses HTTP dans Symfony 6.
- twig/twig : Twig est un moteur de template pour PHP. Il permet aux développeurs d'écrire des templates avec une syntaxe claire et concise. Twig offre également des fonctionnalités comme l'héritage de template, les blocs, les filtres et les fonctions personnalisées.
- illuminate/database : C'est le package de base de données de Laravel. Il fournit une interface simple et facile à utiliser pour interagir avec plusieurs systèmes de bases de données. Il prend en charge les transactions, les requêtes brutes SQL, les migrations de bases de données, et bien plus encore.
- vlucas/valitron : Valitron est une bibliothèque de validation de données pour PHP. Elle fournit une interface facile à utiliser pour valider les données d'entrée et générer des erreurs de validation.
- symfony/var-dumper (seulement en environnement de dev) : VarDumper est un outil de débogage qui permet de visualiser les données de manière plus lisible. Il est généralement utilisé dans les environnements de développement pour aider à comprendre ce que contient une variable ou un tableau.
- friendsofphp/php-cs-fixer (seulement en environnement de dev) : PHP CS Fixer est un outil qui corrige automatiquement les problèmes de style de code dans votre code PHP. Il suit les règles définies dans le guide de style officielle de PHP.

# Autoloader

On sait que Composer génère un autoloader permettant de récupérer toutes les entités de nos dépendances via un seul `require`.

Cepeeeendaaant, on voudrait aussi que cet autoloader permette de charger les entités dans les dossiers `/src` et `/app` ainsi que les fonctions dans `app/functions.php` (vous n'avez pas vu comment simplement autoload un fichier de fonctions, il faudra donc trouver comment faire).

A vous de rajouter ce qu'il faut à votre `composer.json` !

Voici les dossiers et les namespaces à lier :

- Dossier `/app` au namespace `App\`
- Dossier `/src` au namespace `MVC\`

# Avant de partir

La structure de notre projet commence à être pas mal !

On va terminer simplement en créant un fichier de configuration `.php-cs-fixer.dist.php` pour paramétrer le fonctionnement de PHP CS Fixer.

Notre projet devra respecter les sets de règles `@PER-CS2.0` et `@PHP83Migration`.
