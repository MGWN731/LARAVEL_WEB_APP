# Lara Employee Management System

Laravel 11 + Breeze (Blade) authentication + Employee CRUD (with optional photo upload).

## Functionality

- Authentication (Laravel Breeze): register, login, logout
- Profile management (edit profile, change password)
- Employee management (CRUD): create, list (paginated), view, update, delete
- Employee photo upload (optional): stored on the public disk and shown in list/details
- Admin UI: responsive sidebar + top nav
- UX: SweetAlert2 toast notifications, delete confirmations, and “View details” modal

## Requirements

- PHP 8.2+
- Composer
- Node.js + npm
- MySQL/MariaDB (XAMPP is fine)

## Setup

1) Install dependencies

- `composer install`
- `npm install`

2) Configure environment

- Copy `.env.example` to `.env`
- Set your database values in `.env` (example for XAMPP):

	- `DB_CONNECTION=mysql`
	- `DB_HOST=127.0.0.1`
	- `DB_PORT=3306`
	- `DB_DATABASE=lara_employee_management`
	- `DB_USERNAME=root`
	- `DB_PASSWORD=`

Optional: create the database automatically (MySQL/MariaDB)

- `php scripts/create_mysql_database.php`

3) App key + migrations

- `php artisan key:generate`
- `php artisan migrate --seed`

If you previously ran a different schema and want a clean reset:

- `php artisan migrate:fresh --seed`

4) Storage link (needed for employee photos)

- `php artisan storage:link`

5) Run the app

- Start the PHP server: `php artisan serve`
- In another terminal, start Vite (Tailwind): `npm run dev`

For a production build, use `npm run build`.

Open: `http://127.0.0.1:8000`

## Pages

- Home: `/`
- About: `/about`
- Register: `/register`
- Login: `/login`
- Dashboard: `/dashboard` (admin overview)
- Employees: `/employees` (requires login)

## Users table & login (database-backed)

- The `users` table is created by the migration `0001_01_01_000000_create_users_table`.
- Registration inserts a new record into `users`.
- Login checks credentials against the `users` table (Laravel auth provider) and the UI reads the logged-in user from the database using `Auth::user()`.

After login, all users can access the Employees pages (no roles).

### Default seeded user

When you run `php artisan migrate --seed`, a user is created (or reused if it already exists):

- Email: `test@example.com`
- Password: `password`

You can also register your own account at `/register`.

## Employee photos

- Upload a photo on Create/Edit employee.
- Photos are stored under `storage/app/public/employees` and served via `public/storage`.

Troubleshooting: photos not displaying

- Ensure the storage link exists: `php artisan storage:link`
- On Windows, if `public/storage` is a normal folder (not a link), delete it and re-run `php artisan storage:link`
