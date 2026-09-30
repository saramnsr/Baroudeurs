# Baroudeurs du Désert — Guide d'installation et d'utilisation

Bienvenue dans le projet **Baroudeurs du Désert**. Ce guide vous explique, étape par étape, comment installer, configurer et lancer le projet sur votre machine, à partir de zéro.

---

## Prérequis

Avant de commencer, assurez-vous que votre machine dispose des éléments suivants :

| Logiciel | Version minimale | Rôle |
|----------|------------------|------|
| PHP | 8.1 ou supérieur | Langage du serveur |
| Composer | 2.x | Gestionnaire de dépendances PHP |
| Node.js | 18.x ou supérieur | Environnement JavaScript |
| npm | 9.x ou supérieur | Gestionnaire de paquets JS |
| MySQL | 8.0 ou supérieur | Base de données |
| Git | 2.x | Récupération du projet |

**Extensions PHP obligatoires :** `pdo_mysql`, `mbstring`, `intl`, `openssl`, `ctype`, `iconv`.

Pour vérifier, lancez :
```bash
php -m
```
Vous devez voir au minimum : `pdo_mysql`, `mbstring`, `intl`, `openssl`.

---

## Étape 1 — Récupérer le projet

### Option A — Cloner depuis Git

```bash
git clone <url-du-depot> baroudeurs
cd baroudeurs
```

### Option B — À partir d'un fichier ZIP

Décompressez le ZIP, puis :

```bash
cd baroudeurs-main
```

---

## Étape 2 — Installer les dépendances PHP

```bash
composer install
```

Cette commande lit `composer.json` et télécharge toutes les bibliothèques PHP dans le dossier `vendor/`.

**Durée estimée :** 1 à 2 minutes.

**Résultat attendu :** `Generating autoload files` à la fin, sans erreur.

---

## Étape 3 — Installer les dépendances JavaScript

```bash
npm install
```

Cette commande télécharge tous les paquets frontend dans `node_modules/`.

**Durée estimée :** 1 minute.

---

## Étape 4 — Créer le fichier de configuration local

### Sous Linux / macOS :

```bash
cp .env .env.local
```

### Sous Windows (PowerShell) :

```powershell
Copy-Item .env .env.local
```

Ouvrez ensuite `.env.local` dans un éditeur de texte et modifiez ces valeurs :

```dotenv
APP_ENV=dev
APP_DEBUG=1
APP_SECRET=changez_moi_par_une_chaine_aleatoire

DATABASE_URL="mysql://baroudeurs:baroudeurs2026@127.0.0.1:3306/baroudeurs?serverVersion=8.4.8&charset=utf8mb4"

CLOUDINARY_URL=cloudinary://442525621764211:Tt-AtQhLIaA4IBbUe-57904qJJI@dy13axswo
DEEPL_API_KEY=
```

### Notes importantes

- **`APP_SECRET`** : chaîne aléatoire de 32+ caractères. Générez-en une avec :
  ```bash
  php -r "echo bin2hex(random_bytes(16));"
  ```
- **`DATABASE_URL`** : le mot de passe (`baroudeurs2026`) doit **correspondre exactement** à celui de l'étape 5.
- **`CLOUDINARY_URL`** : nécessaire pour l'envoi d'images depuis l'admin. Si absente, l'upload d'images ne fonctionnera pas.
- **`DEEPL_API_KEY`** : optionnelle. Utilisée pour la traduction automatique. Laissez vide si non utilisée.

---

## Étape 5 — Créer la base de données MySQL

Ouvrez un terminal MySQL (`mysql` en ligne de commande, ou MySQL Workbench) et exécutez :

```sql
CREATE DATABASE IF NOT EXISTS baroudeurs
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'baroudeurs'@'localhost'
    IDENTIFIED BY 'baroudeurs2026';

GRANT ALL PRIVILEGES ON baroudeurs.*
    TO 'baroudeurs'@'localhost';

FLUSH PRIVILEGES;
```

Le mot de passe `baroudeurs2026` doit être identique à celui utilisé dans `.env.local` (étape 4).

---

## Étape 6 — Importer le fichier SQL

Le fichier `database/export/baroudeurs.sql` contient **toute la base de données** : les tables, les 7 circuits, les 2 excursions, avec toutes les traductions (français, anglais, arabe, italien), les images, les avis.

> ⚠️ **IMPORTANT :** vous devez impérativement préciser `--default-character-set=utf8mb4` lors de l'import. Sans cela, les accents (é, à, è) et l'arabe seront corrompus.

### Option A — Ligne de commande (rapide)

**Sous Linux / macOS :**

```bash
mysql -u root -p --default-character-set=utf8mb4 < database/export/baroudeurs.sql
```

**Sous Windows (cmd.exe) :**

```cmd
mysql -u root -p --default-character-set=utf8mb4 < database\export\baroudeurs.sql
```

Entrez le mot de passe root de MySQL lorsqu'il est demandé.

### Option B — MySQL Workbench (interface graphique)

1. Ouvrez **MySQL Workbench**
2. Connectez-vous à `localhost` en tant que `root`
3. Menu → **Server → Data Import**
4. Sélectionnez **"Import from Self-Contained File"**
5. Parcourez jusqu'à `database/export/baroudeurs.sql`
6. **Default Schema to be Imported To :** sélectionnez `baroudeurs`
7. Cliquez sur **Start Import**

---

## Étape 7 — Vérifier l'import

```bash
mysql -u root -p --default-character-set=utf8mb4 -e "SELECT id, title_fr FROM baroudeurs.circuit ORDER BY id;"
```

**Résultat attendu :**

```
1  Circuit Désert 8 Jours - Douz à Tembaïne
2  Mirage du Désert - 8 Jours / 7 Nuits
3  Appel du Désert
4  Baroudeurs de Désert - 15 Jours
5  Charme du Désert - 2 Jours
6  Désert Infini - 8 Jours
7  Rose de Sables - 8 Jours
```

Vérifiez également l'arabe :

```bash
mysql -u root -p --default-character-set=utf8mb4 -e "SELECT id, title_ar FROM baroudeurs.circuit WHERE id = 1;"
```

**Résultat attendu :** `رحلة الصحراء 8 أيام - من دوز إلى تمباين`

> ❌ Si l'arabe s'affiche comme `?????`, cela signifie que l'import a été fait sans `--default-character-set=utf8mb4`. Il faut alors :
> 1. Supprimer la base : `DROP DATABASE baroudeurs;`
> 2. La recréer (étape 5)
> 3. Réimporter en utilisant le bon paramètre

---

## Étape 8 — Vérifier la cohérence du schéma

```bash
php bin/console doctrine:schema:validate
```

**Résultat attendu :**

```
[OK] The mapping files are correct.
[WARNING] The database schema is not in sync ...
```

> ℹ️ Le `WARNING` est **purement cosmétique** (Doctrine souhaite ajouter des commentaires de métadonnées sur les colonnes de type date). Cela n'affecte pas le fonctionnement de l'application.

Pour faire disparaître l'avertissement (optionnel) :

```bash
php bin/console doctrine:schema:update --force
```

---

## Étape 9 — Vider le cache Symfony

```bash
php bin/console cache:clear
```

**Résultat attendu :** `[OK] Cache for the "dev" environment was successfully cleared.`

---

## Étape 10 — Créer un compte administrateur

> ⚠️ Le fichier SQL exporté **ne contient pas** de compte administrateur, car les mots de passe sont hachés de manière unique par environnement.

Créez-en un :

```bash
php bin/console app:create-admin
```

Trois questions vous seront posées :

1. **Adresse email** — par exemple : `admin@baroudeursdedesert.com`
2. **Mot de passe** — minimum 4 caractères (utilisez un mot de passe fort)
3. **Confirmation du mot de passe**

**Résultat attendu :** `[OK] Admin « admin@baroudeursdedesert.com » créé.`

Pour modifier le mot de passe plus tard, relancez simplement la même commande avec le même email.

---

## Étape 11 — Lancer le serveur de développement

```bash
php -S localhost:8000 -t public
```

**Résultat attendu :**

```
PHP 8.1.x Development Server (http://localhost:8000) started
```

Ouvrez ensuite votre navigateur et testez les pages suivantes :

| URL | Description |
|-----|-------------|
| `http://localhost:8000/` | Page d'accueil |
| `http://localhost:8000/circuits` | Liste des 7 circuits |
| `http://localhost:8000/excursions` | Liste des 2 excursions |
| `http://localhost:8000/detail/circuit/1` | Détail du circuit 1 |
| `http://localhost:8000/detail/excursion/1` | Détail de l'excursion 1 |
| `http://localhost:8000/admin` | Connexion administrateur |

Connectez-vous à `/admin` avec l'email et le mot de passe créés à l'étape 10.

> ✅ Si toutes les pages se chargent correctement, le projet est entièrement fonctionnel.

---

## Étape 12 — Déploiement en production (optionnel)

Pour un déploiement en production, utilisez **Apache** ou **Nginx** avec la racine web pointant vers `public/`.

Modifiez `.env.local` :

```dotenv
APP_ENV=prod
APP_DEBUG=0
```

Puis videz et préchauffez le cache :

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

Configurez votre serveur web pour que le DocumentRoot soit le dossier `public/` du projet. Le contrôleur frontal `public/index.php` prendra en charge toutes les requêtes.

---

## Structure du projet

```
baroudeurs/
├── bin/                      Commandes Symfony
├── config/                   Configuration (doctrine, security, routes...)
├── database/
│   └── export/
│       └── baroudeurs.sql    ⭐ Fichier d'import complet
├── migrations/
│   ├── Version20261001120000_InitialMysqlSchema.php   Création du schéma
│   ├── Version20261001120100_SeedCircuitsAndExcursions.php   Données initiales
│   └── data/
│       ├── circuits.php      Données des 7 circuits
│       └── excursions.php    Données des 2 excursions
├── public/                   Racine web (images, CSS, JS)
├── src/
│   ├── Command/Admin/        Commandes (créer un admin, etc.)
│   ├── Controller/           Contrôleurs (front et admin)
│   ├── Entity/               Entités Doctrine
│   ├── Repository/           Requêtes base de données
│   └── Service/              Services (Cloudinary, DeepL, etc.)
├── templates/                Gabarits Twig
├── translations/             Fichiers de traduction (FR, EN, AR, IT)
├── .env                      Configuration par défaut
├── .env.local                Configuration locale (à créer)
├── composer.json             Dépendances PHP
├── package.json              Dépendances JavaScript
└── README.md                 Ce fichier
```

---

## Tables de la base de données

| Table | Rôle |
|-------|------|
| `circuit` | Les circuits touristiques (7 entrées) |
| `excursion` | Les excursions (2 entrées) |
| `admin_user` | Comptes administrateurs |
| `contact_message` | Messages du formulaire de contact et réservations |
| `newsletter` | Inscriptions à la newsletter |
| `testimonial` | Témoignages clients |
| `doctrine_migration_versions` | Historique des migrations (géré par Doctrine) |

---

## Services externes

Le projet utilise trois services externes :

| Service | Configuration | Rôle |
|---------|---------------|------|
| **Cloudinary** | `CLOUDINARY_URL` dans `.env.local` | Hébergement et optimisation des images |
| **Gmail SMTP** | Constantes `MAIL_*` dans `src/Controller/FontController.php` | Envoi des emails (contact, newsletter) |
| **DeepL** | `DEEPL_API_KEY` dans `.env.local` | Traduction automatique |

**Si l'un de ces services est absent :**
- **Cloudinary manquant** → l'admin ne pourra pas téléverser d'images
- **Gmail manquant** → les formulaires s'enregistreront en base mais aucun email ne sera envoyé
- **DeepL manquant** → la traduction automatique des nouveaux contenus admin ne fonctionnera pas

---

## Commandes utiles

| Commande | Description |
|----------|-------------|
| `php bin/console app:create-admin` | Créer ou modifier un administrateur |
| `php bin/console app:check-services` | Vérifier que Cloudinary et DeepL fonctionnent |
| `php bin/console cache:clear` | Vider le cache Symfony |
| `php bin/console doctrine:migrations:migrate` | Appliquer les migrations |
| `php bin/console doctrine:schema:validate` | Vérifier la cohérence entités ↔ base |
| `php bin/console doctrine:query:sql "SELECT * FROM circuit"` | Lancer une requête SQL |

---

## Résolution de problèmes

| Problème | Cause probable | Solution |
|----------|----------------|----------|
| `Table 'baroudeurs.circuit' doesn't exist` | L'étape 6 n'a pas été exécutée | Refaire l'étape 6 |
| `Access denied for user 'baroudeurs'` | Mot de passe incorrect ou utilisateur manquant | Refaire l'étape 5, vérifier `.env.local` |
| Accents corrompus (`D??sert`) | Import sans `--default-character-set=utf8mb4` | Supprimer la base, refaire étape 6 avec le paramètre |
| Arabe corrompu (`??????`) | Même cause que ci-dessus | Même solution |
| `Class not found` | `composer install` incomplet | Relancer `composer install` |
| `Class "App\..." not found` | Autoloader non régénéré | Lancer `composer dump-autoload` |
| Images cassées dans l'admin | `CLOUDINARY_URL` manquant | Ajouter à `.env.local` |
| Connexion admin impossible | Mot de passe oublié | Relancer `php bin/console app:create-admin` avec le même email |
| Port 8000 déjà utilisé | Un autre processus utilise le port | Utiliser `php -S localhost:8001 -t public` |
| `doctrine:schema:validate` affiche un warning | Écart cosmétique (commentaires Doctrine) | Ignorer, ou lancer `doctrine:schema:update --force` |

---

## Informations de contact

- **Site :** Baroudeurs du Désert
- **Adresse :** 10 Avenue Habib Bourguiba, 4260 Douz, Tunisie
- **Email :** contact@baroudeursdedesert.com
- **Téléphone :** +(216) 24 77 72 32
- **Cloudinary :** `dy13axswo`

---

## Résumé rapide des 12 étapes

1. Récupérer le projet (git clone ou ZIP)
2. `composer install`
3. `npm install`
4. Créer `.env.local` avec les bonnes valeurs
5. Créer la base de données MySQL et l'utilisateur
6. Importer `database/export/baroudeurs.sql` avec `--default-character-set=utf8mb4`
7. Vérifier les données (7 circuits, 2 excursions, arabe correct)
8. `php bin/console doctrine:schema:validate` (ignorer le warning)
9. `php bin/console cache:clear`
10. `php bin/console app:create-admin`
11. `php -S localhost:8000 -t public` et tester
12. (Optionnel) Déployer en production

---

**Fin du guide. Pour toute question, contactez contact@baroudeursdedesert.com.**