# GOS Automobile - Site Web avec Symfony

Ce dépôt contient le code source du site web "GOS Automobile", un projet développé dans le cadre d'un stage de formation. Il inclut une vitrine publique pour les clients et un panneau d'administration sécurisé pour la gestion du contenu.

![Maquette Visuelle](https://oaidalleapiprodscus.blob.core.windows.net/private/org-p72V5C2fCbgQo4t2uYp4u6p0/user-9u0W6Gv7e4GxgGk0I7MvF0kY/img-wT2xTfJ6JdI2B5U7mG90Hq0A.png?st=2024-05-23T12%3A58%3A36Z&se=2024-05-23T14%3A58%3A36Z&sp=r&sv=2021-08-06&sr=b&rscd=inline&rsct=image/png&skoid=6d45ed6c-b092-4161-9da0-8742c79b4491&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&sks=b&skv=2021-08-06&sig=h3J2J6rQ/k%2BytFzT1gQ3n2EaR3K4gq7Q5Q40M9tF954%3D)

## Table des Matières

1.  [À Propos du Projet](#à-propos-du-projet)
2.  [Technologies Utilisées](#technologies-utilisées)
3.  [Démarrage Rapide](#démarrage-rapide)
4.  [Utilisation](#utilisation)
5.  [Workflow Git & Plan de Développement](#workflow-git--plan-de-développement)

---

## À Propos du Projet

Ce projet vise à créer un site web complet pour un garage automobile. Les fonctionnalités clés sont :
*   **Partie Publique :** Présentation du garage, liste des services, formulaire de contact.
*   **Partie Administration :** Espace sécurisé par login/mot de passe pour gérer le contenu du site.
*   **Gestion Dynamique :** Les services affichés sur le site sont gérables via le panneau d'administration (CRUD).
*   **Qualité du Code :** Le projet intègre des outils d'analyse statique pour garantir un code propre et maintenable.

## Technologies Utilisées

*   [Symfony 7](https://symfony.com/)
*   [PHP 8.2+](https://www.php.net/)
*   [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html)
*   [Twig](https://twig.symfony.com/)
*   [EasyAdminBundle](https://symfony.com/bundles/EasyAdminBundle/current/index.html)
*   [Webpack Encore](https://symfony.com/doc/current/frontend.html)
*   [MySQL](https://www.mysql.com/)

---

## Démarrage Rapide

### Prérequis

*   [PHP](https://www.php.net/downloads.php) (version 8.1+)
*   [Composer](https://getcomposer.org/)
*   [Symfony CLI](https://symfony.com/download)
*   [Node.js et npm](https://nodejs.org/)
*   [Git](https://git-scm.com/)

### Installation

1.  **Clonez le dépôt :** `git clone https://votre-url-de-depot/gos-automobile.git` et `cd gos-automobile`
2.  **Installez les dépendances PHP :** `composer install`
3.  **Installez les dépendances JS/CSS :** `npm install`
4.  **Configurez votre base de données** dans un fichier `.env.local`.
5.  **Créez et mettez à jour la base de données :** `symfony console doctrine:database:create` puis `symfony console doctrine:migrations:migrate`

---

## Utilisation

1.  **Lancez le serveur web :** `symfony server:start`
2.  **Compilez les assets (CSS/JS) :** `npm run dev -- --watch`
3.  **Accédez au site :**
    *   Site public : [https://127.0.0.1:8000](https://127.0.0.1:8000)
    *   Panneau d'administration : [https://127.0.0.1:8000/admin](https://127.0.0.1:8000/admin)

---

## Workflow Git & Plan de Développement

Le projet suit un workflow basé sur des branches de fonctionnalités. Chaque ticket correspond à une branche unique.

**Processus pour chaque nouvelle tâche :**
1.  S'assurer que la branche principale (`main`) est à jour :
    ```bash
    git switch main
    git pull
    ```
2.  Créer la nouvelle branche de fonctionnalité et basculer dessus en **une seule commande** :
    ```bash
    git switch -c <nom-de-la-branche>
    ```
3.  Travailler, puis utiliser `git add` et `git commit`.
4.  Pousser la branche sur GitHub (`git push -u origin <nom-de-la-branche>`) et créer une Pull Request.

### Liste des Commandes de Branche du Projet

Copiez-collez la commande correspondant au ticket que vous souhaitez commencer.

#### Sprint 1 : Fondations Techniques
*   **Ticket 1 :** Installer les outils d'analyse statique du code.
    ```bash
    git switch -c sprint1-ticket1-setup/static-code-analyzers
    ```
*   **Ticket 2 :** Construire l'entité `User` et sa table en base de données.
    ```bash
    git switch -c sprint1-ticket2-build/users-entity-and-table
    ```
*   **Ticket 3 :** Mettre en place Webpack Encore pour la gestion des assets.
    ```bash
    git switch -c sprint1-ticket3-setup/webpack-encore
    ```
*   **Ticket 4 :** Ajouter le layout de base (`base.html.twig`).
    ```bash
    git switch -c sprint1-ticket4-add/base-layout
    ```
*   **Ticket 5 :** Ajouter le contrôleur et les routes des pages publiques.
    ```bash
    git switch -c sprint1-ticket5-add/public-pages-controller
    ```
*   **Ticket 6 :** Ajouter les templates Twig des pages publiques.
    ```bash
    git switch -c sprint1-ticket6-add/public-pages-templates
    ```

#### Sprint 2 : Fonctionnalités de Contact
*   **Ticket 1 :** Construire la logique backend du formulaire de contact.
    ```bash
    git switch -c sprint2-ticket1-build/contact-form-logic
    ```
*   **Ticket 2 :** Ajouter le template Twig pour afficher le formulaire de contact.
    ```bash
    git switch -c sprint2-ticket2-add/contact-form-template
    ```

#### Sprint 3 : Style et Finalisation de la Partie Publique
*   **Ticket 1 :** Appliquer le style au layout principal (header, footer, etc.).
    ```bash
    git switch -c sprint3-ticket1-style/main-layout
    ```
*   **Ticket 2 :** Appliquer le style au formulaire de contact et aux pages.
    ```bash
    git switch -c sprint3-ticket2-style/forms-and-pages
    ```
*   **Ticket 3 :** Ajouter le contenu final et les images sur le site.
    ```bash
    git switch -c sprint3-ticket3-add/final-content-and-images
    ```

#### Sprint 4 : Système d'Authentification
*   **Ticket 1 :** Construire le système d'authentification (login, logout).
    ```bash
    git switch -c sprint4-ticket1-build/auth-system
    ```
*   **Ticket 2 :** Ajouter le formulaire de connexion et les routes de sécurité.
    ```bash
    git switch -c sprint4-ticket2-add/login-form
    ```
*   **Ticket 3 :** Sécuriser la zone `/admin` pour le rôle `ROLE_ADMIN`.
    ```bash
    git switch -c sprint4-ticket3-secure/admin-area
    ```

#### Sprint 5 : Espace d'Administration
*   **Ticket 1 :** Mettre en place le tableau de bord de base avec EasyAdmin.
    ```bash
    git switch -c sprint5-ticket1-setup/easyadmin-dashboard
    ```
*   **Ticket 2 :** Construire l'entité Doctrine `Service`.
    ```bash
    git switch -c sprint5-ticket2-build/service-entity
    ```
*   **Ticket 3 :** Ajouter le CRUD pour les `Services` dans EasyAdmin.
    ```bash
    git switch -c sprint5-ticket3-add/service-crud-to-admin
    ```

#### Sprint 6 : Contenu Dynamique et Finitions
*   **Ticket 1 :** Rendre l'affichage des services sur le site public dynamique.
    ```bash
    git switch -c sprint6-ticket1-refactor/dynamic-service-display
    ```
*   **Ticket 2 :** Gérer et afficher les messages de contact dans l'admin.
    ```bash
    git switch -c sprint6-ticket2-build/admin-messages-management
    ```
*   **Ticket 3 :** Rédiger la documentation finale du projet.
    ```bash
    git switch -c sprint6-ticket3-docs/project-documentation
    ```