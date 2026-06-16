# URL Shortener

A Laravel 12 based multi-company URL Shortener application.

## Features

* Multi-company support
* Roles: SuperAdmin, Admin, Member
* Invitation based user onboarding
* URL shortening
* Public URL redirection
* Role based access control

## Requirements

* PHP 8.2+
* Composer
* MySQL
* Node.js & NPM

## Installation

Clone the repository:

git clone <repository-url>

Go to project folder:

cd url-shortener

Install dependencies:

composer install

Install frontend dependencies:

npm install

Copy environment file:

cp .env.example .env

Generate application key:

php artisan key:generate

Configure database in .env file.

Run migrations:

php artisan migrate

Seed SuperAdmin:

php artisan db:seed

Run development server:

php artisan serve

## Default SuperAdmin

Created using Database Seeder.

Check the SuperAdminSeeder file for credentials.

## AI Usage

* ChatGPT was used for debugging, Laravel guidance, and understanding relationships, roles, invitations, and URL shortening implementation.
