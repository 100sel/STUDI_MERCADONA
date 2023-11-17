# Documentation Technique pour l'Application Web de Mercadona

## 1. Introduction et Contexte

### Objectif du Projet
Développer une application web pour Mercadona pour présenter les promotions de produits, remplaçant ainsi les tracts publicitaires papier.

### Contexte de l'Entreprise
Mercadona, acteur majeur dans le secteur du retail en Espagne, possède 1675 magasins et génère un chiffre d'affaires de 20 milliards d'euros. L'entreprise cherche à moderniser son approche des promotions pour des raisons écologiques et d'efficacité opérationnelle.

## 2. Architecture de l'Application

### Front-end
Utilisation de Twig et PicoCSS pour leur flexibilité et facilité d'utilisation, permettant aux utilisateurs de consulter les promotions.

### Back-end
Emploi de Symfony pour sa robustesse et son écosystème étendu, qui facilite la gestion des données et l'authentification.

### Base de données
Choix de PostgreSQL pour sa conformité aux exigences et ses capacités avancées en matière de gestion des données.

### Déploiement
Utilisation de Fly.io pour la simplicité de déploiement et sa compatibilité avec les technologies choisies.

### Sécurité
Authentification intégrée de Symfony avec hashage bcrypt pour la sécurité des mots de passe et communication sécurisée via HTTPS.

## 3. Sécurité de l'Application

### Authentification des Administrateurs
Mise en place d'un système d'authentification robuste avec des mots de passe sécurisés.

### Protection des Données
Chiffrement des données sensibles stockées dans la base de données PostgreSQL.

### Sécurisation des Communications
Implémentation de HTTPS pour chiffrer les données échangées entre le client et le serveur.

### Gestion des Droits d'Accès
Mise en place de contrôles pour assurer que seuls les administrateurs autorisés peuvent ajouter ou modifier les promotions.

## 4. Fonctionnalités et Flux de Travail

### Entités et Relations
- **User**: Gère les informations d'identification des administrateurs, avec la capacité de créer des produits et des promotions.
- **Product**: Contient les informations des produits, y compris le libellé, le prix, une image, une description facultative, et est lié aux catégories et aux promotions.
- **Category**: Regroupe les produits pour un filtrage facile dans le catalogue et possède un libellé.
- **Promotion**: Décrit les offres promotionnelles, avec des dates de début et de fin, ainsi qu'un pourcentage de remise.
- **Visitor**: Peut consulter les produits et les filtrer par catégorie sans nécessiter d'authentification.

## 5. Évolutions Futures

### Front-end
- Implémentation de la pagination du catalogue pour une navigation optimisée.
- Création d'une page d'accueil fonctionnelle et attrayante.
- Amélioration du design global et élaboration d'un logo distinctif.

### Back-end
- Renforcement de la couverture de tests pour garantir la fiabilité du code.
- Amélioration de la gestion des erreurs pour accroître la résilience de l'application.
- Optimisation de la gestion des environnements de développement et de production et des processus d'intégration et de déploiement continus (CI/CD).