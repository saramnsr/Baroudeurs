# Baroudeurs du Désert

Site web Symfony pour une agence de tours dans le désert tunisien.

## Installation (première fois uniquement)

### 1. Cloner le dépôt

Utilisez Git (pas un téléchargement ZIP) — ce projet utilise Git LFS pour les images, et les ZIP n'incluent pas les vrais fichiers image.

```bash
git clone https://github.com/saramnsr/Baroudeurs.git
cd Baroudeurs
```

### 2. Installer Git LFS et récupérer les images

Une seule fois par machine :

```bash
git lfs install
git lfs pull
```

### 3. Installer les dépendances PHP

```bash
composer install
```

### 4. Configurer l'environnement

```bash
cp .env.example .env
```

**Note :** si `CLOUDINARY_URL` ou `DEEPL_API_KEY` ne sont pas présents dans `.env.example`, ajoutez-les manuellement dans `.env` :

```env
CLOUDINARY_URL="cloudinary://..."
DEEPL_API_KEY="votre-clé"
```

Ouvrir `.env` et remplir :

* **DATABASE_URL** — connexion PostgreSQL. Exemple :

```env
DATABASE_URL="postgresql://postgres:root123@127.0.0.1:5432/app?serverVersion=13"
```

* **CLOUDINARY_URL** — récupérable sur https://cloudinary.com/console > API Keys
* **DEEPL_API_KEY** — récupérable sur https://www.deepl.com/pro-api

Clé gratuite possible ; les clés `xxx:fx` utilisent l'endpoint gratuit.

### 5. Créer la base de données, charger le schéma et les données

Trois commandes, dans cet ordre.

**a) Créer la base vide**

```bash
createdb -U postgres -h 127.0.0.1 app
```

**b) Construire le schéma (toutes les tables, colonnes, index)**

```bash
php bin/console doctrine:migrations:migrate --no-interaction
```

**c) Charger les données de départ (circuits, excursions, programmes)**

```bash
php bin/console doctrine:fixtures:load --purge-with-truncate --no-interaction
```

Ce que ça donne — exactement, à chaque fois :

* **7 circuits** : Circuit Désert 8 Jours, Mirage du Désert, Appel du Désert, Baroudeurs de Désert 15 Jours, Charme du Désert 2 Jours, Désert Infini 8 Jours, Rose de Sables 8 Jours
* **2 excursions** : Tataouine Day Excursion, Ksar Ghilane Overnight Excursion
* **Les programmes** affichés sur `/programmes`
* **Les témoignages** sur `/testimonials`
* Toutes les traductions FR / EN / AR / IT

> **⚠️ ATTENTION sur `--purge-with-truncate`**
>
> Cette option **vide toutes les tables** avant d'insérer. C'est le bouton « reset » qui garantit le contenu.
>
> **Ne l'utilisez jamais sur une base de production** contenant de vraies données utilisateurs (messages reçus, abonnés newsletter, etc.) — vous les perdriez.

**Si `createdb` n'est pas reconnu (Windows)**, utilisez le chemin complet :

```powershell
& "C:\Program Files\PostgreSQL\13\bin\createdb.exe" -U postgres -h 127.0.0.1 app
```

### 6. Créer un compte administrateur

```bash
php bin/console app:create-admin
```

La commande est interactive :

```text
Adresse email:
admin@gmail.com
Mot de passe (4 caractères minimum):
Confirmez le mot de passe:
[OK] Admin « admin@gmail.com » créé.
```

**Note :** le mot de passe est caché pendant la saisie — rien ne s'affiche à l'écran, c'est normal. Utilisez un mot de passe simple comme `admin1234` pour le développement.

Si vous relancez la commande avec le même email, elle vous propose de réinitialiser le mot de passe.

### 7. Démarrer le serveur local

Depuis la racine du projet (`.../Baroudeurs-main/Baroudeurs`) :

```bash
php -S localhost:8000 -t public
```

Visitez http://localhost:8000 dans votre navigateur.

L'admin est accessible sur http://localhost:8000/admin/login.

## Réinitialiser la base à l'état initial

Si vous avez cassé quelque chose et voulez repartir de zéro :

```bash
php bin/console doctrine:fixtures:load --purge-with-truncate --no-interaction
```

Cette commande **efface tout** et remet :

* 7 circuits
* 2 excursions
* Programmes
* Témoignages

**⚠️ Le compte admin est perdu** — `--purge-with-truncate` vide aussi la table `admin_user`.

Relancez **obligatoirement** :

```bash
php bin/console app:create-admin
```

## Images et vidéos

Les images et vidéos des circuits sont hébergées sur **Cloudinary**, pas stockées localement en base de données.

Les images statiques du thème (logo, arrière-plans, exemples de galerie) sont suivies via **Git LFS** — assurez-vous que l'étape 2 (`git lfs pull`) a bien été exécutée, sinon elles apparaîtront cassées.

## Traductions

Les contenus en FR sont saisis dans l'admin. Les traductions EN / AR / IT sont générées automatiquement par **DeepL** au moment de l'enregistrement.

Pour vérifier que DeepL et Cloudinary sont bien configurés :

```bash
php bin/console app:check-services
```

## Dépannage

### Images cassées

Cela signifie généralement que le serveur tourne depuis le mauvais dossier, ou que `git lfs pull` n'a pas été exécuté.

Vérifiez que vous servez bien depuis `public/` et que les fichiers LFS sont réels (pas de simples pointeurs de quelques centaines d'octets).

Pour vérifier les fichiers suivis par Git LFS :

```bash
git lfs ls-files
```

### « La colonne/table existe déjà » lors des migrations

Votre base a déjà un schéma partiel (restauration précédente, essai interrompu).

**Solution propre** : recréer la base de zéro :

```bash
dropdb -U postgres -h 127.0.0.1 app
createdb -U postgres -h 127.0.0.1 app
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console doctrine:fixtures:load --purge-with-truncate --no-interaction
php bin/console app:create-admin
```

### Aucune donnée après la migration

`doctrine:migrations:migrate` crée les **tables**, pas les **données**.

Vous devez **aussi** lancer :

```bash
php bin/console doctrine:fixtures:load --purge-with-truncate --no-interaction
```

### « Invalid credentials » à la connexion admin

Le compte n'existe pas ou le mot de passe ne correspond pas.

Vérifier que le compte existe :

```bash
php bin/console doctrine:query:sql "SELECT id, email, roles FROM admin_user;"
```

Recréer / réinitialiser :

```bash
php bin/console app:create-admin
```

(email existant → la commande propose de réinitialiser le mot de passe)

### Traductions vides ou en français pour EN/AR/IT

La clé DeepL est absente ou invalide.

Vérifier `DEEPL_API_KEY` dans `.env`, puis :

```bash
php bin/console app:check-services
```

### Les images uploadées ne s'affichent pas

`CLOUDINARY_URL` absente ou invalide.

Vérifier `.env`, puis :

```bash
php bin/console app:check-services
```

## Sauvegarde de la base (production uniquement)

Pour faire un dump **complet** de la base (schéma + données) :

**PowerShell (Windows) :**

```powershell
pg_dump -U postgres -h 127.0.0.1 -Fc app > "database/backup_$(Get-Date -Format 'yyyyMMdd').dump"
```

**Linux / macOS :**

```bash
pg_dump -U postgres -h 127.0.0.1 -Fc app > "database/backup_$(date +%Y%m%d).dump"
```

Restauration :

```bash
pg_restore -U postgres -h 127.0.0.1 -d app database/backup_YYYYMMDD.dump
```

**Astuce :** ajoutez `database/*.dump` à `.gitignore` si ce n'est pas déjà fait, pour ne pas committer de dumps par accident.

Ces dumps ne sont **pas** dans Git (trop volumineux, non diffables) — gardez-les dans un emplacement externe (cloud, NAS, etc.).

## Structure du projet

```text
src/
├── Controller/
│   ├── FontController.php # Site public (front office)
│   └── Admin/ # Pages d'administration
│       ├── DashboardController.php
│       ├── MessageController.php # Boîte de réception
│       ├── NewsletterController.php # Envoi email à tous les abonnés
│       ├── SecurityController.php # Connexion / déconnexion
│       └── TripController.php # Add / edit / list / trash
├── Entity/ # Entités Doctrine
├── Repository/ # Requêtes personnalisées
├── Form/Admin/ # Formulaires d'administration
├── Service/ # Cloudinary, DeepL
├── Command/Admin/ # Commandes Symfony
├── DataFixtures/ # Données de départ (7 + 2)
└── Twig/ # Extensions Twig
templates/
├── base.html.twig # Layout public
├── font/ # Templates du front office
└── admin/ # Templates d'administration
migrations/ # Migrations Doctrine (schéma uniquement)
```

## Technologie

* **Symfony 5.4** — framework PHP
* **Doctrine ORM** — base de données PostgreSQL
* **Twig** — moteur de templates
* **Cloudinary** — hébergement des images uploadées
* **DeepL** — traduction automatique FR → EN / AR / IT
* **PHPMailer** — envoi d'emails (Gmail SMTP)
* **Git LFS** — images statiques du thème

## Vérification avant commit

Avant de faire le commit, exécutez les fixtures et vérifiez que les affirmations du README correspondent bien aux données réelles :

```powershell
php bin/console doctrine:fixtures:load --purge-with-truncate --no-interaction
php bin/console doctrine:query:sql "SELECT id, title_fr FROM circuit ORDER BY id;"
php bin/console doctrine:query:sql "SELECT id, title_fr FROM excursion ORDER BY id;"
```

Résultat attendu :

**Circuit :**

```text
1  Circuit Désert 8 Jours - Douz à Tembaïne
2  Mirage du Désert - 8 Jours / 7 Nuits
3  Appel du Désert
4  Baroudeurs de Désert - 15 Jours
5  Charme du Désert - 2 Jours
6  Désert Infini - 8 Jours
7  Rose de Sables - 8 Jours
```

**Excursion :**

```text
1  Excursion d'une Journée à Tataouine
2  Excursion Nuit à Ksar Ghilane
```

Si ces résultats correspondent → le README est fidèle au projet et peut être commit.

S'ils ne correspondent pas → vérifiez les fixtures avant de faire le commit. Ne poussez pas un README qui promet quelque chose que le code ne fournit pas.
