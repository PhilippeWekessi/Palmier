# Elaeis Prestige — Plateforme de vente de plants de palmier à huile

Site e-commerce développé avec **Laravel + MySQL + Tailwind CSS + Alpine.js**,
prévu pour tourner en local avec **WampServer**.

> **Statut** : Phase 1 (architecture, installation, configuration) terminée.
> Les fonctionnalités métier (catalogue, panier, commandes, dashboard admin...)
> seront ajoutées phase par phase.

## Installation avec WampServer

### 1. Prérequis
Installer si nécessaire :
- PHP 8.2+ (fourni par WampServer)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (v18+) et npmhhb

### 2. Copier le projet
Placer le dossier du projet ici :
```
C:\wamp64\www\elaeis-prestige
```

### 3. Créer la base de données MySQL
Dans phpMyAdmin (ou la console MySQL de WampServer), créer une base vide nommée :
```
elaeis_prestige
```

### 4. Configurer l'environnement
Copier le fichier d'exemple puis l'éditer :
```
copy .env.example .env
```
Vérifier que la section base de données correspond bien à votre config WampServer :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=elaeis_prestige
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Installer les dépendances
```
composer install
npm install
```

### 6. Générer la clé d'application
```
php artisan key:generate
```

### 7. Exécuter les migrations
```
php artisan migrate
```

### 8. Exécuter les seeders (données de démonstration)
```
php artisan db:seed
```

### 9. Créer le lien de stockage (images produits)
```
php artisan storage:link
```

### 10. Compiler les assets (Tailwind / Alpine)
```
npm run build
```
Pour le développement avec rechargement à chaud :
```
npm run dev
```

### 11. Lancer le projet
Avec le serveur intégré Laravel :
```
php artisan serve
```
Puis ouvrir : http://127.0.0.1:8000

Ou, alternativement, configurer un VirtualHost Apache dans WampServer pointant
vers `C:\wamp64\www\elaeis-prestige\public` et servir le site via
`http://elaeis-prestige.local` (ou `http://localhost/elaeis-prestige/public`).

## Vérification Phase 1

Si l'installation est correcte, la page d'accueil affiche une carte
« 🌴 Elaeis Prestige — Phase 1 terminée » stylée avec Tailwind CSS, ce qui
confirme que :
- Laravel démarre correctement ;
- la connexion MySQL est fonctionnelle (migrations passées) ;
- Vite / Tailwind compile les assets.

## Comptes de démonstration (à partir de la Phase 30)

| Rôle           | Email                         | Mot de passe |
|----------------|--------------------------------|---------------|
| Administrateur | admin@elaeis-prestige.com     | (défini au seed) |

## Prochaines phases
2. Base de données complète (migrations, modèles, relations)
3. Authentification + rôles + permissions
4. Frontend public (layout, navbar, footer)
5. Page d'accueil
6. Catalogue produits
... (voir le cahier des charges complet du projet)
