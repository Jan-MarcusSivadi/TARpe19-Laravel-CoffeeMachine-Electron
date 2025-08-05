# Laravel Electron Desktop Application

A desktop application combining Laravel backend with Electron frontend, allowing you to run Laravel applications as native desktop apps.

## System Requirements

- **PHP 7.4 or higher** (8.0+ recommended)
- **Node.js LTS** (14.x or higher)
- **Composer** - PHP dependency manager
- **NPM** - Node package manager (comes with Node.js)

## Quick Start

### 1. Clone and Install Dependencies
```bash
# Clone the repository
git clone https://github.com/DevShaded/electron-laravel.git
cd electron-laravel

# Install all dependencies (Node.js + Laravel)
npm run install:all
```

### 2. Laravel Setup
```bash
# Navigate to Laravel directory
cd www

# Copy environment file
php -r "file_exists('.env') || copy('.env.example', '.env');"

# Generate application key
php artisan key:generate

# Set up database (if needed)
php artisan migrate

# Return to root directory
cd ..
```

### 3. Run the Application
```bash
# Start both Laravel server and Electron app
npm run serve
```

## Detailed Installation Guide

### Step 1: Environment Setup
Ensure you have all required software installed:
- [PHP](https://www.php.net/downloads) (7.4+)
- [Composer](https://getcomposer.org/download/)
- [Node.js LTS](https://nodejs.org/en/)

### Step 2: Project Installation

#### Option A: Automated Installation (Recommended)
```bash
# Install everything at once
npm run install:all
```

#### Option B: Manual Installation
```bash
# Install Node.js dependencies
npm install

# Install Laravel dependencies
cd www
composer install
cd ..
```

### Step 3: Laravel Configuration

#### Environment Setup
```bash
cd www

# Create environment file
cp .env.example .env

# Generate application encryption key
php artisan key:generate
```

#### Database Configuration (Optional)
Edit `www/.env` file to configure your database:
```env
DB_CONNECTION=sqlite
# For SQLite (simplest option)
DB_DATABASE=/absolute/path/to/database.sqlite

# OR for MySQL/PostgreSQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

#### Run Database Migrations
```bash
# Create database tables
php artisan migrate

# (Optional) Seed database with sample data
php artisan db:seed
```

### Step 4: Laravel Optimization (Production)

For production builds:
```bash
# Production installation with optimizations
npm run build:prod
```

This will:
- Install only production dependencies
- Optimize Laravel autoloader
- Cache configuration, routes, and views
- Prepare the app for deployment

## Available Scripts

### Development
- `npm start` - Start Electron app only
- `npm run serve` - Start Laravel server + Electron app
- `npm run server` - Start Laravel development server only
- `npm run install:dev` - Install with development dependencies

### Production
- `npm run install:production` - Install production dependencies only
- `npm run build:prod` - Full production build with optimizations

### Laravel-Specific
- `npm run install:composer` - Install Laravel dependencies only
- `npm run update:composer` - Update Laravel dependencies

## Project Structure

```
electron-laravel/
├── main.js              # Electron main process
├── package.json         # Node.js dependencies and scripts
├── www/                 # Laravel application
│   ├── app/            # Laravel app code
│   ├── config/         # Laravel configuration
│   ├── database/       # Migrations, seeds, factories
│   ├── public/         # Web assets
│   ├── resources/      # Views, components, assets
│   ├── routes/         # Application routes
│   ├── .env.example    # Environment template
│   ├── artisan         # Laravel command-line tool
│   └── composer.json   # PHP dependencies
└── php/                # Portable PHP runtime (Windows)
```

## Development Workflow

1. **Start Development Environment:**
   ```bash
   npm run serve
   ```

2. **Laravel Development:**
   - Laravel runs on `http://127.0.0.1:8000`
   - Edit files in `www/` directory
   - Use Laravel Artisan commands from `www/` directory:
     ```bash
     cd www
     php artisan make:controller YourController
     php artisan make:model YourModel
     php artisan migrate
     ```

3. **Electron Development:**
   - Edit `main.js` for Electron main process
   - Electron automatically loads the Laravel server

## Troubleshooting

### Common Issues

**Laravel Server Not Starting:**
- Ensure PHP is installed and in your PATH
- Check if port 8000 is available
- Verify Laravel dependencies are installed: `cd www && composer install`

**Electron App Not Loading:**
- Wait for Laravel server to fully start before Electron launches
- Check that `http://127.0.0.1:8000` is accessible in your browser
- Restart with `npm run serve`

**Database Issues:**
- Ensure database is configured in `www/.env`
- Run migrations: `cd www && php artisan migrate`
- Check database permissions and connectivity

### Laravel Commands Reference

```bash
cd www

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Create controller
php artisan make:controller ControllerName

# Create model
php artisan make:model ModelName

# Clear caches
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Building for Distribution

To package your application for distribution:

```bash
# Install production dependencies and optimize
npm run build:prod

# Package for current platform
npx electron-packager . electron-laravel --platform=win32 --arch=x64 --out=dist/
```

## Support

- **Issues:** [GitHub Issues](https://github.com/DevShaded/electron-laravel/issues)
- **Laravel Documentation:** [Laravel 8.x Docs](https://laravel.com/docs/8.x)
- **Electron Documentation:** [Electron Docs](https://www.electronjs.org/docs)
