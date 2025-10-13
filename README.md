# 🌐 Projet PHP 8 – Site de suivi de colis multilingue

## 🧭 Présentation

Ce projet est un **site web de suivi de colis** développé entièrement en **PHP 8**, sans framework externe.  
L’architecture repose sur un **framework MVC fait maison**, inspiré du fonctionnement de Laravel, permettant une séparation claire entre les **modèles**, **vues** et **contrôleurs**.

Le site offre aux utilisateurs la possibilité de :
- Créer un compte et se connecter,  
- Consulter l’état de leurs colis en temps réel,  
- Accéder à leur **historique de livraisons**,  
- Utiliser le site dans plusieurs langues (multilingue).

---

## 🧩 Architecture du projet

Le projet suit une **structure MVC** (Model – View – Controller) :

```
/app
  /Controllers   → Logique métier (routes, actions utilisateur)
  /Models        → Gestion des données (base de données, entités)
  /Views         → Pages HTML/CSS avec intégration PHP
/core
  → Framework maison (router, autoloader, gestion des vues, etc.)
/public
  → Point d’entrée principal du site (index.php, fichiers CSS/JS)
/lang
  → Dossiers de traduction (fr, en, de, es, zh)
```

### 🔹 Contrôleurs
Responsables du traitement des requêtes (connexion, inscription, suivi, historique).

### 🔹 Modèles
Interagissent avec la base de données (utilisateurs, colis, historiques…).

### 🔹 Vues
Contiennent le rendu visuel du site, avec intégration HTML / CSS / PHP pur.

### 🔹 Framework interne
- Routeur personnalisé pour gérer les URLs.
- Système de vues avec variables injectées dynamiquement.
- Gestion centralisée des langues via fichiers JSON ou PHP.
- Classe `App` principale qui initialise les composants essentiels.

---

## 🗣️ Multilingue

Le site supporte actuellement **5 langues** :
- 🇫🇷 Français  
- 🇩🇪 Allemand  
- 🇬🇧 Anglais  
- 🇨🇳 Chinois  
- 🇪🇸 Espagnol  

L’ajout d’une nouvelle langue est très simple :  
1. Créer un dossier dans `/lang/` portant le code de la langue (ex : `it/`).  
2. Ajouter les fichiers de traduction (`messages.php` ou `messages.json`).  
3. La langue devient automatiquement disponible dans le menu.

---

## 🔐 Fonctionnalités principales

| Fonctionnalité | Description |
|----------------|-------------|
| 🧑‍💻 Connexion / Inscription | Gestion complète des comptes utilisateurs |
| 📦 Suivi de colis | Affichage du statut actuel du colis |
| 🕒 Historique | Liste des livraisons passées |
| 🌍 Multilingue | 5 langues disponibles + extensible |
| ⚙️ Framework MVC maison | Inspiré de Laravel |
| 🎨 Front-end | HTML + CSS personnalisés |

---

## ⚙️ Technologies utilisées

| Composant | Technologie |
|------------|--------------|
| Langage principal | PHP 8 |
| Front-end | HTML5, CSS3 |
| Architecture | MVC (maison) |
| Base de données |PostegreSQL |
| Multilingue | Fichiers de langues PHP |
| Serveur recommandé | Apache |

---

## 🚀 Installation

### Prérequis
- PHP ≥ 8.0  
- Serveur web (Apache)  
- PostegreSQL
- Navigateur moderne

### Étapes d’installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/Absolut-Warehouse/Web-Server.git
   cd mon-projet-php
   ```

2. **Configurer la base de données**
   - Crée une base de données :
     ```sql
     CREATE DATABASE suivi_colis CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
     ```
   - Configure les accès dans le fichier :
     ```
     /App/Config/config.php
     ```

3. **Démarrer le serveur local**
   ```bash
   php -S localhost:8000 -t public
   ```
   Puis ouvre :  
   👉 [http://localhost:8000](http://localhost:8000)

---

## 🧰 Structure de fichiers simplifiée

```
mon-projet-php/
├── app/
│   ├── Controllers/
│   └── Views/
├── core/
│   ├── Router.php
│   ├── App.php
│   └── Controller.php
├── lang/
│   ├── en/
│   ├── fr/
│   ├── de/
│   ├── es/
│   └── zh/
├── public/
│   ├── css/
│   ├── js/
|   ├── resources/
|   ├── .htaccess
│   └── index.php
└── README.md
```

---
