# Baroudeurs du Désert : Guide d'installation et d'utilisation

Bienvenue dans le projet **Baroudeurs du Désert**. Ce guide explique, étape par étape, comment installer, configurer et lancer le projet sur une machine, à partir de zéro.

> ⚠️ **Avant de commencer :** ce projet utilise **Git LFS** pour stocker les images. Lisez impérativement l'**Étape 0** avant de cloner ou télécharger le projet. Ne pas suivre cette étape entraîne l'absence de toutes les images.

> ⚠️ **Utilisateurs Windows :** l'import de la base de données (Étape 6) **doit** être lancé depuis **cmd.exe**, jamais depuis PowerShell. Utiliser PowerShell corrompt silencieusement les accents et l'arabe (`D??sert`, `??????`). Voir l'Étape 6 pour les détails.

---

## Prérequis

| Logiciel | Version minimale | Rôle |
|----------|------------------|------|
| PHP | 8.1 ou supérieur | Langage du serveur |
| Composer | 2.x | Gestionnaire de dépendances PHP |
| Node.js | 18.x ou supérieur | Environnement JavaScript |
| npm | 9.x ou supérieur | Gestionnaire de paquets JS |
| MySQL | 8.0 ou supérieur | Base de données |
| Git | 2.x | Récupération du projet |
| Git LFS | 3.x | Récupération des images (obligatoire) |

**Extensions PHP obligatoires :** `pdo_mysql`, `mbstring`, `intl`, `openssl`, `ctype`, `iconv`.

Pour vérifier :

```bash
php -m
```

Vous devez voir au minimum : `pdo_mysql`, `mbstring`, `intl`, `openssl`.

---

## Étape 0 : Installer et activer Git LFS (obligatoire)

Ce projet stocke toutes les images (`.jpg`, `.jpeg`, `.png`, `.webp`, `.avif`, `.ico`) et les vidéos (`.mp4`) sous `public/assets/` via **Git LFS** (Large File Storage).

> 🚨 **Sans Git LFS installé et activé AVANT le clone**, toutes les images seront remplacées par de petits fichiers texte d'environ 130 octets (des « pointeurs »). Le site s'affichera avec toutes les images cassées (logo, bannière, photos de circuits, etc.).

### Installer Git LFS

- **Windows :** télécharger et installer depuis https://git-lfs.com
- **macOS :** `brew install git-lfs`
- **Debian / Ubuntu :** `sudo apt install git-lfs`
- **Fedora :** `sudo dnf install git-lfs`

Vérifiez l'installation :

```bash
git lfs version
```

### Activer Git LFS (une seule fois par machine)

```bash
git lfs install
```

Résultat attendu :

```text
Git LFS initialized.
```

---

## Étape 1 : Récupérer le projet

### Option A : Cloner depuis Git (recommandé)

```bash
git clone https://github.com/saramnsr/Baroudeurs.git baroudeurs
cd baroudeurs

# Récupérer explicitement les fichiers LFS (images, vidéos)
git lfs pull
```

Vérifier que les images sont réelles :

```bash
ls -l public/assets/images/logo/
```

Les tailles doivent être de plusieurs milliers d'octets (par exemple `140670` pour `main-logo.png`). Si elles sont de ~130 octets, `git lfs pull` a échoué : voir la section **Dépannage LFS** ci-dessous.

### Option B : À partir d'un fichier ZIP ⚠️

> ❌ **Le ZIP généré par GitHub n'inclut JAMAIS les fichiers Git LFS.** Toutes les images seront des pointeurs de ~130 octets et le site sera cassé.

Si vous devez malgré tout utiliser un ZIP :

1. Décompressez le ZIP.
2. Depuis le dossier décompressé, initialisez un dépôt Git pointant vers le dépôt distant, puis tirez les LFS :

```bash
cd baroudeurs-main
git init
git remote add origin https://github.com/saramnsr/Baroudeurs.git
git fetch --all
git checkout main     # ou 'master' selon la branche par défaut
git lfs install
git lfs pull
```

3. Vérifiez ensuite les tailles des images comme ci-dessus.

> 💡 **Recommandation :** utilisez toujours l'Option A (`git clone` + `git lfs pull`). C'est la seule méthode fiable pour obtenir les images.

### Dépannage LFS

| Problème | Cause | Solution |
|----------|-------|----------|
| `git: 'lfs' is not a git command` | Git LFS non installé | Installer Git LFS (voir Étape 0) |
| Images ~130 octets après le clone | LFS pas activé avant le clone | `git lfs install` puis `git lfs pull` |
| Toutes les images cassées après un ZIP | Le ZIP GitHub n'inclut pas LFS | Refaire un `git clone` + `git lfs pull` (Option A) |
| `Could not resolve host: github.com` | Problème réseau / DNS / proxy | Vérifier la connexion, VPN, ou proxy d'entreprise |
| `Encountered N files that should have been pointers, but weren't` | Normal, pas une erreur | Aucune action requise |

**Script de vérification rapide** (à lancer après le clone, à la racine du projet) :

```bash
bash bin/check-lfs.sh
```

(Voir la section « Annexe : script check-lfs.sh » à la fin de ce guide.)

---

## Étape 2 : Installer les dépendances PHP

```bash
composer install
```

Cette commande lit `composer.json` et télécharge toutes les bibliothèques PHP dans `vendor/`.

**Durée estimée :** 1 à 2 minutes.
**Résultat attendu :** `Generating autoload files` à la fin, sans erreur.

> ⚠️ **Sans cette étape, l'application ne démarrera pas.** Vous obtiendrez une erreur du type :
> `Failed opening required '.../vendor/autoload.php'`.
> Si c'est le cas, relancez simplement `composer install`.

---

## Étape 3 : Installer les dépendances JavaScript

```bash
npm install
```

Cette commande télécharge tous les paquets frontend dans `node_modules/`.

**Durée estimée :** 1 minute.

---

## Étape 4 : Créer le fichier de configuration local

**Sous Linux / macOS :**

```bash
cp .env .env.local
```

**Sous Windows (PowerShell) :**

```powershell
Copy-Item .env .env.local
```

Ouvrez ensuite `.env.local` et modifiez ces valeurs :

```dotenv
APP_ENV=dev
APP_DEBUG=1
APP_SECRET=changez_moi_par_une_chaine_aleatoire

DATABASE_URL="mysql://baroudeurs:baroudeurs2026@127.0.0.1:3306/baroudeurs?serverVersion=8.4.8&charset=utf8mb4"

CLOUDINARY_URL=cloudinary://<api_key>:<api_secret>@<cloud_name>
DEEPL_API_KEY=
```

### Notes importantes

- **`APP_SECRET`** : chaîne aléatoire de 32+ caractères. Générez-en une avec :

  ```bash
  php -r "echo bin2hex(random_bytes(16));"
  ```

- **`DATABASE_URL`** : le mot de passe (`baroudeurs2026`) doit correspondre exactement à celui de l'étape 5.
- **`CLOUDINARY_URL`** : nécessaire pour l'envoi d'images depuis l'admin. Si absente, l'upload d'images ne fonctionnera pas.
- **`DEEPL_API_KEY`** : optionnelle. Utilisée pour la traduction automatique. Laissez vide si non utilisée.

---

## Étape 5 : Créer la base de données MySQL

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

> 💡 **Test propre :** si l'utilisateur `baroudeurs` existe déjà avec un mot de passe différent, `CREATE USER IF NOT EXISTS` ne le modifiera pas et la connexion échouera plus tard. Pour repartir de zéro :
>
> ```sql
> DROP USER IF EXISTS 'baroudeurs'@'localhost';
> FLUSH PRIVILEGES;
> ```
>
> puis relancez le bloc ci-dessus.

---

## Étape 6 : Importer le fichier SQL

Le fichier `database/export/baroudeurs.sql` contient toute la base de données : les tables, les 7 circuits, les 2 excursions, avec toutes les traductions (français, anglais, arabe, italien), les images et les avis.

> ⚠️ **IMPORTANT : deux pièges à éviter :**
>
> 1. **Toujours** préciser `--default-character-set=utf8mb4`. Sans cela, les accents (é, à, è) et l'arabe seront corrompus.
> 2. **Sous Windows, lancer l'import depuis `cmd.exe`, jamais depuis PowerShell.** PowerShell ne supporte pas l'opérateur `<`, et son contournement habituel (`Get-Content ... | mysql`) corrompt silencieusement les accents et l'arabe (`D??sert`, `??????`), même avec `--default-character-set=utf8mb4`. C'est le bug le plus fréquent sur ce projet.

### Pré-vol (à vérifier avant d'importer)

- [ ] Vous êtes dans le dossier du projet.
- [ ] Sous Windows : votre invite ressemble à `C:\...>` et **non** `PS C:\...>`.
- [ ] Pour ouvrir `cmd.exe` : `Win + R` → taper `cmd` → Entrée.
- [ ] Vous allez bien utiliser `<` (cmd.exe), jamais `Get-Content | mysql` (PowerShell).

### Option A : Ligne de commande (rapide)

**Sous Linux / macOS :**

```bash
mysql -u root -p --default-character-set=utf8mb4 < database/export/baroudeurs.sql
```

**Sous Windows (cmd.exe, ⚠️ pas PowerShell) :**

Ouvrir `cmd.exe` (`Win + R` → `cmd` → Entrée), puis :

```cmd
cd /d "C:\chemin\vers\baroudeurs"
mysql -u root -p --default-character-set=utf8mb4 < "database\export\baroudeurs.sql"
```

**Alternative sans quitter PowerShell (sûre, une seule ligne) :**

```powershell
cmd /c "mysql -u root -p --default-character-set=utf8mb4 < database\export\baroudeurs.sql"
```

**❌ NE PAS utiliser ceci, cela corrompt les accents et l'arabe :**

```powershell
# À ÉVITER ABSOLUMENT
Get-Content "database\export\baroudeurs.sql" -Raw | mysql -u root -p --default-character-set=utf8mb4
```

Entrez le mot de passe root de MySQL lorsqu'il est demandé. Aucune sortie = succès.

### Option B : MySQL Workbench (interface graphique)

1. Ouvrez MySQL Workbench
2. Connectez-vous à `localhost` en tant que `root`
3. Menu → **Server** → **Data Import**
4. Sélectionnez **"Import from Self-Contained File"**
5. Parcourez jusqu'à `database/export/baroudeurs.sql`
6. **Default Schema to be Imported To** : sélectionnez `baroudeurs`
7. Cliquez sur **Start Import**

### Option C : Script fourni (recommandé)

Un script est fourni pour éviter les pièges ci-dessus.

**Sous Windows (cmd.exe) :**

```cmd
bin\import-db.cmd
```

**Sous Linux / macOS :**

```bash
bash bin/import-db.sh
```

Le script vérifie la présence du fichier SQL, lance l'import avec le bon encodage, puis exécute automatiquement la vérification de l'Étape 7.

---

## Étape 7 : Vérifier l'import

```bash
mysql -u root -p --default-character-set=utf8mb4 -e "SELECT id, title_fr FROM baroudeurs.circuit ORDER BY id;"
```

Résultat attendu :

```text
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

Résultat attendu : `رحلة الصحراء 8 أيام - من دوز إلى تمباين`

Vérifiez enfin le nombre de lignes :

```bash
mysql -u root -p --default-character-set=utf8mb4 -e "SELECT COUNT(*) AS circuits FROM baroudeurs.circuit; SELECT COUNT(*) AS excursions FROM baroudeurs.excursion;"
```

Résultat attendu : `circuits = 7`, `excursions = 2`.

> ❌ Si l'arabe s'affiche comme `?????` ou les accents comme `D??sert`, l'import a été fait via PowerShell (`Get-Content | mysql`) ou sans `--default-character-set=utf8mb4`. Il faut alors :
>
> 1. Supprimer la base : `DROP DATABASE baroudeurs;`
> 2. La recréer (étape 5)
> 3. Réimporter depuis `cmd.exe` (étape 6, Option A ou C)

---

## Étape 8 : Vérifier la cohérence du schéma

```bash
php bin/console doctrine:schema:validate
```

Résultat attendu :

```text
[OK] The mapping files are correct.
[WARNING] The database schema is not in sync ...
```

> ℹ️ Le `WARNING` est purement cosmétique (Doctrine souhaite ajouter des commentaires de métadonnées sur les colonnes de type date). Cela n'affecte pas le fonctionnement de l'application.

Pour faire disparaître l'avertissement (optionnel) :

```bash
php bin/console doctrine:schema:update --force
```

---

## Étape 9 : Vider le cache Symfony

```bash
php bin/console cache:clear
```

Résultat attendu : `[OK] Cache for the "dev" environment was successfully cleared.`

---

## Étape 10 : Créer un compte administrateur

> ⚠️ Le fichier SQL exporté **ne contient pas** de compte administrateur, car les mots de passe sont hachés de manière unique par environnement.

Créez-en un :

```bash
php bin/console app:create-admin
```

Trois questions vous seront posées :

1. **Adresse email** : par exemple `admin@baroudeursdedesert.com`
2. **Mot de passe** : minimum 4 caractères (utilisez un mot de passe fort)
3. **Confirmation du mot de passe**

Résultat attendu : `[OK] Admin « admin@baroudeursdedesert.com » créé.`

Pour modifier le mot de passe plus tard, relancez simplement la même commande avec le même email.

---

## Étape 11 : Lancer le serveur de développement

```bash
php -S localhost:8000 -t public
```

Résultat attendu :

```text
PHP 8.1.x Development Server (http://localhost:8000) started
```

Ouvrez ensuite votre navigateur et testez les pages suivantes :

| URL | Description |
|-----|-------------|
| http://localhost:8000/ | Page d'accueil |
| http://localhost:8000/circuits | Liste des 7 circuits |
| http://localhost:8000/excursions | Liste des 2 excursions |
| http://localhost:8000/detail/circuit/1 | Détail du circuit 1 |
| http://localhost:8000/detail/excursion/1 | Détail de l'excursion 1 |
| http://localhost:8000/admin | Connexion administrateur |

Connectez-vous à `/admin` avec l'email et le mot de passe créés à l'étape 10.

> ✅ **Contrôle visuel indispensable :** la page d'accueil doit afficher le **logo** en haut à gauche et une **image de bannière** (dunes / désert) derrière le titre « Tunisia Tours & Excursions ». Si ces images sont cassées (carré gris, icône d'image brisée), alors l'Étape 0 (Git LFS) n'a pas été correctement suivie. Revenez-y.

---

## Étape 12 : Déploiement en production (optionnel)

Pour un déploiement en production, utilisez Apache ou Nginx avec la racine web pointant vers `public/`.

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

Configurez votre serveur web pour que le `DocumentRoot` soit le dossier `public/` du projet. Le contrôleur frontal `public/index.php` prendra en charge toutes les requêtes.

### Important pour le déploiement : Git LFS

Lors du déploiement, assurez-vous que **Git LFS est installé sur le serveur** et que les fichiers LFS sont bien récupérés. Selon votre méthode :

**Déploiement via `git clone` sur le serveur :**

```bash
git lfs install
git clone https://github.com/saramnsr/Baroudeurs.git
cd Baroudeurs
git lfs pull
```

**Déploiement via GitHub Actions :**

```yaml
- uses: actions/checkout@v4
  with:
    lfs: true
```

**Déploiement via GitLab CI :**

```yaml
variables:
  GIT_LFS_SKIP_SMUDGE: "0"
```

**Déploiement via un autre outil (Capistrano, Deployer, etc.) :** assurez-vous que `git lfs pull` est exécuté après le checkout.

> ⚠️ Sans ces précautions, votre site en production affichera les mêmes images cassées qu'un clone sans LFS.

### Important pour le déploiement : import SQL

L'import SQL (étape 6) doit être fait **une seule fois**, sur le serveur de production, depuis un shell **Linux** (pas PowerShell). Utilisez la commande Linux/macOS de l'étape 6.

---

## Structure du projet

```text
baroudeurs/
├── bin/                      Commandes Symfony + scripts d'import
│   ├── check-lfs.sh          Vérifie que les images sont réelles
│   ├── import-db.cmd         Import SQL Windows (cmd.exe)
│   └── import-db.sh          Import SQL Linux / macOS
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
├── .gitattributes            Configuration Git LFS (obligatoire)
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

| Service | Configuration | Rôle |
|---------|---------------|------|
| **Cloudinary** | `CLOUDINARY_URL` dans `.env.local` | Hébergement et optimisation des images |
| **Gmail SMTP** | Constantes `MAIL_*` dans `src/Controller/FontController.php` | Envoi des emails (contact, newsletter) |
| **DeepL** | `DEEPL_API_KEY` dans `.env.local` | Traduction automatique |

Si l'un de ces services est absent :

- **Cloudinary manquant :** l'admin ne pourra pas téléverser d'images
- **Gmail manquant :** les formulaires s'enregistreront en base mais aucun email ne sera envoyé
- **DeepL manquant :** la traduction automatique des nouveaux contenus admin ne fonctionnera pas

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
| `git lfs pull` | Récupérer les fichiers LFS manquants |
| `bash bin/check-lfs.sh` | Vérifier que les images sont réelles (pas des pointeurs) |
| `bin\import-db.cmd` (Windows) | Importer la base proprement depuis cmd.exe |
| `bash bin/import-db.sh` (Linux/macOS) | Importer la base proprement |

---

## Résolution de problèmes

| Problème | Cause probable | Solution |
|----------|----------------|----------|
| Toutes les images cassées (logo, bannière, photos) | Git LFS non activé avant le clone, ou projet téléchargé en ZIP | Voir Étape 0 : `git lfs install` puis `git lfs pull` |
| Images de ~130 octets sur le disque | Fichiers LFS non récupérés (pointeurs) | `git lfs pull` dans le dossier du projet |
| `Table 'baroudeurs.circuit' doesn't exist` | L'étape 6 n'a pas été exécutée | Refaire l'étape 6 |
| `Access denied for user 'baroudeurs'` | Mot de passe incorrect ou utilisateur manquant | Refaire l'étape 5, vérifier `.env.local`. Si l'utilisateur existe déjà avec un autre mot de passe : `DROP USER IF EXISTS 'baroudeurs'@'localhost';` puis recréer. |
| Accents corrompus (`D??sert`) | Import fait via `Get-Content \| mysql` sous PowerShell, ou sans `--default-character-set=utf8mb4` | Supprimer la base, refaire l'étape 6 depuis `cmd.exe` |
| Arabe corrompu (`??????`) | Même cause que ci-dessus | Même solution |
| `L'opérateur « < » est réservé à une utilisation future` | Commande tapée dans PowerShell au lieu de cmd.exe | Ouvrir `cmd.exe` (`Win+R` → `cmd`), ou utiliser `cmd /c "mysql ... < ..."` |
| `Failed opening required '.../vendor/autoload.php'` | `composer install` pas encore lancé | Lancer `composer install` (étape 2) |
| `Class not found` | `composer install` incomplet | Relancer `composer install` |
| `Class "App\..." not found` | Autoloader non régénéré | Lancer `composer dump-autoload` |
| Images cassées dans l'admin | `CLOUDINARY_URL` manquant | Ajouter à `.env.local` |
| Connexion admin impossible | Mot de passe oublié | Relancer `php bin/console app:create-admin` avec le même email |
| Port 8000 déjà utilisé | Un autre processus utilise le port | Utiliser `php -S localhost:8001 -t public` |
| `doctrine:schema:validate` affiche un warning | Écart cosmétique (commentaires Doctrine) | Ignorer, ou lancer `doctrine:schema:update --force` |
| `Could not resolve host: github.com` | Problème réseau / DNS / proxy | Vérifier la connexion internet, VPN, ou proxy d'entreprise |
| `Encountered N files that should have been pointers` | Normal, pas une erreur | Aucune action requise |

---

## Informations de contact

- **Site :** Baroudeurs du Désert
- **Adresse :** 10 Avenue Habib Bourguiba, 4260 Douz, Tunisie
- **Email :** contact@baroudeursdedesert.com
- **Téléphone :** +(216) 24 77 72 32
- **Cloudinary :** `dy13axswo`
- **Dépôt Git :** https://github.com/saramnsr/Baroudeurs.git

---

## Résumé rapide des étapes

1. Installer **Git LFS** et lancer `git lfs install` (une seule fois par machine) ⚠️
2. Récupérer le projet (`git clone` + `git lfs pull`), **ne pas utiliser le ZIP GitHub**
3. `composer install` ⚠️ (obligatoire avant de lancer l'app)
4. `npm install`
5. Créer `.env.local` avec les bonnes valeurs
6. Créer la base de données MySQL et l'utilisateur
7. Importer `database/export/baroudeurs.sql` **depuis cmd.exe (Windows)** avec `--default-character-set=utf8mb4` ⚠️
8. Vérifier les données (7 circuits, 2 excursions, arabe correct)
9. `php bin/console doctrine:schema:validate` (ignorer le warning)
10. `php bin/console cache:clear`
11. `php bin/console app:create-admin`
12. `php -S localhost:8000 -t public` et tester
13. (Optionnel) Déployer en production, penser à activer Git LFS sur le serveur

---

## Annexe : script `bin/check-lfs.sh`

Créez ce fichier à `bin/check-lfs.sh` pour détecter rapidement si les images sont réelles ou si ce sont des pointeurs LFS :

```bash
#!/usr/bin/env bash
# Vérifie que les images sous public/assets/ sont de vrais fichiers,
# et non des pointeurs Git LFS (~130 octets).
set -e

count=$(find public/assets -type f \
    \( -name '*.jpg' -o -name '*.jpeg' -o -name '*.png' \
    -o -name '*.webp' -o -name '*.avif' -o -name '*.ico' \) \
    -size -500c | wc -l)

if [ "$count" -gt 0 ]; then
    echo "❌ $count fichier(s) image sous public/assets/ sont des pointeurs Git LFS, pas de vraies images."
    echo "   → Corrigez avec : git lfs install && git lfs pull"
    echo ""
    echo "Fichiers concernés (premiers 10) :"
    find public/assets -type f \
        \( -name '*.jpg' -o -name '*.jpeg' -o -name '*.png' \
        -o -name '*.webp' -o -name '*.avif' -o -name '*.ico' \) \
        -size -500c | head -10
    exit 1
fi

echo "✅ Tous les assets sont de vrais fichiers."
```

Rendre exécutable (Linux / macOS) :

```bash
chmod +x bin/check-lfs.sh
```

**Windows (PowerShell) :** équivalent à placer dans `bin/check-lfs.ps1` :

```powershell
$fakes = Get-ChildItem public\assets -Recurse -Include *.jpg,*.jpeg,*.png,*.webp,*.avif,*.ico `
    | Where-Object { $_.Length -lt 500 }

if ($fakes.Count -gt 0) {
    Write-Host "❌ $($fakes.Count) fichier(s) image sont des pointeurs Git LFS, pas de vraies images."
    Write-Host "   → Corrigez avec : git lfs install ; git lfs pull"
    $fakes | Select-Object -First 10 FullName, Length | Format-Table -AutoSize
    exit 1
}

Write-Host "✅ Tous les assets sont de vrais fichiers."
```

---

## Annexe : scripts d'import SQL

### `bin/import-db.cmd` (Windows, à lancer depuis cmd.exe)

```cmd
@echo off
setlocal
set DB_FILE=database\export\baroudeurs.sql

if not exist "%DB_FILE%" (
    echo Fichier introuvable : %DB_FILE%
    echo Etes-vous bien a la racine du projet ?
    exit /b 1
)

echo ============================================
echo  Import de la base 'baroudeurs'
echo  Fichier : %DB_FILE%
echo  Encodage : utf8mb4 (obligatoire)
echo ============================================
echo.

mysql -u root -p --default-character-set=utf8mb4 < "%DB_FILE%"
if errorlevel 1 (
    echo.
    echo Echec de l'import. Verifiez le mot de passe root et que MySQL est demarre.
    exit /b 1
)

echo.
echo Import termine. Verification :
echo.
mysql -u root -p --default-character-set=utf8mb4 -e "SELECT id, title_fr FROM baroudeurs.circuit ORDER BY id;"
mysql -u root -p --default-character-set=utf8mb4 -e "SELECT id, title_ar FROM baroudeurs.circuit WHERE id = 1;"

echo.
echo Si l'arabe ci-dessus s'affiche correctement (pas de ?????? ), l'import est bon.
endlocal
```

### `bin/import-db.sh` (Linux / macOS)

```bash
#!/usr/bin/env bash
set -e

DB_FILE="database/export/baroudeurs.sql"

if [ ! -f "$DB_FILE" ]; then
    echo "❌ Fichier introuvable : $DB_FILE"
    echo "   Êtes-vous bien à la racine du projet ?"
    exit 1
fi

echo "============================================"
echo " Import de la base 'baroudeurs'"
echo " Fichier  : $DB_FILE"
echo " Encodage : utf8mb4 (obligatoire)"
echo "============================================"
echo

mysql -u root -p --default-character-set=utf8mb4 < "$DB_FILE"

echo
echo "Import terminé. Vérification :"
echo
mysql -u root -p --default-character-set=utf8mb4 -e "SELECT id, title_fr FROM baroudeurs.circuit ORDER BY id;"
mysql -u root -p --default-character-set=utf8mb4 -e "SELECT id, title_ar FROM baroudeurs.circuit WHERE id = 1;"

echo
echo "Si l'arabe ci-dessus s'affiche correctement (pas de ?????? ), l'import est bon."
```

Rendre exécutable :

```bash
chmod +x bin/import-db.sh
```

---

*Fin du guide. Pour toute question, contactez contact@baroudeursdedesert.com.*