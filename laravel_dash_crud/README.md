# Laravel Countries Dashboard

A simple Laravel CRUD dashboard for managing countries, with authentication, Bootstrap styling, and Vite assets.

## Requirements

- PHP 8.2+
- Composer
- Node.js + npm
- MySQL

## Setup

1. Clone or extract the project.
2. Open a terminal in the project folder.
3. Install PHP dependencies:

```bash
composer install
```

4. Install frontend dependencies:

```bash
npm install
```

5. Create the environment file:

```bash
cp .env.example .env
```

On Windows CMD use:

```cmd
copy .env.example .env
```

6. Update your `.env` database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_dash_crud
DB_USERNAME=root
DB_PASSWORD=
```

7. Generate the application key:

```bash
php artisan key:generate
```

8. Run the migrations:

```bash
php artisan migrate
```

9. Seed an admin user:

```bash
php artisan db:seed --class=AdminSeeder
```

10. Running the project

After setup, run:

```bash
composer run dev
```

This starts:
- the Laravel server
- the queue listener
- Vite

## Login / Register

The app requires authentication.

You can either:
- register a new user at `/register`
- or seed the default test user and log in with:

```text
Email: test@example.com
Password: password
```

## Main route

After login, the app redirects to:

```text
/country
```

## Notes

- Sessions, cache, and queue are configured to use the database, so migrations must be run before using the app.
- Frontend assets are loaded with Vite.
- The dashboard supports creating, editing, listing, and deleting countries.
