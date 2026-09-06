# Baroudeurs du Désert

Site web Symfony pour une agence de tours dans le désert tunisien.

## Installation (première fois uniquement)

1. Cloner le dépôt (pas un téléchargement ZIP — ce projet utilise Git LFS pour les images, et les ZIP n'incluent pas les vrais fichiers image) :
   ```
   git clone https://github.com/saramnsr/Baroudeurs.git
   cd Baroudeurs
   ```

2. Installer Git LFS (une seule fois par machine) et récupérer les vrais fichiers image/vidéo :
   ```
   git lfs install
   git lfs pull
   ```

3. Installer les dépendances PHP :
   ```
   composer install
   ```

4. Configurer le fichier d'environnement :
   ```
   cp .env.example .env
   ```
   Puis ouvrir `.env` et remplir :
   - `DATABASE_URL` — connexion PostgreSQL, par exemple :
     ```
     DATABASE_URL="postgresql://postgres:root123@127.0.0.1:5432/app?serverVersion=13"
     ```
   - `CLOUDINARY_URL` — à récupérer sur https://cloudinary.com/console > API Keys

5. Créer la base de données et charger le schéma + les données en une seule étape (recommandé — évite tous les conflits de migration) :
   ```
   createdb -U postgres -h 127.0.0.1 app
   pg_restore -U postgres -h 127.0.0.1 -d app database/baroudeurs_backup.dump
   ```
   Si `createdb`/`pg_restore` ne sont pas reconnus, utiliser le chemin complet vers votre installation PostgreSQL, par exemple :
   ```
   & "C:\Program Files\PostgreSQL\13\bin\createdb.exe" -U postgres -h 127.0.0.1 app
   & "C:\Program Files\PostgreSQL\13\bin\pg_restore.exe" -U postgres -h 127.0.0.1 -d app database/baroudeurs_backup.dump
   ```

   Alternative (base vide, sans données d'exemple) — seulement si vous n'avez pas le fichier dump :
   ```
   php bin/console doctrine:migrations:migrate
   ```

6. Démarrer le serveur local, depuis la racine du projet (`.../Baroudeurs-main/Baroudeurs`) :
   ```
   php -S localhost:8000 -t public
   ```

Visitez http://localhost:8000 dans votre navigateur.

## Images et vidéos

Les images et vidéos des circuits sont hébergées sur Cloudinary, pas stockées localement en base de données. Les images statiques du thème (logo, arrière-plans, exemples de galerie) sont suivies via Git LFS — assurez-vous que l'étape 2 (`git lfs pull`) a bien été exécutée, sinon elles apparaîtront cassées.

## Dépannage

- **Images cassées** : cela signifie généralement que le serveur tourne depuis le mauvais dossier, ou que `git lfs pull` n'a pas été exécuté. Vérifiez que vous servez bien depuis la bonne racine du projet et que les fichiers LFS ont été récupérés (pas seulement des fichiers pointeurs).
- **Erreurs de migration "la colonne/table existe déjà"** : signifie que la base de données a déjà le schéma issu d'une restauration précédente. Utilisez la méthode `pg_restore` de l'étape 5 plutôt que de relancer les migrations depuis zéro.
- **Aucune donnée après la migration** : vérifiez que `DATABASE_URL` dans `.env` pointe vers le même nom de base que celui que vous inspectez (`app`), et non un autre nom comme `baroudeurs`.