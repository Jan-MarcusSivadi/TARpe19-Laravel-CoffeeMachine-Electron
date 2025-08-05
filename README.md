# TARpe19 Laravel Coffee Machine Desktop Application

A desktop coffee machine management application built with Laravel server-side rendering and Electron framework. This project combines a robust Laravel backend with a native desktop interface, allowing users to manage coffee machine operations and inventory through an intuitive desktop application.

*Built on the excellent [electron-laravel](https://github.com/DevShaded/electron-laravel) foundation by DevShaded.*

## Project Overview

This application provides a complete coffee machine management system featuring:
- **Server-side rendered Laravel views** for robust web functionality
- **Native desktop experience** through Electron framework
- **CRUD-based drink management** for administrators
- **Simple drink dispensing interface** for public users
- **Cup inventory tracking** with refill capabilities
- **User-friendly desktop interface**
- **Local server operation** (can run without internet connection)

## System Requirements

- **PHP 7.4 or higher** (8.0+ recommended)
- **Node.js LTS** (14.x or higher)
- **Composer** - PHP dependency manager
- **NPM** - Node package manager (comes with Node.js)

## Quick Start

### 1. Clone and Install Dependencies
```bash
# Clone the TARpe19 Coffee Machine repository
git clone https://github.com/Jan-MarcusSivadi/TARpe19-Laravel-CoffeeMachine-Electron.git
cd TARpe19-Laravel-CoffeeMachine-Electron

# Install all dependencies (Node.js + Laravel)
npm run install:all
```

### 2. Coffee Machine Laravel Setup
```bash
# Navigate to Laravel directory
cd www

# Copy environment file
php -r "file_exists('.env') || copy('.env.example', '.env');"

# Generate application key
php artisan key:generate

# Set up coffee machine database
php artisan migrate

# Seed with sample drink types and cup data
php artisan db:seed

# Return to root directory
cd ..
```

### 3. Run the Coffee Machine Application
```bash
# Start both Laravel server and Coffee Machine desktop app
npm run serve
```

## Coffee Machine Features

This desktop application includes:

### Core Functionality

#### Admin View (CRUD Operations)
- **Drink Type Management** - Add, edit, delete, and view drink types
- **Cup Inventory Control** - Set maximum cup amounts for each drink type
- **Inventory Refill** - Fill/refill cups for each drink type
- **Complete CRUD Interface** - Full Create, Read, Update, Delete operations

#### Public View (User Interface)
- **Simple Drink Selection** - Browse available drink types
- **One-Cup Dispensing** - Users can drink one cup at a time
- **Real-time Availability** - Only shows drinks with available cups
- **Intuitive Interface** - Easy-to-use public-facing drink selection

### Server-Side Rendering Benefits
- **Fast page loads** with Laravel Blade templates
- **Robust form handling** with CSRF protection for CRUD operations
- **Database-driven** dynamic content for drink types and inventory
- **Session management** for admin authentication
- **Real-time inventory updates** reflected immediately in views

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

#### Database Configuration for Coffee Machine
Edit `www/.env` file to configure your coffee machine database:
```env
DB_CONNECTION=sqlite
# For SQLite (recommended for desktop app)
DB_DATABASE=/absolute/path/to/coffee_machine.sqlite

# OR for MySQL/PostgreSQL (if using external database)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=coffee_machine_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

#### Run Coffee Machine Database Setup
```bash
# Create coffee machine database tables (drinks, cups inventory)
php artisan migrate

# Seed with sample drink types and initial cup amounts
php artisan db:seed
```

### Step 4: Coffee Machine Optimization (Production)

For production deployment of the coffee machine application:
```bash
# Production installation with optimizations
npm run build:prod
```

This will:
- Install only production dependencies
- Optimize Laravel autoloader for better performance
- Cache configuration, routes, and views
- Prepare the coffee machine app for deployment

## Available Scripts

### Development
- `npm start` - Start Electron coffee machine app only
- `npm run serve` - Start Laravel server + Coffee machine desktop app
- `npm run server` - Start Laravel development server only
- `npm run install:dev` - Install with development dependencies

### Production
- `npm run install:production` - Install production dependencies only
- `npm run build:prod` - Full production build with optimizations

### Laravel Coffee Machine Specific
- `npm run install:composer` - Install Laravel dependencies only
- `npm run update:composer` - Update Laravel dependencies

## Project Structure

```
TARpe19-Laravel-CoffeeMachine-Electron/
├── main.js              # Electron main process for desktop app
├── package.json         # Node.js dependencies and scripts
├── www/                 # Laravel coffee machine application
│   ├── app/            # Coffee machine business logic
│   │   ├── Models/     # Drink, Cup Inventory models
│   │   ├── Controllers/# Admin CRUD & Public view controllers
│   │   └── ...
│   ├── config/         # Laravel configuration
│   ├── database/       # Coffee machine migrations & seeds
│   │   ├── migrations/ # Database schema for drinks and cup inventory
│   │   └── seeders/    # Sample drink types and cup data
│   ├── public/         # Static assets for coffee machine UI
│   ├── resources/      # Blade templates and assets
│   │   ├── views/      # Server-side rendered coffee machine views
│   │   │   ├── admin/  # CRUD interface for drink management
│   │   │   └── public/ # Simple drink selection interface
│   │   └── css/js/     # Frontend assets
│   ├── routes/         # Coffee machine application routes
│   ├── .env.example    # Environment template
│   ├── artisan         # Laravel command-line tool
│   └── composer.json   # PHP dependencies
└── php/                # Portable PHP runtime (Windows)
```

## Coffee Machine Development Workflow

1. **Start Coffee Machine Development Environment:**
   ```bash
   npm run serve
   ```

2. **Laravel Coffee Machine Development:**
   - Laravel coffee machine server runs on `http://127.0.0.1:8000`
   - Edit coffee machine logic in `www/` directory
   - Use Laravel Artisan commands for coffee machine features:
     ```bash
     cd www
     
     # Create coffee machine controllers
     php artisan make:controller AdminController
     php artisan make:controller DrinkController
     php artisan make:controller PublicController
     
     # Create coffee machine models
     php artisan make:model Drink
     php artisan make:model CupInventory
     
     # Run coffee machine migrations
     php artisan migrate
     ```

3. **Server-Side Rendered Views:**
   - **Admin views** provide full CRUD interface for drink management
   - **Public views** offer simple drink selection and dispensing
   - Edit templates in `www/resources/views/admin/` and `www/resources/views/public/`
   - Benefits include fast loading and robust data handling
   - Forms are processed server-side with full validation and CSRF protection

4. **Coffee Machine Business Logic:**
   - **Admin operations:** Create, read, update, delete drink types
   - **Inventory management:** Set max cups and refill functionality
   - **Public operations:** Display available drinks and handle dispensing
   - **Real-time updates:** Cup counts update immediately after dispensing

## Troubleshooting

### Common Issues

**Coffee Machine Laravel Server Not Starting:**
- Ensure PHP is installed and in your PATH
- Check if port 8000 is available
- Verify Laravel dependencies are installed: `cd www && composer install`
- Check coffee machine database connection in `www/.env`

**Desktop Coffee Machine App Not Loading:**
- Wait for Laravel server to fully start before Electron launches
- Check that `http://127.0.0.1:8000` is accessible in your browser
- Restart with `npm run serve`
- Verify Electron dependencies: `npm install`

**Coffee Machine Database Issues:**
- Ensure database is configured in `www/.env`
- Run coffee machine migrations: `cd www && php artisan migrate`
- Seed sample drink data: `cd www && php artisan db:seed`
- Check database permissions and connectivity
- Verify drink types and cup inventory tables exist

### Coffee Machine Laravel Commands Reference

```bash
cd www

# Coffee machine setup
php artisan key:generate
php artisan migrate
php artisan db:seed

# Create coffee machine components
php artisan make:controller DrinkController
php artisan make:controller AdminController  
php artisan make:model Drink -m
php artisan make:model CupInventory -m

# Coffee machine maintenance
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize coffee machine for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Building Coffee Machine for Distribution

To package your coffee machine application for distribution:

```bash
# Install production dependencies and optimize coffee machine
npm run build:prod

# Package coffee machine for current platform
npx electron-packager . coffee-machine-app --platform=win32 --arch=x64 --out=dist/

# Package for multiple platforms
npx electron-packager . coffee-machine-app --platform=all --arch=x64 --out=dist/
```

## Technical Architecture

### Server-Side Rendering with Laravel
- **Blade Templates:** Server-rendered views for fast, SEO-friendly pages
- **Form Handling:** Robust server-side form processing with validation
- **Database Integration:** Direct database queries with Eloquent ORM
- **Session Management:** Server-side session handling for user authentication
- **CSRF Protection:** Built-in security for all forms and AJAX requests

### Desktop Integration with Electron
- **Native OS Integration:** File system access, notifications, system tray
- **Local Server Operation:** Laravel runs on localhost, no internet connection required
- **Performance:** No browser overhead, dedicated application process
- **Security:** Sandboxed environment with controlled access
- **Cross-platform:** Works on Windows, macOS, and Linux

## Support & Resources

- **Project Issues:** [GitHub Issues](https://github.com/Jan-MarcusSivadi/TARpe19-Laravel-CoffeeMachine-Electron/issues)
- **Laravel Documentation:** [Laravel 8.x Docs](https://laravel.com/docs/8.x)
- **Electron Documentation:** [Electron Docs](https://www.electronjs.org/docs)

### Credits
*This project is built upon the excellent [electron-laravel](https://github.com/DevShaded/electron-laravel) foundation created by DevShaded, providing the perfect starting point for Laravel desktop applications.*
