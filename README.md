# URL Shortener

A Laravel 12 based multi-company URL Shortener application with role-based access control.

## Features

* Multi-company support
* Roles: SuperAdmin, Admin, Member
* Invitation-based user onboarding
* URL shortening and public redirection
* Role-based access control

## Requirements

* PHP 8.2+
* Composer
* Laravel 12


## Installation & Setup

### 1. Clone Repository

git clone https://github.com/rahul9-max/url-shortener.git
cd url-shortener

### 2. Install PHP Dependencies

composer install

### 3. Install Dependencies

composer install

### 4. Configure Database

Create a MySQL database and update the database credentials in the .env file.

### 5. Run Migrations

php artisan migrate

### 6.Configure Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=

### 7. Run Migrations

php artisan migrate

### 8. Seed SuperAdmin Account

php artisan db:seed

### 9. Start Development Server

php artisan serve

Application URL:
http://127.0.0.1:8000

## Default SuperAdmin Credentials

Created through `SuperAdminSeeder`.

Example:

Email: superadmin@example.com
Password: password

## Application Flow

### SuperAdmin

* Login to the system
* Create a company
* Invite an Admin to a company

### Admin

* Accept invitation
* Login to the system
* Invite other Admins or Members within the same company
* Create Short URLs
* View all URLs belonging to the company

### Member

* Accept invitation
* Login to the system
* Create Short URLs
* View only URLs created by themselves

## URL Resolution

Short URLs are publicly accessible and redirect users to the original URL.

Example:
http://127.0.0.1:8000/p05bQt


## AI Usage

The following AI tool was used during development:

* ChatGPT

  * Laravel debugging
  * Route and controller guidance
  * Understanding Eloquent relationships
  * Role and invitation workflow implementation
  * URL shortening implementation assistance

All business logic, project integration, testing, and final implementation decisions were performed manually.
