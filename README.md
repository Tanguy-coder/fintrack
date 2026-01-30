# 💰 FinTrack - Système de Gestion Financière

<p align="center">
  <img src="public/Logo.png" alt="FinTrack Logo" width="200">
</p>

<p align="center">
  <strong>Application web complète de gestion financière pour entreprises et organisations</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License">
</p>

---

## 📋 Table des matières

- [À propos](#-à-propos)
- [Fonctionnalités](#-fonctionnalités)
- [Architecture](#-architecture)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Utilisation](#-utilisation)
- [Structure du projet](#-structure-du-projet)
- [Technologies utilisées](#-technologies-utilisées)
- [Système de licence](#-système-de-licence)
- [Contribuer](#-contribuer)
- [Support](#-support)
- [Licence](#-licence)

---

## 🎯 À propos

**FinTrack** est une application web moderne de gestion financière développée avec Laravel 11. Elle permet aux entreprises, associations et organisations de gérer efficacement leurs finances en offrant un suivi complet des entrées, sorties, salaires et génération de rapports détaillés.

### Pourquoi FinTrack ?

- ✅ **Interface intuitive** : Interface utilisateur moderne et facile à utiliser
- ✅ **Gestion complète** : Caisses, dépenses, recettes, salaires et employés
- ✅ **Rapports détaillés** : Visualisation graphique et exports de données
- ✅ **Multi-utilisateurs** : Système de rôles et permissions
- ✅ **Sécurisé** : Authentification robuste et système de licence intégré
- ✅ **Paie automatisée** : Génération automatique de bulletins de paie

---

## ✨ Fonctionnalités

### 📊 Tableau de bord
- Vue d'ensemble des finances (jour, mois, année)
- Graphiques interactifs des recettes vs dépenses
- Indicateurs clés de performance (KPI)

### 💳 Gestion des Caisses
- Création et gestion de multiples caisses
- Suivi en temps réel des soldes
- Historique des transactions par caisse

### 💸 Gestion des Sorties (Dépenses)
- Enregistrement des dépenses
- Catégorisation par types de sorties
- Association aux caisses et utilisateurs
- Filtrage et recherche avancée

### 💵 Gestion des Entrées (Recettes)
- Enregistrement des recettes
- Classification par types d'entrées
- Suivi des sources de revenus

### 👥 Gestion des Employés
- Fiche complète des employés (matricule, poste, contact)
- Statut actif/inactif
- Gestion des salaires de base
- Historique complet

### 💼 Gestion de la Paie
- Calcul automatique des salaires
- Gestion des cotisations sociales (assurances)
- Multiples modes de paiement :
  - Virement bancaire
  - Chèque
  - Espèces
  - Mobile Money
- **Génération de bulletins de paie imprimables**
- Conversion automatique des montants en lettres
- Historique de la paie par employé

### 🏥 Gestion des Assurances
- Enregistrement des cotisations sociales
- Association aux salaires
- Calcul automatique des déductions

### 📈 Rapports et Analyses
- Rapports personnalisables entre deux dates
- Filtrage par types de dépenses/recettes
- Rapport général avec balance financière
- Export JSON pour intégrations API
- Visualisation graphique des données
- Impression et export PDF

### 👤 Gestion des Utilisateurs
- Système d'authentification sécurisé
- Gestion des rôles et permissions
- Profils utilisateurs personnalisables

### 🔐 Système de Licence
- Protection de l'application par licence
- Expiration automatique
- Alertes avant expiration
- Blocage automatique après expiration

---

## 🏗️ Architecture

FinTrack suit une architecture **Repository Pattern** avec **Service Layer**, garantissant :

```
Controllers (HTTP) → Services (Logique métier) → Repositories (Accès données) → Models (Entités)
```

### Avantages de cette architecture :
- ✅ **Séparation des responsabilités** claire
- ✅ **Testabilité** accrue
- ✅ **Maintenabilité** facilitée
- ✅ **Évolutivité** simplifiée
- ✅ **Réutilisabilité** du code

---

## 📦 Prérequis

Avant d'installer FinTrack, assurez-vous d'avoir :

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x & **NPM** >= 9.x
- **MySQL** >= 8.0 ou **PostgreSQL** >= 13
- **Serveur web** (Apache/Nginx) ou Laravel Valet/Herd
- **Git**

### Extensions PHP requises :
```
- BCMath
- Ctype
- cURL
- DOM
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PCRE
- PDO
- Tokenizer
- XML
```

---

## 🚀 Installation

### 1. Cloner le repository

```bash
git clone https://github.com/tanguy-coder/fintrack.git
cd fintrack
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances JavaScript

```bash
npm install
```

### 4. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configurer la base de données

Éditez le fichier `.env` avec vos paramètres de base de données :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fintrack
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

### 6. Exécuter les migrations

```bash
php artisan migrate
```

### 7. (Optionnel) Remplir avec des données de test

```bash
php artisan db:seed
```

### 8. Créer le lien de stockage

```bash
php artisan storage:link
```

### 9. Compiler les assets

**Pour le développement :**
```bash
npm run dev
```

**Pour la production :**
```bash
npm run build
```

### 10. Démarrer le serveur

```bash
php artisan serve
```

L'application sera accessible sur `http://localhost:8000`

---

## ⚙️ Configuration

### Configuration de la file d'attente (Queue)

Pour le système de licence et les tâches asynchrones :

```bash
# Dans un terminal séparé
php artisan queue:work
```

**Pour la production, utilisez Supervisor :**

```ini
[program:fintrack-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /chemin/vers/fintrack/artisan queue:work --sleep=3 --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/chemin/vers/fintrack/storage/logs/worker.log
```

### Configuration de la tâche planifiée (Cron)

Pour la décrémentation automatique des jours de licence :

```bash
# Ouvrir crontab
crontab -e

# Ajouter cette ligne
* * * * * cd /chemin/vers/fintrack && php artisan schedule:run >> /dev/null 2>&1
```

Dans `app/Console/Kernel.php` :

```php
protected function schedule(Schedule $schedule)
{
    $schedule->command('decrement-days')->daily();
}
```

### Configuration de la locale

L'application est configurée en français par défaut. Pour changer :

```php
// config/app.php
'locale' => 'fr',
'fallback_locale' => 'fr',
'faker_locale' => 'fr_FR',
```

---

## 💡 Utilisation

### Commandes Artisan disponibles

```bash
# Décrémenter les jours de licence manuellement
php artisan decrement-days

# Lancer tous les services en développement (serveur + queue + vite)
composer dev
```

### Premiers pas

1. **Créer un compte administrateur** lors de la première connexion
2. **Configurer la licence** dans la base de données
3. **Créer les unités** organisationnelles
4. **Ajouter des caisses** pour gérer les fonds
5. **Définir les types de sorties et entrées**
6. **Enregistrer les employés**
7. **Configurer les assurances**
8. **Commencer à enregistrer les transactions**

### Gestion de la paie

1. Accéder au module **Salaires**
2. Cliquer sur **Nouveau salaire**
3. Sélectionner l'employé
4. Choisir le mois et l'année
5. Entrer les montants et déductions
6. Sélectionner le mode de paiement
7. Enregistrer
8. Imprimer le bulletin de paie

### Génération de rapports

1. Accéder au module **Rapports**
2. Sélectionner **Rapport général** ou **Rapport personnalisé**
3. Définir la période (date de début et fin)
4. Sélectionner les types de transactions
5. Générer le rapport
6. Visualiser, imprimer ou exporter

---

## 📁 Structure du projet

```
fintrack/
├── app/
│   ├── Console/
│   │   └── Commands/          # Commandes Artisan personnalisées
│   ├── Gateway/                # Interfaces (contrats)
│   ├── Http/
│   │   ├── Controllers/        # Contrôleurs (23 fichiers)
│   │   ├── Middleware/         # Middleware personnalisé (Licence)
│   │   └── Requests/           # Form Requests
│   ├── Jobs/                   # Jobs asynchrones
│   ├── Models/                 # Modèles Eloquent (11 fichiers)
│   ├── Repositories/           # Repositories (10 fichiers)
│   └── Services/               # Services métier (10 fichiers)
├── config/                     # Fichiers de configuration
├── database/
│   ├── migrations/             # Migrations (13 fichiers)
│   └── seeders/                # Seeders
├── public/                     # Assets publics
│   ├── css/                    # Styles
│   ├── js/                     # Scripts
│   └── img/                    # Images
├── resources/
│   ├── js/                     # JavaScript source
│   ├── css/                    # CSS source
│   └── views/                  # Vues Blade (69 fichiers)
├── routes/
│   ├── web.php                 # Routes web
│   ├── auth.php                # Routes d'authentification
│   └── console.php             # Routes console
├── storage/                    # Stockage (logs, cache, uploads)
├── tests/                      # Tests automatisés
├── .env.example                # Exemple de configuration
├── composer.json               # Dépendances PHP
├── package.json                # Dépendances JavaScript
└── README.md                   # Ce fichier
```

---

## 🛠️ Technologies utilisées

### Backend
- **[Laravel 11](https://laravel.com)** - Framework PHP moderne
- **[Laravel Breeze](https://laravel.com/docs/breeze)** - Authentification
- **[Eloquent ORM](https://laravel.com/docs/eloquent)** - Gestion de base de données
- **[rmunate/spell-number](https://github.com/rmunate/SpellNumber)** - Conversion montants en lettres

### Frontend
- **[Vite](https://vitejs.dev)** - Build tool moderne et rapide
- **[Tailwind CSS](https://tailwindcss.com)** - Framework CSS utility-first
- **[Alpine.js](https://alpinejs.dev)** - Framework JavaScript léger
- **[Bootstrap](https://getbootstrap.com)** - Composants UI
- **[Chart.js](https://www.chartjs.org)** - Graphiques interactifs
- **[Font Awesome](https://fontawesome.com)** - Icônes

### Outils de développement
- **[Laravel Pint](https://laravel.com/docs/pint)** - Code style fixer
- **[PHPUnit](https://phpunit.de)** - Tests unitaires
- **[Laravel Sail](https://laravel.com/docs/sail)** - Environnement Docker

---

## 🔐 Système de Licence

### Fonctionnement

FinTrack intègre un système de licence robuste pour protéger l'application :

1. **Vérification automatique** : À chaque requête, le middleware vérifie la validité de la licence
2. **Décrémentation quotidienne** : Une commande cron décrémente les jours restants chaque jour
3. **Alertes proactives** : Les utilisateurs sont avertis 7 jours avant l'expiration
4. **Blocage automatique** : L'application se bloque automatiquement à l'expiration

### Configuration initiale de la licence

```sql
INSERT INTO licences (etat, start_date, expired_date, jours_restants, created_at, updated_at)
VALUES (1, '2026-01-01', '2026-12-31', 365, NOW(), NOW());
```

### Renouvellement de la licence

```sql
UPDATE licences
SET expired_date = '2027-12-31',
    jours_restants = 365,
    etat = 1,
    updated_at = NOW()
WHERE id = 1;
```

---

## 🤝 Contribuer

Les contributions sont les bienvenues ! Pour contribuer :

1. **Forkez** le projet
2. **Créez** une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. **Committez** vos changements (`git commit -m 'Add some AmazingFeature'`)
4. **Poussez** vers la branche (`git push origin feature/AmazingFeature`)
5. **Ouvrez** une Pull Request

### Standards de code

- Suivre les standards **PSR-12**
- Utiliser **Laravel Pint** : `./vendor/bin/pint`
- Écrire des tests pour les nouvelles fonctionnalités
- Documenter le code avec des commentaires clairs

---

## 📞 Support

Pour obtenir de l'aide :

- 📧 **Email** : support@fintrack.com
- 📚 **Documentation** : [Wiki du projet](https://github.com/votre-username/fintrack/wiki)
- 🐛 **Bugs** : [Issues GitHub](https://github.com/votre-username/fintrack/issues)
- 💬 **Discussions** : [GitHub Discussions](https://github.com/votre-username/fintrack/discussions)

---

## 🔒 Sécurité

Si vous découvrez une faille de sécurité, veuillez envoyer un email à **security@fintrack.com** plutôt que d'utiliser le système d'issues. Toutes les vulnérabilités seront traitées rapidement.

---

## 📝 Licence

Ce projet est sous licence **MIT**. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

---

## 👏 Remerciements

- **Laravel Team** pour l'excellent framework
- **Taylor Otwell** pour Laravel
- **Communauté open source** pour les packages utilisés
- **Tous les contributeurs** qui ont participé au projet

---

## 📊 Roadmap

### Version 2.0 (À venir)
- [ ] API RESTful complète
- [ ] Application mobile (Flutter)
- [ ] Module de facturation
- [ ] Intégration comptable
- [ ] Multi-entreprises
- [ ] Gestion des inventaires
- [ ] Notifications push
- [ ] Export Excel avancé
- [ ] Tableau de bord personnalisable
- [ ] Mode sombre

---

<p align="center">
  Développé avec ❤️ pour simplifier la gestion financière
</p>

<p align="center">
  <strong>⭐ N'oubliez pas de mettre une étoile si ce projet vous est utile ! ⭐</strong>
</p>
