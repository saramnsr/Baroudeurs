# Baroudeurs du Desert

Symfony website for a Tunisia desert tour agency.

## Setup (first time only)

1. Clone the repo (not a ZIP download - this project uses Git LFS for images, and ZIP downloads do not include the real image files):
   git clone https://github.com/saramnsr/Baroudeurs.git
   cd Baroudeurs

2. Install Git LFS (one-time on your machine, if you have not already) and pull the real image/video files:
   git lfs install
   git lfs pull

3. Install PHP dependencies:
   composer install

4. Set up your environment file:
   cp .env.example .env
   Then open .env and fill in:
   - DATABASE_URL - your local MySQL connection
   - CLOUDINARY_URL - get this from https://cloudinary.com/console > API Keys

5. Run database migrations:
   php bin/console doctrine:migrations:migrate

6. Start the local server:
   php -S localhost:8000 -t public

Visit http://localhost:8000 in your browser.

## Images and videos

Programme circuit images and videos are hosted on Cloudinary, not stored locally in the database. Static/theme images (logo, backgrounds, gallery samples) are tracked via Git LFS.
