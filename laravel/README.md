# Projet de Fiction interactive - Laravel + Vue.js
Ce projet est une application web d'histoire interactive dans laquelle l'utilisateur·ice progresse en faisant des choix. Elle est construite avec **Laravel** pour le backend et **Vue.js** avec **Breeze** pour le frontend.

## Spécificité techniques
Ce projet s’appuie sur l’architecture MVC (Modèle-Vue-Contrôleur) fournie par le framework Laravel. Cette séparation claire des responsabilités permet une meilleure organisation du code :

**Modèles (Models) :** Ils représentent les entités principales du projet comme Story, Chapter, Choice, et UserProgress, en lien direct avec les tables de la base de données.

**Contrôleurs (Controllers) :** Ils orchestrent la logique métier et les interactions entre les modèles et les vues/API. Exemple : StoryController, UserProgressController, etc.

**Vues (Views) :** Le frontend est géré avec Vue.js (via Inertia.js), qui permet d'afficher dynamiquement les données tout en conservant un environnement SPA (Single Page Application).

Le backend expose une API RESTful versionnée (/api/v1/...) respectant les conventions modernes, tandis que le frontend utilise des fichiers personnalisés comme fetchJson.js et useFetchJson.js pour communiquer avec l’API.

L’authentification est assurée par Laravel Breeze, avec un système de sessions et middleware d’accès.

## Fonctionnalités principales

- API RESTful pour la gestion des :
  - Histoires
  - Chapitres
  - Choix
  - Progression utilisateur
- Système d'authentification via Laravel Breeze (Inertia + Vue.js)
- Stockage de la progression d’un utilisateur
- Interface de lecture d’une histoire (encore en cours de développement)


## Prérequis

Avant de commencer, assurez-vous d’avoir installé :

- PHP ≥ 8.1
- Composer
- Node.js ≥ 18
- SQLite


## ⚙️ Installation

### 1. Cloner le dépôt

git clone https://github.com/lilmamin/Fiction-interactive
`cd Fiction-interactive`

### 2. Installer les dépendences PHP
`composer install`

### 3. Copier le fichier .env
`cp .env.example .env`
`php artisan key:generate`


### 4. Configurer la base de données
`touch database/database.sqlite`

**Adapter le fichier .env**
`DB_CONNECTION=sqlite`
`DB_DATABASE=${APP_BASE_PATH}/database/database.sqlite`

### 5. Lancer les migrations + seeder 
`php artisan migrate:fresh --seed`

### 6. Installer les dépendances JS
`npm install`

### 7. Compiler le projet 
`npm run dev`

### 8. Lancer le serveur de développement
`php artisan serve`
→ L'application devrait être disponible à votre adresse localhost.


## Accès à l'API
Exemples d’URLs disponibles :

`GET /api/v1/stories` → liste des histoires

`GET /api/v1/stories/` → histoire complète avec chapitres et choix

`GET` /api/v1/user-progress` → progression d’un utilisateur connecté

`POST /api/v1/user-progress` → mettre à jour la progression


### Connexion utilisateur
La connexion se fait depuis le front (encore en cours de développement) via l'interface front-end (register).

### Projet scolaire